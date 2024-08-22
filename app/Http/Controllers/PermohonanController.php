<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Dokument;
use App\Models\FotoKerusakan;
use App\Models\Inspeksi;
use App\Models\Kelurahan;
use App\Models\Logs;
use App\Models\Pejabat;
use App\Models\Permohonan;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PermohonanController extends Controller
{
    public function index()
    {
        $permohonan = Permohonan::with(['pejabat', 'bangunan'])->where('status', 'Pending')->get()->toArray();
        return view('permohonan.index', compact('permohonan'));
    }

    public function create(): View
    {
        $kecamatan = Kelurahan::select('kecamatan')->groupBy('kecamatan')->get()->toArray();
        $pejabat = Pejabat::where('user_id', Auth::user()->id)->get();
        $bangunan = Bangunan::where('user_id', Auth::user()->id)->get();
        return view('permohonan.create', compact('pejabat', 'bangunan', 'kecamatan'));
    }

    public function edit(Permohonan $permohonan): View
    {
        return view('permohonan.edit', compact('permohonan'));
    }

    public function inspeksi(): View
    {
        $permohonan = Permohonan::with(['pejabat', 'bangunan'])->where('status', 'Inspek')->get()->toArray();
        return view('permohonan.index', compact('permohonan'));
    }

    public function selesai_inspeksi(): View
    {
        $permohonan = Permohonan::with(['pejabat', 'bangunan'])->where('status', 'Selesai Inspek')->get()->toArray();
        return view('permohonan.index', compact('permohonan'));
    }

    public function accept(): View
    {
        $permohonan = Permohonan::with(['pejabat', 'bangunan'])->where('status', 'Accept')->get()->toArray();
        return view('permohonan.index', compact('permohonan'));
    }

    public function decline(): View
    {
        $permohonan = Permohonan::with(['pejabat', 'bangunan'])->where('status', 'Reject')->get()->toArray();
        return view('permohonan.index', compact('permohonan'));
    }

    public function proses(): View
    {
        $permohonan = Permohonan::with(['pejabat', 'bangunan'])->where('status', 'Pending')->when(Auth::user()->tipe_user == 'USER', function ($query) {
            $query->orWhere('status', '!=', 'Pending');
        })->get()->toArray();
        return view('permohonan.index', compact('permohonan'));
    }

    public function store(Request $request)
    {
        $request->request->add(['user_id' => Auth::user()->id]); //add request
        $data['pejabat'] = $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'nama_pejabat' => 'required|string',
            'telp' => 'required|string',
            'address' => 'required|string',
            'jabatan' => 'required|string',
            'sk_jabatan' => 'required|string',
            'nip' => 'required|string',
            'tipe_pejabat' => 'required|string',
        ]);
        $data['bangunan'] = $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'nama_bangunan' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'lokasi' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);
        $data['files'] = $this->validate($request, [
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'krk' => 'required|file|mimes:pdf|max:5120',
            'sertifikat' => 'required|file|mimes:pdf|max:2048',
            'surat_pernyataan' => 'required|file|mimes:pdf|max:2048',
        ]);
        $data['foto'] = $this->validate($request, [
            'foto' => 'required|array',
            'foto.*' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
        try {
            DB::beginTransaction();

            $pejabat = Pejabat::insertGetId($data['pejabat']);
            $bangunan = Bangunan::insertGetId($data['bangunan']);
            $request->request->add(['bangunan_id' => $bangunan]); //add request
            $request->request->add(['pejabat_id' => $pejabat]); //add request
            $data['permohonan'] = $this->validate($request, [
                'bangunan_id' => 'required|exists:bangunan,bangunan_id',
                'pejabat_id' => 'required|exists:pejabat,pejabat_id',
                'deskripsi_singkat' => 'required|string',
                'status_tanah' => 'required|string', 
                'nomor_sertifikat' => 'required|string', 
                'nama_sertifikat' => 'required|string', 
                'kode_kib' => 'required|string',
            ]);
            $data['permohonan']['tanggal_permohonan'] = date('Y-m-d');
            $data['permohonan']['status'] = 'Pending';
            $permohonan = Permohonan::insertGetId($data['permohonan']);
            foreach ($data['files'] as $key => $value) {
                $file = $value->store('files');
                Dokument::create([
                    'permohonan_id' => $permohonan,
                    'tipe_dokument' => $key,
                    'file' => $file,
                    'tanggal_upload' => date('Y-m-d'),

                ]);
            }
            foreach ($data['foto']['foto'] as $key => $value) {
                $foto = $value->store('foto');
                FotoKerusakan::create([
                    'permohonan_id' => $permohonan,
                    'foto' => $foto,
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error , Terjadi Kesalahan mohon tunggu dan ulangi lagi');
        }
        DB::commit();
        return redirect()->back()->with('success', 'Permohonan berhasil di kirimkan, Silahkan pantau pada Menu Proses Berkas');
    }

    public function update(Request $request, Permohonan $permohonan)
    {
        $data['pejabat'] = $this->validate($request, [
            'nama_pejabat' => 'required|string',
            'telp' => 'required|string',
            'address' => 'required|string',
            'jabatan' => 'required|string',
            'sk_jabatan' => 'required|string',
            'nip' => 'required|string',
            'tipe_pejabat' => 'required|string',
        ]);
        $data['bangunan'] = $this->validate($request, [
            'nama_bangunan' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'lokasi' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);
        $data['permohonan'] = $this->validate($request, [
            'deskripsi_singkat' => 'required|string',
            'status_tanah' => 'required|string', 
            'nomor_sertifikat' => 'required|string', 
            'nama_sertifikat' => 'required|string', 
            'kode_kib' => 'required|string',
        ]);
        $data['files'] = $request->validate([
            'ktp' => 'sometimes|file|mimes:pdf|max:2048',
            'krk' => 'sometimes|file|mimes:pdf|max:5120',
            'sertifikat' => 'sometimes|file|mimes:pdf|max:2048',
            'surat_pernyataan' => 'sometimes|file|mimes:pdf|max:2048',
        ]);
        $data['foto'] = $this->validate($request, [
            'foto' => 'sometimes|array',
            'foto.*' => 'sometimes|mimes:png,jpg,jpeg|max:2000',
        ]);
        try {
            DB::beginTransaction();
            $permohonan->pejabat()->update($data['pejabat']);
            $permohonan->bangunan()->update($data['bangunan']);
            $permohonan->update($data['permohonan']);
            if (!empty($data['files'])) {
                foreach ($data['files'] as $key => $value) {
                    $file = Dokument::where('tipe_dokument', $key)->where('permohonan_id', $permohonan->permohonan_id)->first();
                    if (Storage::exists($file->file)) {
                        Storage::delete($file->file);
                    }
                    $new_file = $value->store('files');
                    $file->update([
                        'file' => $new_file,
                        'tanggal_upload' => date('Y-m-d'),
                    ]);
                }
            }
            if (!empty($data['foto']['foto'])) {
                foreach ($data['foto']['foto'] as $key => $value) {
                    $foto = $value->store('foto');
                    FotoKerusakan::create([
                        'permohonan_id' => $permohonan->permohonan_id,
                        'foto' => $foto,
                    ]);
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error , Terjadi Kesalahan mohon tunggu dan ulangi lagi');
        }
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil di tambahkan');
    }

    public function show(Permohonan $permohonan): View
    {
        $inspektor = User::where('tipe_user', 'INSPEK')->get();
        return view('permohonan.detail', compact('permohonan', 'inspektor'));
    }
    public function destroy(Permohonan $permohonan)
    {
        try {
            DB::beginTransaction();
            $permohonan->pejabat()->delete();
            $permohonan->bangunan()->delete();

            foreach ($permohonan->foto_kerusakan()->get() as $key => $value) {
                if (Storage::exists($value->foto)) {
                    Storage::delete($value->foto);
                }
            }
            foreach ($permohonan->dokument()->get() as $key => $value) {
                if (Storage::exists($value->file)) {
                    Storage::delete($value->file);
                }
            }
            $permohonan->foto_kerusakan()->delete();
            $permohonan->dokument()->delete();
            $permohonan->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
        DB::commit();
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }

    public function kelurahan(Request $request)
    {
        $data['kelurahan'] = Kelurahan::select('id', 'kecamatan', 'kelurahan')
            ->where('kecamatan', $request->kecamatan)
            ->when($request->name, function ($query) use ($request) {
                $query->where('kelurahan', 'like', '%' . $request->name . '%');
            })
            ->get();
        $data = [
            'code' => 200,
            'message' => 'Successfully Get Data',
            'data' => $data,
        ];
        return response()->json($data, 200);
    }

    public function kecamatan(Request $request)
    {
        $data['kecamatan'] = Kelurahan::select('id', 'kecamatan', 'kelurahan')
            ->when($request->name, function ($query) use ($request) {
                $query->where('kecamatan', 'like', '%' . $request->name . '%');
            })->groupBy('kecamatan')
            ->get();
        $data = [
            'code' => 200,
            'message' => 'Successfully Get Data',
            'data' => $data,
        ];
        return response()->json($data, 200);
    }

    public function kirim(Request $request, Permohonan $permohonan)
    {
        try {
            $request->request->add(['permohonan_id' => $permohonan->permohonan_id]); //add request
            if($request->status == 'Reject'){
                $request->request->add(['to_user_id' => $permohonan->pejabat->user_id]); //add request
            }
            if($request->status == 'Accept'){
                $request->request->add(['to_user_id' => User::where('tipe_user', 'ADMIN')->first()->id]); //add request
            }
            if($request->status == 'Inspek'){
                $permohonan->update([
                    'klasifikasi' => $request->klasifikasi,
                ]);
            }
            $data = $this->validate($request, [
                'user_id' => 'required|exists:users,id',
                'to_user_id' => 'required|exists:users,id',
                'permohonan_id' => 'required|exists:permohonan,permohonan_id',
                'catatan' => 'required|string',
                'status' => 'required|string',
            ]);
            Logs::create($data);
            Inspeksi::updateOrCreate([
                'permohonan_id' => $permohonan->permohonan_id,
            ],[
                'permohonan_id' => $permohonan->permohonan_id,
                'inspektor_id' => $data['to_user_id'],
            ]);
            $permohonan->update([
                'status' => $request->status,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error , Terjadi Kesalahan mohon tunggu dan ulangi lagi');
        }
        DB::commit();
        if($request->status == 'Inspek'){
            return redirect()->route('permohonan.proses')->with('success', 'Data berhasil di kirim');
        }else{
            return redirect()->route('permohonan.selesai_inspeksi')->with('success', 'Data berhasil di kirim');
        }
    }
}
