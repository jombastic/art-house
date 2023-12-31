<?php

namespace App\Http\Controllers;

use App\Models\Token;

class DashboardController extends Controller
{
    public function showReport(?string $token = '')
    {
        if (auth()->guest()) {
            // Find the user associated with the token
            $token = Token::with('user')->where('report_token', $token)->first();

            if (!$token) {
                abort(404);
            }
        }

        return view('dashboard', [
            'header' => "Print report for user " . ($token->user->name ?? auth()->user()->name)
        ]);
    }
}
