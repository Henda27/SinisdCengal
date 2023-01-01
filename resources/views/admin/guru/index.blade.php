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
              <h5 class="card-title">Data Guru</h5>
              <hr>
              <a href="{{route('guru.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle-dotted"></i> Tambah Data</a>
              <div>&nbsp;</div>
              <table class="table table-hover table-bordered table-stripped display" id="table_id">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Wali Kelas</th>
                        <th>Email</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($guru as $key => $guru)
                    <tr>
                    <td>{{$key+1}}</td>
                        <td>{{$guru->nip}}</td>
                        <td>{{$guru->nama_guru}}</td>
                        <td>{{$guru->kelas}}</td>
                        <td>{{$guru->email}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('guru.edit', $guru)}}" class="bi bi-pencil"></a>
                            |
                            <a href="{{route('guru.destroy', $guru)}}" onclick="notificationBeforeDelete(event, this)" class="bi bi-trash"></a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
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
  <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>