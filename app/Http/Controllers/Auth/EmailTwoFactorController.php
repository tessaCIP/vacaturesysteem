<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\EmailTwoFactorCode;

class EmailTwoFactorController extends Controller
{
    public function showChallenge()
    {
        return view('auth.email-two-factor-challenge');
    }

    public function sendCode(Request $request)
    {
        $user = $request->user();
        $code = random_int(100000, 999999);
        Session::put('email_2fa_code', $code);
        Session::put('email_2fa_expires', now()->addMinutes(10));
        Mail::to($user->email)->send(new EmailTwoFactorCode($code));
        return back()->with('status', 'Code is verstuurd naar je e-mail.');
    }

    public function verify(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);
        $code = Session::get('email_2fa_code');
        $expires = Session::get('email_2fa_expires');
        if (!$code || now()->gt($expires)) {
            return back()->withErrors(['code' => 'Code is verlopen. Vraag een nieuwe aan.']);
        }
        if ($request->code != $code) {
            return back()->withErrors(['code' => 'Ongeldige code.']);
        }
        Session::forget(['email_2fa_code', 'email_2fa_expires']);
        Session::put('email_2fa_passed', true);
        return redirect()->intended('/dashboard');
    }
}
