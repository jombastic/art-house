<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportMail;

class SendMailForm extends Form
{
    #[Rule('required|email')]
    public $email = '';

    public function sendMail()
    {
        $this->validate();

        $token = Str::random(60);

        $user = auth()->user();
        // Save the token in the database associated with the user's report
        $user->report_token = $token;
        $user->save();

        $url = route('report.show', ['token' => $token]);

        // Send the email with the URL
        Mail::to($this->only(['email']))->send(new ReportMail($url));
    }
}
