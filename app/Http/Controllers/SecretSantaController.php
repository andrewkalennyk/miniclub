<?php

namespace App\Http\Controllers;

use App\Cms\Definitions\SantaApplyRelations;
use App\Http\Requests\SecretSantaRequest;
use App\Mail\SendSecretSanta;
use App\Models\SecretSantaApplyForm;
use App\Models\SecretSantaRelations;
use App\Services\SecretSanta;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Vis\Builder\TreeController;

class SecretSantaController extends TreeController
{
    public function showPage()
    {
        $santas = SecretSantaApplyForm::all();
        return view('santa.index', compact('santas'));
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
}
