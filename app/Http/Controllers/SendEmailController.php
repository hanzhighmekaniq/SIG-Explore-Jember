<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\KritikSaranMail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{

    public function sendmail(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'message' => 'required|string',
            ]);

            // Data yang akan dikirim ke email
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ];

            // Kirim email ke admin
            Mail::to('shundallbolong@gmail.com')->send(new KritikSaranMail($data));

            // Jika berhasil, tampilkan pesan sukses
            return back()->with('success', 'Kritik & saran telah berhasil dikirim!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Debugging untuk melihat pesan error
            return back()->with('error', 'Terjadi kesalahan saat mengirim email.');
        }
    }
}
