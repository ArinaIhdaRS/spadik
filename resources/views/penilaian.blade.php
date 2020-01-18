@extends('layouts.app')

@section('title', 'Penilaian Anak Didik')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Penilaian Anak</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Buat Penilaian Anak Didik</h1>
        </div>
	</div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><em class="fa fa-th-large">&nbsp;</em> Penilaian Aspek</div>
                <div class="panel-body">
                    <p align="center">Buat Penilaian Aspek</p>
                    <a href="{{route('buatpenilaianaspek')}}" class="btn btn-primary col-md-12"> Buat Penilaian</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><em class="fa fa-star">&nbsp;</em> Penilaian Indikator</div>
                <div class="panel-body">
                    <p align="center">Buat Penilaian Indikatork</p>
                    <a href="{{route('buatpenilaianindikator')}}" class="btn btn-primary col-md-12"> Buat Penilaian</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><em class="fa fa-check">&nbsp;</em> Penilaian Ceklis</div>
                <div class="panel-body">
                    <p align="center">Buat Penilaian Ceklis</p>
                    <a href="{{route('buatpenilaianceklis')}}" class="btn btn-primary col-md-12"> Buat Penilaian</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><em class="fa fa-comment">&nbsp;</em> Penilaian Anekdot</div>
                <div class="panel-body">
                    <p align="center">Buat Penilaian Anekdot</p>
                    <a href="{{route('buatpenilaiananekdot')}}" class="btn btn-primary col-md-12"> Buat Penilaian</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><em class="fa fa-paperclip">&nbsp;</em> Penilaian Hasil Karya</div>
                <div class="panel-body">
                    <p align="center">Buat Penilaian Hasil Karya</p>
                    <a href="" class="btn btn-primary col-md-12"> Buat Penilaian</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><em class="fa fa-puzzle-piece">&nbsp;</em> Penilaian Unjuk Karya</div>
                <div class="panel-body">
                    <p align="center">Buat Penilaian Unjuk Karya</p>
                    <a href="" class="btn btn-primary col-md-12"> Buat Penilaian</a>
                </div>
            </div>
        </div>
    </div>

@endsection