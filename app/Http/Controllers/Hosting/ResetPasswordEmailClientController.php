<?php

namespace App\Http\Controllers\Hosting;

use Illuminate\Http\Request;
use App\Models\Hosting\EmailClient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ResetPasswordEmailClientController extends Controller
{
    public function reset(string $token)
    {
        $emailClient = EmailClient::where('reset_token', $token)
            ->where('reset_token_expires_at', '>', now())
            ->firstOrFail();

        // Generate a strong password suggestion
        $suggestedPassword = $this->generateStrongPassword();

        return view('hosting.reset-password', compact('token', 'suggestedPassword'));
    }

    public function update(Request $request, string $token)
    {
        $request->validate([
            'password' => [
                'required', 
                'string', 
                'min:12', // Increased minimum length
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/' // Strong password regex
            ],
        ], [
            'password.min' => 'Password must be at least 12 characters long.',
            'password.regex' => 'Password must include lowercase, uppercase, number, and special character.',
        ]);

        $emailClient = EmailClient::where('reset_token', $token)
            ->where('reset_token_expires_at', '>', now())
            ->firstOrFail();

        $emailClient->update([
            'password' => bcrypt($request->password), // Use bcrypt for secure hashing
            'reset_token' => null,
            'reset_token_expires_at' => null,
        ]);

        return view('hosting.success');
    }

    /**
     * Generate a strong, random password
     * 
     * @return string
     */
    private function generateStrongPassword(): string
    {
        $lowercase = Str::random(4);
        $uppercase = strtoupper($lowercase);
        $numbers = rand(10, 99);
        $specialChars = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')'];
        $specialChar = $specialChars[array_rand($specialChars)];

        // Manual shuffle
        $password = $lowercase . $uppercase . $numbers . $specialChar;
        $passwordArray = str_split($password);
        shuffle($passwordArray);
        return implode('', $passwordArray);
    }
}