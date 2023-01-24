@extends('guru.layout.gtemplate')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<style>
    .page-item.active .page-link{
        z-index: 3;
        color: #fff !important  ;
        background-color: #00ACD6 !important;
        border-color: #00ACD6 !important;
        border-radius: 50%;
        padding: 6px 12px;
    }
    .page-link{
        z-index: 3;
        color: #00ACD6 !important;
        background-color: #fff;
        border-color: #007bff;
        border-radius: 50%;
        padding: 6px 12px !important;
    }
    .page-item:first-child .page-link{
        border-radius: 30% !important;
    }
    .page-item:last-child .page-link{
        border-radius: 30% !important;   
    }
    .pagination li{
        padding: 3px;
    }
    .disabled .page-link{
        color: #212529 !important;
        opacity: 0.5 !important;
    }
</style>
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Rekap Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Rekap Nilai</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <table id="table_id" class="table table-bordered table-stripped display">
                            <thead>
                                <tr>
                                    <th colspan="2">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Mapel</th>
                                    <th>Tema 1</th>
                                    <th>Tema 2</th>
                                    <th>Tema 3</th>
                                    <th>Tema 4</th>
                                    <th>Tema 5</th>
                                    <th>Nilai Akhir</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $nilaiMp)
                                <form action="{{ url('/guru/uasUpdate') }}" method="POST">
                                    @csrf
                                <tr>
                                    <td colspan="2">{{$key+1}}</td>
                                    <td hidden="hidden">{{$nilaiMp->id_nilai}}<input type="text" name="id_nilai" id="id_nilai" class="form-control" value="{{$nilaiMp->id_nilai}}"></td>
                                    <td>{{$nilaiMp->siswa->nama}}</td>
                                    <td>{{$nilaiMp->mapel->nama_mapel}}</td>
                                    <td><input type="text" name="tema1" id="tema1" class="form-control" value="{{$nilaiMp->tema1}}"></td>
                                    <td><input type="text" name="tema2" id="tema2" class="form-control" value="{{$nilaiMp->tema2}}"></td>
                                    <td><input type="text" name="tema3" id="tema3" class="form-control" value="{{$nilaiMp->tema3}}"></td>
                                    <td><input type="text" name="tema4" id="tema4" class="form-control" value="{{$nilaiMp->tema4}}"></td>
                                    <td><input type="text" name="tema5" id="tema5" class="form-control" value="{{$nilaiMp->tema5}}"></td>
                                    <td><input type="text" value="{{$nilaiMp->nilai_akhir ?? old('nilai_akhir')}}" class="form-control" readonly></td>
                                    <td style="text-align: center;">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            {{ $data->links('vendor.pagination.custom')}}
                        </div>
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