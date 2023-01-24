@extends('admin.layout.atemplate')
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Welcome {{ Auth::user()->name }}</h5>
            <p>semua sistem berjalan dengan lancar!</p>
            <p>&nbsp;</p>
          </div>
        </div>

      </div>
      <div class="col-lg-6">

        <div class="card">
          <img src="{{asset('templating/assets/')}}/img/bg1.png" class="img-fluid" alt="Responsive image">
        </div>

      </div>

      <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jumlah Guru</h5>
            <h1 class="text-black font-weight-bold" style="color: #012f74;">{{$jguru}}</h1>
          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jumla Mapel</h5>
            <h1 class="text-black font-weight-bold" style="color: #012f74;">{{$jmapel}}</h1>
          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Jumlah Siswa</h5>
            <h1 class="text-black font-weight-bold" style="color: #012f74;">{{$jsiswa}}</h1>
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