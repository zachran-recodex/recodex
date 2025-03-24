<?php

namespace App\Http\Controllers\Webmail;

use Illuminate\Http\Request;
use App\Models\Webmail\EmailClient;
use App\Http\Controllers\Controller;

class ResetPasswordEmailClientController extends Controller
{
    public function reset(string $token)
    {
        $emailClient = EmailClient::where('reset_token', $token)
            ->where('reset_token_expires_at', '>', now())
            ->firstOrFail();

        return view('webmail.reset-password', compact('token'));
    }

    public function update(Request $request, string $token)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $emailClient = EmailClient::where('reset_token', $token)
            ->where('reset_token_expires_at', '>', now())
            ->firstOrFail();

        $emailClient->update([
            'password' => $request->password,
            'reset_token' => null,
            'reset_token_expires_at' => null,
        ]);

        return redirect()->route('login')->with('status', 'Password has been reset successfully.');
    }
}
