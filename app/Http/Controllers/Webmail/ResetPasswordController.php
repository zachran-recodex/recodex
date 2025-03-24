<?php

namespace App\Http\Controllers\Webmail;

use App\Http\Controllers\Controller;
use App\Models\Webmail\EmailClientPasswordReset;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __invoke(string $token)
    {
        $reset = EmailClientPasswordReset::where('token', $token)
            ->where('expires_at', '>', now())
            ->with('emailClient.domainClient')
            ->first();

        if (!$reset) {
            return redirect()->route('login')
                ->with('error', 'Invalid or expired password reset token.');
        }

        // Get the domain's URL
        $domain = $reset->emailClient->domainClient;
        $webmailUrl = "https://{$domain->domain}";

        // Update the password and delete the reset token
        $reset->emailClient->update(['password' => $reset->new_password]);
        $reset->delete();

        return redirect($webmailUrl)
            ->with('success', 'Your password has been reset successfully. Please login with your new password.');
    }
}