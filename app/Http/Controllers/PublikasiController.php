<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasis = Publikasi::all();

        return view('publikasi.index', compact('publikasis'));
    }

    public function create()
    {
        return view('publikasi.create');
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $namaFile);

            $validated['sampul'] = $namaFile;
        }

        Publikasi::create($validated);

        return redirect()
            ->route('publikasi.index')
            ->with('success', 'Publikasi berhasil ditambahkan.');
    }

}