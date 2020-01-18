@extends('layouts.app')

@section('title', 'Data Guru')

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
                    @if ($dataguru->photo == NULL || "")
                    <p><i>Belum ada foto</i></p>
                    @can('isAdmin')
                    <a href="" data-toggle="modal" data-target="#Modalphoto{{$dataguru->id}}" class="btn btn-sm btn-info"><em class="fa fa-pencil"></em> Tambahkan Photo</a>
                    @endcan
                    <div class="modal fade" id="Modalphoto{{$dataguru->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal style-form" action="{{ route('insertphotoguru', $dataguru->id)}}" method="post" enctype="multipart/form-data">
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
                                            <input type="file" name="photo" value="{{$dataguru->photo }}" accept="images/*" >
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
                        <img src="{{ asset('users/'.$dataguru->photo)}}" width="100%">
                    </div>
                    @can('isAdmin')
                        <a href="" type="button" class="btn btn-sm btn-info"data-toggle="modal" data-target="#Modaleditphoto{{$dataguru->id}}"><em class="fa fa-pencil"></em> Edit Photo</a>
                    @endcan
                        <div class="modal fade" id="Modaleditphoto{{$dataguru->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal style-form" action="{{ route('editphotoguru', $dataguru->id)}}" method="post" enctype="multipart/form-data">
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
                                                <input type="file" name="photo" value="{{$dataguru->photo }}" accept="images/*" >
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
                                    <td class="column2">{{$dataguru->nuptk}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Nama</td>
                                    <td class="column2">{{$dataguru->nama}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">Alamat</td>
                                    <td class="column2">{{$dataguru->alamat}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">E-mail</td>
                                    <td class="column2">{{$dataguru->email}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">Tanggal Lahir</td>
                                    <td class="column2">{{$dataguru->tgllahir}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">Jabatan</td>
                                    <td class="column2">{{$dataguru->roles->jabatan}}</td>
                                </tr>
                        </table>
                    </div>
                    @can('isAdmin')
                    <a href="{{ route('editdataguru', $dataguru->id)}}" type="button" class="btn btn-sm btn-info"><em class="fa fa-pencil"></em> Edit Data</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>


@endsection