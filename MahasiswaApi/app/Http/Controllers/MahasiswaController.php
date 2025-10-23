<?php

namespace App\Http\Controllers;

use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(5);
        return new MahasiswaResource($mahasiswa);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
        ]);

        return new MahasiswaResource($mahasiswa, true, "Data Mahasiswa Berhasil Ditambahkan");
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return new MahasiswaResource($mahasiswa, true, "Data Mahasiswa Berhasil Ditampilkan");
    }

    public function update(Request $request, $id){
        Log::info('Update Request Data:', $request->all());

        $validator = Validator::make($request->all(), [
            'nim' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            Log::error('Validation Errors:', [
                'errors' => $validator->errors(),
                'request_values' => $request->all()
            ]);

            return response()->json([
                'errors' => $validator->errors(),
                'request_values' => $request->all()
            ], 422);
        }

        $mahasiswa = Mahasiswa::find($id);

        Log::info('Mahasiswa Before Update:', $mahasiswa->toArray());

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
        ]);

        Log::info('Mahasiswa After Update:', $mahasiswa->toArray());

        return new MahasiswaResource($mahasiswa, true, "Data Mahasiswa Berhasil Diubah");
    }

    public function destroy($id) {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return new MahasiswaResource($mahasiswa, true, "Data Mahasiswa Berhasil Dihapus");
    }
}
