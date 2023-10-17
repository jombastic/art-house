<?php

namespace App\Livewire;

use App\Livewire\Forms\SendMailForm;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class SendEmail extends ModalComponent
{
    use Actions;

    public SendMailForm $form;

    public function sendEmail()
    {
        $this->form->sendMail();

        $this->closeModal();

        $this->notification()->success(
            $title = 'Email sent',
            $description = 'An email with a link to the print report was sent!'
        );
    }

    public function render()
    {
        return view('livewire.send-email');
    }
}
