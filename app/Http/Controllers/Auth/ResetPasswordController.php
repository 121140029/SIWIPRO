<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home'; // Ganti sesuai rute setelah reset

    // Jika ingin menyesuaikan tampilan form reset
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Jika ingin menyesuaikan proses reset password
    public function reset(Request $request)
    {
        // Validasi form reset password
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        // Proses reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($request->password),
                ])->save();
            }
        );

        // Menangani hasil dari reset password
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Password telah berhasil direset.')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
