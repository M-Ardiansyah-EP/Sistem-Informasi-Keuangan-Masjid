<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
{
    // Mengambil semua data kas dan mengurutkannya berdasarkan tanggal
    $kas = Kas::orderBy('tanggal')->get();

    // Menginisialisasi saldo awal
    $saldo_akhir_total = 0;

    // Menghitung saldo akhir untuk setiap transaksi dan mengupdate saldo akhir total
    foreach ($kas as $transaksi) {
        if ($transaksi->jenis == 'pemasukan') {
            $saldo_akhir_total += $transaksi->jumlah;
        } else {
            $saldo_akhir_total -= $transaksi->jumlah;
        }
        $transaksi->saldo_akhir = $saldo_akhir_total;
        $transaksi->save();
    }

    // Mengambil ulang semua data kas setelah diupdate
    $kas = Kas::orderBy('tanggal')->get();

    // Mengembalikan tampilan bersama data yang telah diupdate
    $totalpemasukan = $kas->where('jenis', 'pemasukan')->sum('jumlah');
    $totalpengeluaran = $kas->where('jenis', 'pengeluaran')->sum('jumlah');
    return view('kas.index', compact('kas', 'saldo_akhir_total', 'totalpemasukan', 'totalpengeluaran'));
}


    public function create()
    {
        return view('kas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required',
        ]);

        $request['jumlah'] = str_replace('.','', $request['jumlah']);

        $saldo_akhir = $this->hitungSaldoAkhir($request->jenis, $request->jumlah);

        Kas::create([
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'saldo_akhir' => $saldo_akhir,
        ]);

        return redirect()->route('kas.index')->with('success', 'Kas created successfully.');
    }

    public function edit(Kas $ka)
    {
        return view('kas.edit', compact('ka'));
    }

    public function update(Request $request, Kas $ka)
{
    $request->validate([
        'tanggal' => 'required|date',
        'kategori' => 'nullable|string',
        'jenis' => 'required|in:pemasukan,pengeluaran',
        'jumlah' => 'required',
    ]);

    $request['jumlah'] = str_replace('.','', $request['jumlah']);

    // Mendapatkan saldo terakhir sebelum data ini diperbarui
    $saldo_sebelumnya = Kas::where('id', '<>', $ka->id)->orderBy('tanggal', 'desc')->orderBy('id', 'desc')->first();
    $saldo_sebelumnya = $saldo_sebelumnya ? $saldo_sebelumnya->saldo_akhir : 0;

    // Menghitung perubahan saldo akibat perubahan data
    $perubahan_saldo = $ka->jumlah;

    // Periksa apakah jenis transaksi diperbarui
    if ($request->jenis != $ka->jenis) {
        if ($ka->jenis == 'pemasukan') {
            $perubahan_saldo *= -1; // Kurangi jumlah jika sebelumnya adalah pemasukan
        } else {
            $perubahan_saldo *= 1; // Tambah jumlah jika sebelumnya adalah pengeluaran
        }
    } else {
        // Periksa apakah jumlah transaksi diperbarui
        $perubahan_saldo = $request->jumlah - $ka->jumlah;
    }

    // Perbarui saldo akhir untuk data setelah data ini
    $kas_setelahnya = Kas::where('tanggal', '>', $ka->tanggal)->get();
    foreach ($kas_setelahnya as $kas) {
        $kas->saldo_akhir += $perubahan_saldo;
        $kas->save();
    }

    // Hitung saldo akhir untuk data yang diperbarui
    $saldo_akhir = $saldo_sebelumnya + $perubahan_saldo;

    // Perbarui data
    $ka->update([
        'tanggal' => $request->tanggal,
        'kategori' => $request->kategori,
        'jenis' => $request->jenis,
        'jumlah' => $request->jumlah,
        'saldo_akhir' => $saldo_akhir,
    ]);

    return redirect()->route('kas.index')->with('success', 'Kas updated successfully.');
}

    public function destroy(Kas $ka)
    {
        $ka->delete();
        return redirect()->route('kas.index')->with('success', 'Kas deleted successfully.');
    }

    private function hitungSaldoAkhir($jenis, $jumlah, $id = null)
    {
        // Mendapatkan saldo terakhir dari database
        $saldo_sebelumnya = Kas::where('id', '<>', $id)->orderBy('tanggal', 'desc')->orderBy('id', 'desc')->first();

        $saldo_sebelumnya = $saldo_sebelumnya ? $saldo_sebelumnya->saldo_akhir : 0;

        // Menghitung saldo akhir
        if ($jenis == 'pemasukan') {
            return $saldo_sebelumnya + $jumlah;
        } else {
            return $saldo_sebelumnya - $jumlah;
        }
    }
}
