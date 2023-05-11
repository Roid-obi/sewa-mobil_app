<?php

namespace App\Http\Controllers;

use App\Models\sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    // list semua sopir
    public function list(Request $request) {
        $search = $request->input('search');
        $sopirs = sopir::where('nama', 'like', "%$search%")
            ->orWhere('alamat', 'like', "%$search%")
            ->orWhere('jenis_kelamin', 'like', "%$search%")
            ->orWhere('status', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
        return view('sopir', compact('sopirs', 'search'));
    }


        // menampilkan form untuk membuat sopir baru
        public function create() {
            return view('sopir-create');
        }
    
        // menyimpan sopir baru ke database
        public function store(Request $request) {
            $sopir = new sopir();
            $sopir->nama = $request->input('nama');
            $sopir->alamat = $request->input('alamat');
            $sopir->jenis_kelamin = $request->input('jenis_kelamin');
            $sopir->status = $request->input('status');
            $sopir->save();
            return redirect()->route('sopir.list');
        }
    
        // menampilkan form untuk mengedit sopir
        public function edit($id) {
            $sopir = sopir::findOrFail($id);
            return view('sopir-edit', compact('sopir'));
        }
    
        // menyimpan perubahan pada sopir ke database
        public function update(Request $request, $id) {
            $sopir = sopir::findOrFail($id);
            $sopir->nama = $request->input('nama');
            $sopir->alamat = $request->input('alamat');
            $sopir->jenis_kelamin = $request->input('jenis_kelamin');
            $sopir->status = $request->input('status');
            $sopir->save();
            return redirect()->route('sopir.list');
        }
    
        // menghapus sopir dari database
        public function destroy($id) {
            $sopir = sopir::findOrFail($id);
            $sopir->delete();
            return redirect()->route('sopir.list');
        }
}
