<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgotForm(Request $request)
    {
        return view('auth.forgot-password'); 
    }

    public function submitForgotRequest(Request $request)
    {
        // Validasi input email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user memiliki role pelanggan
        if (!$user || $user->role !== 'tamu') {
            return back()->withErrors(['email' => 'Hanya pelanggan yang dapat melakukan reset password.']);
        }

        // Kirim link reset password
        $status = Password::sendResetLink($request->only('email'));

        // Cek status pengiriman
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
