@extends('admin.layout.atemplate')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manajemen Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Nilai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data</h5>
                        <hr>
                        <!-- Vertical Form -->
                        <form action="{{route('nilai.store')}}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Pilih Wali Kelas</label>
                                <select class="form-control" name="id_guru" id="id_guru">
                                    @foreach ($guru as $guru)

                                    <option value="{{$guru->id_guru}}">{{$guru->nama_guru}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Pilih Siswa</label>
                                <select class="form-control" name="id_siswa" id="id_siswa">
                                    @foreach ($siswa as $siswa)

                                    <option value="{{$siswa->id_siswa}}">{{$siswa->nama}}</option>

                                    @endforeach
                                </select>
                            </div>                            
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Pilih Mapel</label>
                                <select class="form-control" name="id_mapel" id="id_mapel">
                                    @foreach ($mapel as $mapel)

                                    <option value="{{$mapel->id_mapel}}">{{$mapel->nama_mapel}}</option>

                                    @endforeach     
                                </select>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('nilai.index')}}" class="btn btn-default">
                                    Batal
                                </a>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Sistem Informasi Perhitungan Nilai Mata Pelajaran</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="#">iidmzawldn</a>
    </div>
</footer>
<!-- End Footer -->
@endsection