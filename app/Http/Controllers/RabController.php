<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use Illuminate\Http\Request;

class RabController extends Controller
{
    public function index()
    {
        $rabs = Rab::all();
        return view('rabs.index', compact('rabs'));
    }

    public function create()
    {
        return view('rabs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required|date',
            'kategori' => 'nullable|string',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'keterangan' => 'required|string',
            'jumlah' => 'required',
        ]);

        $request['jumlah'] = str_replace('.','', $request['jumlah']);

        Rab::create($request->all());
        return redirect()->route('rabs.index')->with('success', 'RAB created successfully.');
    }

    public function edit(Rab $rab)
    {
        return view('rabs.edit', compact('rab'));
    }

    public function update(Request $request, Rab $rab)
    {
        $request->validate([
            'periode' => 'required|date',
            'kategori' => 'nullable|string',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'keterangan' => 'required|string',
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
