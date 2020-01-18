@extends('layouts.app')

@section('title', 'Penilaian Anak Didik')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Penilaian</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Penilaian Anekdot</h1>
        </div>
	</div>

    <div class="row">            
        <div class="col-lg-12">
            <div class="panel panel-default">
                <form role="form" method="POST" action="{{route('insertnilaianekdot')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel-heading">Buat Penilaian Anekdot</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input class="form-control" type="date" name="tglanekdot" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Nama Anak</label>
                                <select class="form-control" name="id_datasiswa">
                                    <option value="">Pilih Anak</option>
                                    @foreach($siswa as $ssw)
                                    <option value="{{$ssw->id}}">{{$ssw->namalengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat</label>
                                <input class="form-control" type="text" name="tempatanekdot" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <input class="form-control" type="text" name="waktuanekdot" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Peristiwa</label>
                                <input class="form-control" type="text" name="peristiwa" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-default">Reset</button>    
                    </div>
                </form>
            </div>
        </div>
    </div>        


@endsection