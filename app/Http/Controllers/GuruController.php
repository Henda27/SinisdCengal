<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();

        return view('admin.guru.index', [
            'guru' => $guru,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('is_admin', 0)->get();
        $guru = Guru::get_all();
        return view('admin.guru.create')->with('users', $users)->with('guru', $guru);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new Guru;
        $guru->nip = $request->get('nip');
        $guru->nama_guru = $request->get('nama_guru');
        $guru->kelas = $request->get('kelas');
        $guru->email = $request->get('email');
        $guru->password = Hash::make($request->get('password'));
        $simpan = $guru->save();
        if ($simpan) {
            $d = new User;
            $d->id_guru = $guru->id_guru;
            $d->name = $guru->nama_guru;
            $d->email = $request->get('email');
            $d->is_admin = '0';
            $d->password = Hash::make($request->get('password'));
            $result = $d->save();
        }

        if ($simpan && $result) {
            //     return json_encode(array('redirect'=>'Simpan Data Berhasil', 'content'=>$result, 'success'=>TRUE));
            // }else{
            //      return json_encode(array('msg'=>'Gagal Menyimpan Data', 'content'=>$result, 'success'=>FALSE));
        }

        if ($result) {
            return redirect()->route('guru.index')
                ->with(['success' => 'Data Berhasil Disimpan!']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_guru)
    {
        $guru = Guru::find($id_guru);
        if (!$guru) {
            return redirect()->route('guru.index')
                ->with(['error' => 'Data Guru dengan id' . $id_guru . ' tidak ditemukan']);
        }

        return view('admin.guru.edit', [
            'guru' => $guru,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_guru)
    {
        $guru = Guru::find($id_guru);
        
        if ($guru) {
            $guru->delete();
        }

        return redirect()->route('guru.index')
            ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
