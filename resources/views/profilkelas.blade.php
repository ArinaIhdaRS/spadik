@extends('layouts.app')

@section('title', 'Profil')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Profil</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profil Kelas</h1>
        </div>
        <div class="col-lg-12">
        	<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Data Kelas</a></li>
							<li><a href="#tab2" data-toggle="tab">Data Anak Didik</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<h3>Kelas/Kelompok {{$kelas->namakelas}}</h3>
								<div class="table">
                                    <table class="table fixed-table-container">
                                        <tr>
                                            <td>Wali Kelas</td>
                                            <td>{{$kelas->user->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Murid</td>
                                            <td>{{$jumlahsiswa}}</td>
                                        </tr>
                                        <tr>
                                            <td>Rata-rata nilai kelas</td>
                                            <td><b>sum</b></td>
                                        </tr>
                                    </table>
                                </div>
							</div>
							<div class="tab-pane fade" id="tab2">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Data Anak Didik
                                            </div>
                                            <div class="panel-body">
                                                <div class="table">
                                                    <table class="table fixed-table-container">
                                                        <thead>
                                                            <tr class="">
                                                                <th class="column1">NISN</th>
                                                                <th class="column2">Nama</th>
                                                                <th class="column3">TTL</th>
                                                                <th class="column4">Alamat</th>
                                                                <th class="column5">Orang Tua</th>
                                                                <th class="column6">Lengkap</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($siswa as $ssw)
                                                                <tr>
                                                                    <td class="column1">{{$ssw->nisn}}</td>
                                                                    <td class="column2">{{$ssw->namalengkap}}</td>
                                                                    <td class="column3">{{$ssw->templhir}}, {{$ssw->tgllahir}}</td>
                                                                    <td class="column4">{{$ssw->alamat}}</td>
                                                                    <td class="column5">{{$ssw->namaibu}}, {{$ssw->namaayah}}</td>
                                                                    <td class="column6">
                                                                    	<a href="{{route('showdatasiswa', $ssw->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</a>
                                                                	</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
        </div>
	</div>

@endsection