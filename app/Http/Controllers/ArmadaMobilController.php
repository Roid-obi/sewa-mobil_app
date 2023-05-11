<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;

class ArmadaMobilController extends Controller
{
    public function list(Request $request) {
        $search = $request->input('search');
        $mobils = mobil::where('tipe_mobil', 'like', "%$search%")
            ->orWhere('plat_nomor', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
        return view('armada-mobil', compact('mobils', 'search'));
    }
        
            // menyimpan sopir baru ke database
            public function store(Request $request) {
                $mobil = new mobil();
                $mobil->plat_nomor = $request->input('plat_nomor');
                
                $mobil->save();
                return redirect()->route('armada-mobil.list');
            }
        
            // menyimpan perubahan pada sopir ke database
            public function update(Request $request, $id) {
                $mobil = mobil::findOrFail($id);
                $mobil->plat_nomor = $request->input('plat_nomor');
                $mobil->save();
                return redirect()->route('armada-mobil.list');
            }
        
            // menghapus sopir dari database
            // public function destroy($id) {
            //     $mobil = mobil::findOrFail($id);
            //     $mobil->delete();
            //     return redirect()->route('mobil.list');
            // }
}
