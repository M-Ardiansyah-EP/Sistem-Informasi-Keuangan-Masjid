<?php

namespace App\Http\Controllers;

use App\Models\Beban;
use Illuminate\Http\Request;

class BebanController extends Controller
{
    public function index()
    {
        $beban = Beban::all();
        return view('beban.index', compact('beban'));
    }

    public function create()
    {
        return view('beban.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'nullable',
            'jumlah' => 'required',
        ]);

        $request['jumlah'] = str_replace('.','', $request['jumlah']);

        Beban::create($request->all());

        return redirect()->route('beban.index')
            ->with('success', 'beban created successfully.');
    }

    public function edit($id)
    {
        $beban = Beban::find($id);
        return view('beban.edit', compact('beban'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'nullable',
            'jumlah' => 'required',
        ]);

        $request['jumlah'] = str_replace('.','', $request['jumlah']);

        $beban = Beban::find($id);
        $beban->update($request->all());

        return redirect()->route('beban.index')
            ->with('success', 'beban updated successfully');
    }

    public function destroy($id)
    {
        $beban = Beban::find($id);
        $beban->delete();

        return redirect()->route('beban.index')
            ->with('success', 'beban deleted successfully');
    }
}
