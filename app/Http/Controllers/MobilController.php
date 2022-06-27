<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function __construct()
    {
        $this->Mobil = new Mobil();
    }

    public function index()
    {
        $mobil = Mobil::all();
        return response()->json(['Success' => 'Request Berhasil', 'Data' => $mobil]);
    }
    public function store(Request $request)
    {
        $val = $request->validate([
            'mesin' => 'required',
            'kapasitas_penumpang' => 'required',
            'type' => 'required',
        ]);
        $mobil = Mobil::create($val);
        return response()->json(['Message' => 'Data berhasil disimpan.', 'Data' => $mobil]);
    }
    public function detail($mesin)
    {
        $mobil = $this->Mobil->detail($mesin);
        if (is_null($mobil)) {
            return response()->json(['Message' => 'Data tidak ditemukan.']);
        }
        return response()->json(['Success' => 'Request berhasil.', 'Data' => $mobil]);
    }
    public function update(Request $request, $id)
    {
        $mobil = Mobil::find($id);
        if (is_null($mobil)) {
            return response()->json(['Message' => 'Data tidak ditemukan.']);
        }
        $mobil->update($request->all());
        return response()->json(['Message' => 'Data berhasil diupdate.', 'Data' => $mobil]);
    }
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        if (is_null($mobil)) {
            return response()->json('Data not found', 404);
        }
        $mobil->delete();
        return response()->json(['Message' => 'Data berhasil dihapus.']);
    }
}
