<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $address = Setting::get('address', 'Jl. Kenari No.4, Semaki, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166');
        $phone = Setting::get('phone', '0274 512251');
        $email = Setting::get('email', 'smkn6yk@gmail.com');
        $email2 = Setting::get('email_secondary', 'mail@smkn6yk.sch.id');
        $workHours = Setting::get('work_hours', 'Senin – Kamis : 07.00 – 15.30 WIB, Jumat : 07.00 – 14.00 WIB');

        return view('contact.index', compact('address', 'phone', 'email', 'email2', 'workHours'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
