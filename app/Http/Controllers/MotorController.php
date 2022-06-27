<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotorController extends Controller
{
    public function __construct()
    {
        $this->Motor = new Motor();
    }
    public function index()
    {
        $motor = Motor::all();
        return response()->json(['Success' => 'Request Berhasil', 'Data' => $motor]);
    }
    public function store(Request $request)
    {
        $val = $request->validate([
            'mesin' => 'required',
            'tipe_suspensi' => 'required',
            'tipe_transmisi' => 'required',
        ]);
        $motor = Motor::create($val);
        return response()->json(['Message' => 'Data berhasil disimpan.', 'Data' => $motor]);
    }
    public function detail($mesin)
    {
        $motor = $this->Motor->detail($mesin);
        if (is_null($motor)) {
            return response()->json(['Message' => 'Data tidak ditemukan.']);
        }
        return response()->json(['Success' => 'Request berhasil.', 'Data' => $motor]);
    }
    public function update(Request $request, $id)
    {
        $motor = Motor::find($id);
        if (is_null($motor)) {
            return response()->json(['Message' => 'Data tidak ditemukan.']);
        }
        $motor->update($request->all());
        return response()->json(['Message' => 'Data berhasil diupdate.', 'Data' => $motor]);
    }
    public function destroy($id)
    {
        $motor = Motor::find($id);
        if (is_null($motor)) {
            return response()->json('Data not found', 404);
        }
        $motor->delete();
        return response()->json(['Message' => 'Data berhasil dihapus.']);
    }
}
