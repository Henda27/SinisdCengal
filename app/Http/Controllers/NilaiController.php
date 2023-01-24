<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\NilaiUas;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Mapel;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d = NilaiUas::with('guru')->with('siswa')->with('mapel')->get();
        return view('admin.nilai.index', compact('d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        return view('admin.nilai.create')->with('guru', $guru)->with('siswa', $siswa)->with('mapel', $mapel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = New NilaiUas;
        $add->id_guru = $request->get('id_guru');
        $add->id_siswa = $request->get('id_siswa');
        $add->id_mapel = $request->get('id_mapel');

        $result = $add->save();

        if($result){
            return redirect()->route('nilai.index')
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
    public function edit($id_nilai)
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        $mapel = Mapel::all();
        $d = NilaiUas::find($id_nilai);
        if (!$d) {
            return redirect()->route('nilai.index')
                ->with(['error' => 'Data nilai dengan id' . $id_nilai . ' tidak ditemukan']);
        }

        return view('admin.nilai.edit')->with('nilai',$d)->with('guru',$guru)->with('siswa', $siswa)->with('mapel', $mapel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_nilai)
    {
        $request->validate([
            'id_guru' => 'required',
            'id_siswa' => 'required',
            'id_mapel' => 'required',
        ]);

        $d = NilaiUas::find($id_nilai);
        $d->id_guru = $request->id_guru;
        $d->id_siswa = $request->id_siswa;
        $d->id_mapel = $request->id_mapel;

        $d->save();
        return redirect()->route('nilai.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_nilai)
    {
        $nilai = NilaiUas::where('id_nilai', $id_nilai)
        ->delete();

        return redirect()->route('nilai.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
