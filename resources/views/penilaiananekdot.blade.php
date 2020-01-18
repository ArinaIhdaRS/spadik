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
            <h1 class="page-header">Buat Penilaian Anekdot</h1>
        </div>
	</div>

    @if (\Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check-circle-o">&nbsp;</em> {{ \Session::get('success') }} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Semua Catatan Anekdot</div>
                <div class="panel-body">
                    <div>
                        <a href="{{route('penilaiananekdot')}}" type="button" class="btn btn-md btn-primary"><i class="fa fa-plus"></i>Tambah Catatan</a>
                    </div>
                    <br>
                    <div class="table">
                    <table class="table fixed-table-container">
                        <thead>
                            <tr class="">
                                <th class="column1">Hari/Tanggal</th>
                                <th class="column2">Nama Anak</th>
                                <th class="column3">Tempat</th>
                                <th class="column4">Waktu</th>
                                <th class="column5">Peristiwa</th>
                                <th class="column6">Lengkap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaianekdot as $anekdot)
                                <tr>
                                    <td class="column1">{{$anekdot->tglanekdot}}</td>
                                    <td class="column2">{{$anekdot->siswaanekdot->namalengkap}}</td>
                                    <td class="column3">{{$anekdot->tempatanekdot}}</td>
                                    <td class="column4">{{$anekdot->waktuanekdot}}</td>
                                    <td class="column5">{{$anekdot->peristiwa}}</td>
                                    <td class="column6">
                                        <a href="" type="button" class="btn btn-sm btn-primary"><em class="fa fa-pencil"></em> Edit</a>
                                        <a href="" type="button" class="btn btn-sm btn-danger"><em class="fa fa-trash"></em> Hapus</a>
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

@endsection
