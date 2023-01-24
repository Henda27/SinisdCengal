@extends('admin.layout.atemplate')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Manajemen Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Manajemen Pengguna</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Pengguna</h5>
                        <hr>
                        <!-- Vertical Form -->
                        <form action="{{route('users.store')}}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="inputNanme4" name="name" value="{{old('name')}}">
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" value="{{old('email')}}">
                            </div>
                            <div class="col-12">
                            <label for="inputEmail4" class="form-label">Role</label>
                                <select name="is_admin" id="" class="form-control">
                                    <option>----- Pilih Role -----</option>
                                    <!-- <option if="" ($is_admin="=" 1="" )="" echo="" 'selected'="" ;="" ?="">Admin</option>
                                    <option if="" ($is_admin="=" 0="" )="" echo="" 'selected'="" ;="" ?="">0</option> -->
                                    <option value="1">Admin</option>
                                    <option value="0">Guru</option>
                                </select>
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
                                <a href="{{route('users.index')}}" class="btn btn-default">
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