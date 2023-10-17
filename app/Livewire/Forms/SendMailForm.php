<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportMail;
use App\Models\Token;

class SendMailForm extends Form
{
    #[Rule('required|email')]
    public $email = '';

    public function sendMail()
    {
        $this->validate();

        $token = Str::random(60);

        $userId = auth()->id();
        Token::insert([
            'user_id' => $userId,
            'report_token' => $token,
        ]);

        $url = route('report.show', ['token' => $token]);

        // Send the email with the URL
        Mail::to($this->only(['email']))->send(new ReportMail($url));
    }
}
