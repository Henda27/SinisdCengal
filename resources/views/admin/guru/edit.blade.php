@extends('admin.layout.atemplate')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manajemen Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Manajemen Guru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Guru</h5>
                        <hr>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-info-circle me-1"></i>
                            Nama diisi lengkap dengan gelar 
                            <br> 
                            <i class="bi bi-info-circle me-1"></i>
                            Wali kelas diisi dengan angka
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- Vertical Form -->
                        <form action="{{route('guru.update', $guru)}}" method="POST" class="row g-3">
                            @method('PUT')
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="inputNanme4" name="nip" value="{{$guru->nip ?? old('nip')}}">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputNanme4" name="nama_guru" value="{{$guru->nama_guru ?? old('nama_guru')}}">
                            </div>
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Wali Kelas</label>
                                <input type="text" class="form-control" id="inputNanme4" name="kelas" value="{{$guru->kelas ?? old('kelas')}}">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$guru->email ?? old('email')}}">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password" value="{{old('password')}}">
                            </div>                            
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="inputAddress" placeholder="" name="password_confirmation">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('guru.index')}}" class="btn btn-default">
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