@extends('admin.layout.atemplate')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Manajemen Mata Pelajaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Manajemen Mata Pelajaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <a href="{{route('mapel.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle-dotted"></i> Tambah Data</a>
              <div>&nbsp;</div>
              <table class="table table-hover table-bordered table-stripped display" id="table_id">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Mata Pelajaran</th>
                        <th style="text-align: center;">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($mapel as $key => $mapel)
                    <tr>
                    <td>{{$key+1}}</td>
                        <td>{{$mapel->nama_mapel}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('mapel.edit', $mapel)}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                            |
                            <a href="{{route('mapel.destroy', $mapel)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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