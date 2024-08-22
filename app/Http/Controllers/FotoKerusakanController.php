<?php

namespace App\Http\Controllers;

use App\Models\FotoKerusakan;
use App\Models\Inspeksi;
use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FotoKerusakanController extends Controller
{
    public function destroy(FotoKerusakan $foto_kerusakan)
    {
        $foto_kerusakan->delete();
        return redirect()->back()->with('success', 'Data berhasil di dihapus');
    }

    public function foto_inspeksi(Request $request, Inspeksi $inspeksi) {
        $request->request->add(['permohonan_id' => $inspeksi->permohonan_id]); //add request
        $request->request->add(['to_user_id' => User::where('tipe_user', 'ADMIN')->first()->id]); //add request
        $request->request->add(['user_id' => Auth::user()->id]); //add request
        try {
            DB::beginTransaction();
            $request->request->add(['status' => 'Selesai Inspek']); //add request
            $data = $this->validate($request, [
                'user_id' => 'required|exists:users,id',
                'to_user_id' => 'required|exists:users,id',
                'permohonan_id' => 'required|exists:permohonan,permohonan_id',
                'catatan' => 'required|string',
                'status' => 'required|string',
            ]);
            Logs::create($data);
            $data = $this->validate($request, [
                'foto' => 'sometimes|array',
                'foto.*' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
            if(!empty($data['foto'])){
                foreach ($data['foto'] as $key => $value) {
                    $foto = $value->store('foto');
                    FotoKerusakan::create([
                        'permohonan_id' => $inspeksi->permohonan_id,
                        'foto' => $foto,
                        'tipe_foto' => 'INSPEK'
                    ]);
                }
            }
            $inspeksi->update([
                'catatan_inspeksi' => $request->catatan_inspeksi,
                'tanggal_inspeksi' => date('Y-m-d'),
            ]);
            $inspeksi->permohonan->update([
                'status' => $request->status
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error, Coba Beberapa saat lagi');
        }
        DB::commit();
        return redirect()->route('permohonan.ispeksi')->with('success', 'Data Berhasil di kirim');
    }
}
