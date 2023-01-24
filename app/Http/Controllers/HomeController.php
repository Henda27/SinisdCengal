<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Siswa;

class HomeController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guru.home');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $jguru = Guru::all()->count();
        $jmapel = Mapel::all()->count();
        $jsiswa = Siswa::all()->count();

        return view('admin.adminHome')
        ->with('jguru', $jguru)
        ->with('jmapel', $jmapel)
        ->with('jsiswa', $jsiswa);
    }
}
