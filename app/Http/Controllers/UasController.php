<?php

namespace App\Http\Controllers;

use App\Models\NilaiUas;
use Illuminate\Http\Request;


class UasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = NilaiUas::with('guru')->with('siswa')->with('mapel')->paginate(10);
        return view('guru.uas.index', compact('data'));
    }

    public function nilaiUas(Request $request)
    {        

        $tema1 = $request->get('tema1');
        $tema2 = $request->get('tema2');
        $tema3 = $request->get('tema3');
        $tema4 = $request->get('tema4');
        $tema5 = $request->get('tema5');

        $add = NilaiUas::where('id_nilai', $request->get('id_nilai'))->firstOrFail();
        $add->id_nilai = $request->get('id_nilai');
        $add->tema1 = $request->get('tema1');
        $add->tema2 = $request->get('tema2');
        $add->tema3 = $request->get('tema3');
        $add->tema4 = $request->get('tema4');
        $add->tema5 = $request->get('tema5');
        $add->nilai_akhir = ($tema1 + $tema2 + $tema3 + $tema4 + $tema5) / 5;
        $add->jumlah = ($tema1 + $tema2 + $tema3 + $tema4 + $tema5);

        $result = $add->save();

        // $resultNilai = $nilai_akhir->save();
        
        if ($result) {
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
