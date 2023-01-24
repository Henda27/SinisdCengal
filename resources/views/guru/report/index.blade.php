@extends('guru.layout.gtemplate')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Report Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Report Nilai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-stripped display" id="report">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Mapel</th>
                                    <th>Nilai Akhir</th>
                                    <!-- <th style="text-align: center;">Opsi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($d as $key => $nilai)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$nilai->siswa->nama}}</td>
                                    <td>{{$nilai->mapel->nama_mapel}}</td>
                                    <td>{{$nilai->nilai_akhir}}</td>
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