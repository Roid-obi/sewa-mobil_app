<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    //
    public function list(Request $request) {
        $search = $request->input('search');
        $mobils = mobil::where('tipe_mobil', 'like', "%$search%")
            ->orWhere('plat_nomor', 'like', "%$search%")
            ->orWhere('bensin', 'like', "%$search%")
            ->orWhere('jumlah', 'like', "%$search%")
            ->orWhere('status', 'like', "%$search%")
            ->orWhere('jumlah_mobil', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
        return view('mobil', compact('mobils', 'search'));
    }
        
            // menyimpan sopir baru ke database
            public function store(Request $request) {
                $mobil = new mobil();
                $mobil->tipe_mobil = $request->input('tipe_mobil');
                $mobil->plat_nomor = $request->input('plat_nomor');
                $mobil->bensin = $request->input('bensin');
                $mobil->jumlah = $request->input('jumlah');
                $mobil->status = $request->input('status');
                $mobil->jumlah_mobil = $request->input('jumlah_mobil');
                $mobil->save();
                return redirect()->route('mobil.list');
            }
        
            // menyimpan perubahan pada sopir ke database
            public function update(Request $request, $id) {
                $mobil = mobil::findOrFail($id);
                $mobil->tipe_mobil = $request->input('tipe_mobil');
                $mobil->plat_nomor = $request->input('plat_nomor');
                $mobil->bensin = $request->input('bensin');
                $mobil->jumlah = $request->input('jumlah');
                $mobil->status = $request->input('status');
                $mobil->jumlah_mobil = $request->input('jumlah_mobil');
                $mobil->save();
                return redirect()->route('mobil.list');
            }
        
            // menghapus sopir dari database
            public function destroy($id) {
                $mobil = mobil::findOrFail($id);
                $mobil->delete();
                return redirect()->route('mobil.list');
            }
}
