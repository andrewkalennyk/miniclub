<?php

namespace App\Http\Controllers;

use App\Cms\Definitions\SantaApplyRelations;
use App\Http\Requests\SecretSantaDetailsRequest;
use App\Http\Requests\SecretSantaRequest;
use App\Mail\SendSecretSanta;
use App\Mail\SendSecretSantaDetails;
use App\Models\SecretSantaApplyForm;
use App\Models\SecretSantaRelations;
use App\Models\Tree;
use App\Services\SecretSanta;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Vis\Builder\TreeController;

class SecretSantaController extends TreeController
{
    public function showPage()
    {
        $page = new Tree([
            'seo_title' => 'Таємний Санта Міні клуба',
            'seo_description' => 'Приймай участь у таємному санті міні клуба! Переходь!',
        ]);

        $santas = SecretSantaApplyForm::all();
        return view('santa.index', compact('santas', 'page'));
    }

    public function showDetailsPage()
    {
        $santas = SecretSantaApplyForm::all();
        return view('santa.details-index', compact('santas'));
    }

    public function saveApplyForm(SecretSantaRequest $request)
    {
        Log::info(json_encode($request->all()));

        $applyForm = SecretSantaApplyForm::where('social_name', $request->get('social_name'))->first();

        if ($applyForm) {
            return [
                'status' => false,
                'error_message' => __t("Заявка с таким аккаунтом вже існує! Не переживайте, ви обов'язково приймете участь! "),
            ];
        }


        return [
            'status' => (bool)SecretSantaApplyForm::create($request->all()),
            'success_message' => __t('Дякуємо! Ваша заявка на участь принята! Очікуйте наступних повідомлень'),
            'error_message' => __t('От халепа! Щось пішло не так'),
        ];
    }

    public function saveDetailsApplyForm(SecretSantaDetailsRequest $request)
    {
        Log::info(json_encode($request->all()));

        $applyForm = SecretSantaApplyForm::where('social_name', $request->get('social_name'))->first();

        if (!$applyForm) {
            return [
                'status' => false,
                'error_message' => __t("Заявка с таким аккаунтом не існує! "),
            ];
        }

        if (!empty($applyForm->about_description_details)) {
            return [
                'status' => false,
                'error_message' => __t("Вибачте! Ви вже доповнювали дані) Не докучайте повідомленнями Санті! "),
            ];
        }

        $status = false;
        try {
            $status = $applyForm->updateApplyFormDetails($request);
        } catch (\Exception $e) {
            Log::info($e);
            Log::info('----------------------------------');
            Log::info($e);
            Log::info('message not send!');
            Log::info('----------------------------------');
        }

        if ($status) {
            $secretSantaRelation =  SecretSantaRelations::with(['social_from', 'social_to'])
                ->where('social_name_to', $request->get('social_name'))
                ->first();

            if ($secretSantaRelation) {
                Mail::to($secretSantaRelation->social_from->email)->send(new SendSecretSantaDetails($secretSantaRelation->social_to, $secretSantaRelation->social_from));
            }
        }

        return [
            'status' => $status,
            'success_message' => __t('Дякуємо Що допомогли своєму таємному санті! '),
            'error_message' => __t('От халепа! Щось пішло не так'),
        ];
    }

    public function doRandomize()
    {
        $secretSantas = SecretSantaApplyForm::all();

        (new SecretSanta($secretSantas))->doMakeRelations();

        echo 'done';
    }

    public function doSendLetters()
    {
       $secretSantasRelations =  SecretSantaRelations::with(['social_from', 'social_to'])->get();

       foreach ($secretSantasRelations as $santasRelation) {
           Mail::to($santasRelation->social_from->email)->send(new SendSecretSanta($santasRelation->social_to, $santasRelation->social_from));
       }

        echo 'done';
    }

    public function doSendLetter($id)
    {
        $secretSantasRelation =  SecretSantaRelations::with(['social_from', 'social_to'])->where('id', $id)->get();

        foreach ($secretSantasRelation as $santasRelation) {
            Mail::to($santasRelation->social_from->email)->send(new SendSecretSanta($santasRelation->social_to, $santasRelation->social_from));
        }

        echo 'done';
    }

    public function doSendLetterDetails($id)
    {
        $secretSantaRelation =  SecretSantaRelations::with(['social_from', 'social_to'])
            ->where('id', $id)
            ->first();

        if ($secretSantaRelation) {
            Mail::to($secretSantaRelation->social_from->email)->send(new SendSecretSantaDetails($secretSantaRelation->social_to, $secretSantaRelation->social_from));
        }

        echo 'done';
    }
}
