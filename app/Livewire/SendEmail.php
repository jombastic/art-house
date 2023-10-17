<?php

namespace App\Livewire;

use App\Livewire\Forms\SendMailForm;
use LivewireUI\Modal\ModalComponent;

class SendEmail extends ModalComponent
{
    public SendMailForm $form;

    public function sendEmail()
    {
        $this->form->sendMail();
    }

    public function render()
    {
        return view('livewire.send-email');
    }
}
