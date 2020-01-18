@extends('layouts.app')

@section('title', 'Edit Data Guru')

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
            <h1 class="page-header">Data Guru</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{route('simpandataguru', $data_guru->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NUPTK</label>
                                <input class="form-control" type="text" placeholder="" name="nuptk" value="{{$data_guru->nuptk}}" >
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" placeholder="{{$data_guru->nama}}" name="nama" value="{{$data_guru->nama}}" >
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input class="form-control" type="date" placeholder="{{$data_guru->tgllahir}}" name="tgllahir" value="{{$data_guru->tgllahir}}" >
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control" name="id_role">
                                    <option value="{{$data_guru->id_role}}">{{$data_guru->roles->jabatan}}</option>
                                    @foreach ($role as $jbtn)
                                    <option value="{{ $jbtn->id }}">{{ $jbtn->jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" placeholder="{{$data_guru->email}}" name="email" value="{{$data_guru->email}}" >
                            </div>
                                
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" type="text" placeholder="{{$data_guru->alamat}}" name="alamat" value="{{$data_guru->alamat}}" ></input>
                            </div>    

                            <button type="submit" class="btn btn-primary">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection