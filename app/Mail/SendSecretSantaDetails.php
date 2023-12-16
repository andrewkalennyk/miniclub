<?php

namespace App\Mail;

use App\Models\SecretSantaApplyForm;
use App\Services\SecretSanta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSecretSantaDetails extends Mailable
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
        return $this->subject('Таємний Санта: Трохи більше Інформації про Твого "Щасливчика"!')
            ->markdown('vendor.mail.santa-details')
            ->with([
                'santa' => $this->santa,
                'santaInfo' => $this->santaInfo,
            ]);
    }
}
