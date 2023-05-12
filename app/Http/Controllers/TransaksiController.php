<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobils = mobil::all();
        $transaksis = Transaksi::all();
        return view('transaksi.pesanan-baru', compact('transaksis','mobils'));
    }


    public function peminjaman($id)
    {
        $mobils = mobil::all();
        $transaksis = Transaksi::all();
        $transaksi = Transaksi::find($id);
        $transaksi->status = 'dalam-peminjaman';
        $transaksi->save();

        return view('transaksi.dalam-peminjaman', compact('transaksis','mobils'))
            ->with('success', 'Transaksi berhasil diubah menjadi dalam-peminjaman');
    }

    public function pengembalian($id)
    {
        $mobils = mobil::all();
        $transaksis = Transaksi::all();
        $transaksi = Transaksi::find($id);
        $transaksi->status = 'pengembalian';
        $transaksi->save();

        return view('transaksi.pengembalian', compact('transaksis','mobils'))
            ->with('success', 'Transaksi berhasil diubah menjadi dalam-peminjaman');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_mobil' => 'required',
            'sopir' => 'required',
            'total_pembayaran' => 'required',
        ]);

        $transaksi = new Transaksi();
        $transaksi->nama_peminjam = Auth::user()->name;
        $transaksi->tipe_mobil = $request->input('tipe_mobil');
        $transaksi->sopir = $request->input('sopir');
        $transaksi->total_pembayaran = $request->input('total_pembayaran');
        $transaksi->status = 'pesanan-baru';
        $transaksi->save();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'tipe_mobil' => 'required',
            'sopir' => 'required',
            'total_pembayaran' => 'required',
            'status' => 'required',
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi deleted successfully');
    }
}
