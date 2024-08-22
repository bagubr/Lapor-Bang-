<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InspeksiController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $pemohon = User::select('id', 'name', 'email')->where('tipe_user', 'INSPEK')->get()->toArray();
        return view('inspektor.index', compact('pemohon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('inspektor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data['tipe_user'] = 'INSPEK';
        User::create($data);
        return redirect()->route('inspektor.index')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $inspektor) : View
    {
        return view('inspektor.detail', compact('inspektor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $inspektor) : View
    {
        return view('inspektor.edit', compact('inspektor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $inspektor) : RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        if($request->password){
            $this->validate($request, [
                'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
            ]);
        }
        $data['password'] = Hash::make($request->password);
        $inspektor->update($data);
        return redirect()->route('inspektor.index')->with('success', 'Data berhasil di update');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $inspektor)
    {
        $inspektor->delete();
        return redirect()->route('inspektor.index')->with('success', 'Data berhasil di dihapus');
    }
}
