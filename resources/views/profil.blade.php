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
            <h1 class="page-header">Profil Saya</h1>
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
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if ($profil->photo == NULL || "")
                    <p><i>Belum ada foto</i></p>
                    <a href="" data-toggle="modal" data-target="#Modalphoto{{$profil->id}}" class="btn btn-sm btn-info col-lg-12"><em class="fa fa-pencil"></em> Tambahkan Photo</a>
                    <div class="modal fade" id="Modalphoto{{$profil->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal style-form" action="{{ route('insertphotoprofil', $profil->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Tambahkan Foto Guru</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="form-group">
                                            <label>Foto Profil</label>
                                            <input type="file" name="photo" value="{{$profil->photo }}" accept="images/*" >
                                            <p class="help-block">Max: 1MB</p>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="table">
                        <img src="{{ asset('users/'.$profil->photo)}}" width="100%">
                    </div>
                    <a href="" type="button" class="btn btn-sm btn-info col-lg-12" data-toggle="modal" data-target="#Modaleditphoto{{$profil->id}}"><em class="fa fa-pencil"></em> Edit Photo</a>
                    <div class="modal fade" id="Modaleditphoto{{$profil->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal style-form" action="{{ route('editphotoprofil', $profil->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Foto Profil</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="form-group">
                                                <label>Foto Profil</label>
                                                <input type="file" name="photo" value="{{$profil->photo }}" accept="images/*" >
                                                <p class="help-block">Max: 1MB</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>     
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                                <tr class="">
                                    <td class="column1">NUPTK</td>
                                    <td class="column2">{{$profil->nuptk}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Nama</td>
                                    <td class="column2">{{$profil->nama}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">Alamat</td>
                                    <td class="column2">{{$profil->alamat}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">E-mail</td>
                                    <td class="column2">{{$profil->email}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">Tanggal Lahir</td>
                                    <td class="column2">{{$profil->tgllahir}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">Jabatan</td>
                                    <td class="column2">{{$profil->roles->jabatan}}</td>
                                </tr>
                        </table>
                    </div>
                    <a href="{{ route('editdataprofil', $profil->id)}}" type="button" class="btn btn-sm btn-info"><em class="fa fa-pencil"></em> Edit Data</a>
                </div>
            </div>
        </div>
    </div>
@endsection