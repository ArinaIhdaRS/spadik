@extends('layouts.app')

@section('title', 'Rencana Pembelajaran Mingguan')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Rencana Belajar</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rencana Pembelajaran Mingguan</h1>
        </div>
	</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">RPPM Minggu Ini
                        <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                        <p>preview rppm</p> 
                        <button type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Edit</button>
                        <button type="button" class="btn btn-sm btn-primary"><em class="fa fa-print"></em> Cetak</button>
                    </div>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Semua RPPM</div>
                <div class="panel-body">
                    <div class="table">
                    <table class="table fixed-table-container">
                        <thead>
                            <tr class="">
                                <th class="column1">Minggu</th>
                                <!-- <th class="column2">Hari/Tanggal</th>
                                <th class="column3">Aspek</th>
                                <th class="column4">Alamat</th>
                                <th class="column5">Orang Tua</th>
                                <th class="column6">Lengkap</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="column1"><a href="#">Minggu ke 1</a></td>
                            <td class="column1"><a href="#">Minggu ke 2</a></td>
                            <td class="column1"><a href="#">Minggu ke 3</a></td>
                            <td class="column1"><a href="#">Minggu ke 4</a></td>                        
                        </tr>
                                <!-- <tr>
                                    <td class="column1">1</td>
                                    <td class="column2">Arina Ihda Rahmah Syarifah</td>
                                    <td class="column3">120304</td>
                                    <td class="column4">Dimana</td>
                                    <td class="column5">AAAAAAAAAAAA</td>
                                    <td class="column6">
                                        <button type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column1">2</td>
                                    <td class="column2">aaaaaaaaaaaa</td>
                                    <td class="column3">120304</td>
                                    <td class="column4">Dimana</td>
                                    <td class="column5">AAAAAAAAAAAA</td>
                                    <td class="column6">
                                        <button type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column1">3</td>
                                    <td class="column2">aaaaaaaaaaaa</td>
                                    <td class="column3">120304</td>
                                    <td class="column4">jalan. adadasfasfasfa adaffa, nomor 234, kec. afsggfdsa, kab. afsfdgrgtdfd</td>
                                    <td class="column5">AAAAAAAAAAAA</td>
                                    <td class="column6">
                                        <button type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</button>
                                    </td>
                                </tr>
                                 -->
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection