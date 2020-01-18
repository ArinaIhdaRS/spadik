@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')
    
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data Guru</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Kelas</h1>
        </div>
    </div><!--/.row-->

    @if (\Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-check-circle-o">&nbsp;</em> {{ \Session::get('success') }} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{route('savekelas', $kelas->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input class="form-control" type="text" placeholder="{{$kelas->namakelas}}" name="namakelas" value="{{$kelas->namakelas}}" required>
                            </div>

                            <div class="form-group">
                                <label>Usia Siswa</label>
                                <input class="form-control" placeholder="{{$kelas->usiasiswa}}" name="usiasiswa" value="{{$kelas->usiasiswa}}" required>
                            </div>

                            <div class="form-group">
                                <label>Wali Kelas</label>
                                <select class="form-control" name="id_users" required>
                                    <option value="">Pilih Guru</option>
                                    @foreach ($walikelas as $wali)
                                    <option value="{{ $wali->id }}">{{ $wali->nama}}</option>
                                    @endforeach
                                </select>
                            </div>    

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection