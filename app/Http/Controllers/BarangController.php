<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function __construct()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403, 'Akses ditolak');
        }
    }
    public function index()
    {
        $barangs = Barang::orderBy('id', 'desc')->get();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        Barang::create($request->all());
        return redirect()->route('barangs.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $barang->update($request->all());
        return redirect()->route('barangs.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Data berhasil dihapus');
    }
}
