<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model PakaianModel
use App\Models\PakaianModel;

class PakaianController extends Controller
{
    //method untuk tampil data pakaian
    public function pakaiantampil(){
        $daftarPakaian = PakaianModel::all();
        return view('halaman/view_pakaian', ['pakaian'=>$daftarPakaian]);
    }

    public function pakaiantambah(Request $request) {
        $pakaian = new PakaianModel;
        $pakaian->id_pakaian = $request->id_pakaian;
        $pakaian->merek_pakaian = $request->merek_pakaian;
        $pakaian->jenis_pakaian = $request->jenis_pakaian;
        $pakaian->ukuran = $request->ukuran;
        $pakaian->harga = $request->harga;
        $pakaian->save();
        return redirect('/pakaian');
    }

    public function pakaianhapus($id){
        $dataPakaian = PakaianModel::findOrfail($id);
        $dataPakaian->delete();
        return redirect('/pakaian');
    }

    public function pakaianedit(Request $request, $id) {
        $pakaian = PakaianModel::findOrfail($id);
        $pakaian->id_pakaian = $request->id_pakaian;
        $pakaian->merek_pakaian = $request->merek_pakaian;
        $pakaian->jenis_pakaian = $request->jenis_pakaian;
        $pakaian->ukuran = $request->ukuran;
        $pakaian->harga = $request->harga;
        $pakaian->save();
        return redirect('/pakaian');
    }
    
}
