<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    public function show($userId)
    {
        // Temukan pengguna yang sedang diajak obrolan
        $user = User::find($userId);

        // Temukan semua pesan yang terkait dengan pengguna yang sedang diajak obrolan
        $messages = Message::where(function($query) use ($userId) {
                                $query->where('sender_id', auth()->user()->id)
                                      ->where('receiver_id', $userId);
                            })
                            ->orWhere(function($query) use ($userId) {
                                $query->where('sender_id', $userId)
                                      ->where('receiver_id', auth()->user()->id);
                            })
                            ->orderBy('created_at', 'asc')
                            ->get();

        // Tampilkan halaman obrolan dengan pengguna yang dipilih dan pesan-pesan terkait
        return view('chat.show', compact('user', 'messages'));
    }

    public function sendMessage(Request $request)
    {
        // Validasi request
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        // Simpan pesan ke dalam basis data
        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        // Redirect kembali ke halaman obrolan dengan pengguna yang sama
        return redirect()->back();
    }
}
