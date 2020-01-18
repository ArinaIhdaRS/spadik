@extends('layouts.app')

@section('title', 'Edit Sentra')

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
            <h1 class="page-header">Edit Sentra</h1>
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
                    <form role="form" method="POST" action="{{route('savesentra', $sentra->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Sentra</label>
                                <input class="form-control" type="text" placeholder="{{$sentra->namasentra}}" name="namasentra" value="{{$sentra->namasentra}}" required>
                            </div>

                            <div class="form-group">
                                <label>Wali Kelas</label>
                                <select class="form-control" name="id_users" required>
                                    <option value="">Pilih Guru</option>
                                    @foreach ($role as $jbtn)
                                    <option value="{{ $jbtn->id }}">{{ $jbtn->jabatan}}</option>
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