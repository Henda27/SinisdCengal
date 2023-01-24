<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $guru = Guru::get_all();
        return view('admin.siswa.index')->with('siswa',$siswa)->with('guru', $guru);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('admin.siswa.create')->with('guru', $guru);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_guru' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            
        ]);
        $array = $request->only([
            'id_guru','nis', 'nama',
        ]);
        
        $siswa = Siswa::create($array);
        return redirect()->route('siswa.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_siswa)
    {
        $guru = Guru::all();
        $siswa = Siswa::find($id_siswa);
        if (!$siswa) {
            return redirect()->route('siswa.index')
                ->with(['error' => 'Data siswa dengan id' . $id_siswa . ' tidak ditemukan']);
        }

        return view('admin.siswa.edit')->with('siswa',$siswa)->with('guru',$guru);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_siswa)
    {
        $request->validate([
            'id_guru' => 'required',
            'nis' => 'required',
            'nama' => 'required',
        ]);

        $siswa = Siswa::find($id_siswa);
        $siswa->id_guru = $request->id_guru;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;

        $siswa->save();
        return redirect()->route('siswa.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_siswa)
    {
        $siswa = Siswa::where('id_siswa', $id_siswa)
        ->delete();

        return redirect()->route('siswa.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
