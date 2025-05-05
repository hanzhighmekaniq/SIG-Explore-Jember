<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'nullable|string|max:100',
            'judul' => 'required|string|max:120',
            'komentar' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        Komentar::create([
            'wisata_id' => $id,
            'nama' => $request->nama ?? 'Anonim',
            'judul' => $request->judul,
            'komentar' => $request->komentar,
            'rating' => $request->rating ?? null,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}
