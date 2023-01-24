@extends('admin.layout.atemplate')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manajemen Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Manajemen Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Siswa</h5>
                        <hr>
                        <!-- Vertical Form -->
                        <form action="{{route('siswa.update', $siswa)}}" method="POST" class="row g-3">
                            @method('PUT')
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
                                <label for="inputNanme4" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="inputNanme4" name="nis" value="{{$siswa->nis ?? old('nis')}}">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="inputNanme4" name="nama" value="{{$siswa->nama ?? old('nama')}}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('siswa.index')}}" class="btn btn-default">
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