<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Rab;
use Illuminate\Http\Request;

class RabController extends Controller
{
    public function index()
    {
        $rabs = Rab::all();
        return view('rabs.index', compact('rabs'));
    }

    public function create(Rab $rab)
    {
        $pemasukan = Pemasukan::pluck('jenis')->toArray();
        $pengeluaran = Pengeluaran::pluck('jenis')->toArray();
        return view('rabs.create', compact('rab', 'pemasukan', 'pengeluaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required|date',
            'kategori' => 'required|in:pemasukan,pengeluaran',
            'jenis' => 'required',
            'keterangan' => 'nullable',
            'jumlah' => 'required',
        ]);

        $request['jumlah'] = str_replace('.','', $request['jumlah']);

        Rab::create($request->all());
        return redirect()->route('rabs.index')->with('success', 'RAB created successfully.');
    }

    public function edit(Rab $rab)
    {
        $pemasukan = Pemasukan::pluck('jenis')->toArray();
        $pengeluaran = Pengeluaran::pluck('jenis')->toArray();
        return view('rabs.edit', compact('rab', 'pemasukan', 'pengeluaran'));
    }

    public function update(Request $request, Rab $rab)
    {
        $request->validate([
            'periode' => 'required|date',
            'kategori' => 'required|in:pemasukan,pengeluaran',
            'jenis' => 'required',
            'keterangan' => 'nullable',
            'jumlah' => 'required',
        ]);

        $request['jumlah'] = str_replace('.','', $request['jumlah']);

        $rab->update($request->all());
        return redirect()->route('rabs.index')->with('success', 'RAB updated successfully.');
    }

    public function destroy(Rab $rab)
    {
        $rab->delete();
        return redirect()->route('rabs.index')->with('success', 'RAB deleted successfully.');
    }
}
