<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendVerificationEmail(Request $request)
    {
        $email = $request->input('email');

        // Check if there's a previous timestamp stored in the session
        $lastEmailTimestamp = $request->session()->get('last_email_timestamp', 0);

        // Check if enough time has passed since the last email was sent
        $currentTime = now()->timestamp;
        $timeElapsed = $currentTime - $lastEmailTimestamp;

        if ($timeElapsed < 60) {
            // If less than 60 seconds have passed, return an error or take appropriate action
            return back()->withErrors(['email' => 'Please wait 60 seconds before sending another verification email.']);
        }

        // Tạo mã xác nhận gồm 5 chữ số
        $verificationCode = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $user = User::where('email', $email)->first();
        if ($user) {
            $user->verification_code = $verificationCode;
            $user->save();
        }

        // Gửi email xác nhận
        Mail::to($email)->send(new VerificationEmail($verificationCode));

        // Update the timestamp of the last email sent in the session
        $request->session()->put('last_email_timestamp', $currentTime);
        $request->session()->put('email', $email);
        $request->session()->put('verification_code', $verificationCode);

        return back()->with('success', 'Verification email sent successfully!');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'verification_code' => ['required', 'digits:5'],
        ]);

        // Check if the verification code matches the one stored in the session
        $storedEmail = $request->session()->get('email');
        $storedVerificationCode = $request->session()->get('verification_code');

        if ($request->verification_code !== $storedVerificationCode || $request->email !== $storedEmail) {
            // Verification code or email does not match
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }
        // Clear the session after successful verification
        $request->session()->forget(['email', 'verification_code']);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? false,
            'verification_code' => $request->verification_code
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
