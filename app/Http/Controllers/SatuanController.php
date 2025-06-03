<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::latest()->paginate(10);
        return view('satuans.index', compact('satuans'));
    }

    public function create()
    {
        return view('satuans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Satuan::create($request->all());
        return redirect()->route('satuans.index')->with('success', 'Data satuan berhasil ditambahkan.');
    }

    public function show(Satuan $satuan)
    {
        return view('satuans.show', compact('satuan'));
    }

    public function edit(Satuan $satuan)
    {
        return view('satuans.edit', compact('satuan'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $satuan->update($request->all());
        return redirect()->route('satuans.index')->with('success', 'Data satuan berhasil diupdate.');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuans.index')->with('success', 'Data satuan berhasil dihapus.');
    }
}

