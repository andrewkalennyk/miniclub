<?php

namespace App\Mail;

use App\Models\SecretSantaApplyForm;
use App\Services\SecretSanta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSecretSanta extends Mailable
{
    use Queueable, SerializesModels;

    private SecretSantaApplyForm $santaInfo;

    private SecretSantaApplyForm $santa;

    public function __construct(SecretSantaApplyForm $applyForm, SecretSantaApplyForm $santa)
    {
        $this->santaInfo = $applyForm;
        $this->santa = $santa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Таємний Санта: Інформація про Твого "Щасливчика"!')
            ->markdown('vendor.mail.santa')
            ->with([
                'santa' => $this->santa,
                'santaInfo' => $this->santaInfo,
            ]);
    }
}
