<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Models\DataWisata;

class KomentarController extends Controller
{
    public function store(Request $request, $id_wisata)
    {
        $request->validate([
            'nama' => 'nullable|string|max:100',
            'judul' => 'required|string|max:120',
            'komentar' => 'required',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        Komentar::create([
            'id_wisata' => $id_wisata,
            'nama' => $request->nama ?? 'Anonim',
            'judul' => $request->judul,
            'komentar' => $request->komentar,
            'rating' => $request->rating ?? null,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

    //    public function index()
    //    {
    //        return redirect()->route('komentar.admin.index');
    //    }

    // Buat admin lihat semua komentar (pengunjung tetap bisa store kayak biasa)
    public function komentarAdminIndex()
    {
        $wisatas = DataWisata::withCount('komentar')->paginate(10);
        return view('admin.komentar.adminDataKomentar', compact('wisatas'));
    }

    // Buat admin lihat komentar per wisata
    public function show($id_wisata)
    {
        $wisata = DataWisata::findOrFail($id_wisata);
        $komentars = Komentar::where('id_wisata', $id_wisata)->latest()->get();

        return view('admin.komentar.editKomentar', compact('wisata', 'komentars'));
    }

    // Hapus komentar
    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }

}
