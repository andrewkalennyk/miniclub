<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecretSantaRequest;
use App\Models\SecretSantaApplyForm;
use App\Services\SecretSanta;
use Vis\Builder\TreeController;

class SecretSantaController extends TreeController
{
    public function showPage()
    {
        return view('santa.index');
    }

    public function saveApplyForm(SecretSantaRequest $request)
    {

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
}
