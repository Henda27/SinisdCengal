<?php

namespace App\Http\Controllers;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();

        return view('admin.mapel.index',[
            'mapel' => $mapel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mapel.create');
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
            'nama_mapel' => 'required',
            
        ]);
        $array = $request->only([
            'nama_mapel', 
        ]);
        
        $mapel = Mapel::create($array);
        return redirect()->route('mapel.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit($id_mapel)
    {
        $mapel = Mapel::find($id_mapel);
        if (!$mapel) {
            return redirect()->route('mapel.index')
                ->with(['error' => 'Data Mapel dengan id' . $id_mapel . ' tidak ditemukan']);
        }

        return view('admin.mapel.edit', [
            'mapel' => $mapel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mapel)
    {
        $request->validate([
            'nama_mapel' => 'required',
        ]);

        $mapel = Mapel::find($id_mapel);
        $mapel->nama_mapel = $request->nama_mapel;

        $mapel->save();
        return redirect()->route('mapel.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_mapel)
    {
        $mapel = Mapel::where('id_mapel', $id_mapel)
        ->delete();

        return redirect()->route('mapel.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
