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

    public function showReport(?string $token = '')
    {
        if (auth()->guest()) {
            // Find the user associated with the token
            $user = User::where('report_token', $token)->first();

            if (!$user) {
                abort(404);
            }
        }

        return view('dashboard', [
            'header' => "Print report for user " . ($user->name ?? auth()->user()->name)
        ]);
    }
}
