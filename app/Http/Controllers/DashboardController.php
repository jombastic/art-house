<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function sendReport(User $user)
    {
        $token = Str::random(60);

        // Save the token in the database associated with the user's report
        $user->report_token = $token;
        $user->save();

        $url = route('report.show', ['token' => $token]);

        // Send the email with the URL
        Mail::to($user->email)->send(new ReportMail($url));
    }

    public function showReport(?string $token = '')
    {
        if (auth()->guest()) {
            // Find the user associated with the token
            $user = User::where('report_token', $token)->first();

            if (!$user) {
                abort(404);
            }
        }

        return view('dashboard');
    }
}
