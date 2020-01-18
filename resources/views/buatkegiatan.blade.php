@extends('layouts.app')

@section('title', 'Rencana Pembelajaran Harian')

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
            <h1 class="page-header">Kegiatan Pembelajaran Harian</h1>
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
                <div class="panel-body">
                    <div>
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalKegiatan"><em class="fa fa-plus">&nbsp;</em> Tambah Kegiatan</a>
                        @if ($rpphkgtall > 0)
                        <a href="{{route('showrpph', $rpph->id)}}" class="btn btn-primary"><em class="fa fa-check">&nbsp;</em> Selesai</a>
                        @endif
                        
                        <div class="modal fade" id="ModalKegiatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal style-form" action="{{route('insertrpphkegiatan', $rpph->id)}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Kegiatan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label>Tahapan</label>
                                                            <input class="form-control" placeholder="" name="tahapanharian" value="" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Waktu</label>
                                                            <input class="form-control" placeholder="" name="waktuharian" value="" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kegiatan</label>
                                                            <input class="form-control" placeholder="" name="kegiatanharian" value="" >
                                                        </div>          
                                                        <div class="form-group">
                                                            <label>Media</label>
                                                            <input class="form-control" placeholder="" name="mediaharian" value="" >
                                                        </div>
                                                    </div> 
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
                    </div>
                    <br>
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">No</th>
                                    <th class="column2">Tahapan</th>
                                    <th class="column3">Waktu</th>
                                    <th class="column4">Kegiatan</th>
                                    <th class="column5">Media</th>
                                    <th class="column6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rpphkgt as $key => $kgt)
                                <tr>
                                    <td class="column1">{{++$key}}</td>
                                    <td class="column2">{{$kgt->tahapanharian}}</td>
                                    <td class="column3">{{$kgt->waktuharian}}</td>
                                    <td class="column4">{{$kgt->kegiatanharian}}</td>
                                    <td class="column5">{{$kgt->mediaharian}}</td>
                                    <td class="column6">
                                        <a href="" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit{{$kgt->id}}"><em class="fa fa-pencil"></em></a>
                                        <div class="modal fade" id="ModalEdit{{$kgt->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="form-horizontal style-form" action="{{route('saverpphkegiatan', $kgt->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Edit Kegiatan</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="panel-body">
                                                                        <div class="form-group">
                                                                            <label>Tahapan</label>
                                                                            <input class="form-control" placeholder="{{$kgt->tahapanharian}}" name="tahapanharian" value="{{$kgt->tahapanharian}}" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Waktu</label>
                                                                            <input class="form-control" placeholder="{{$kgt->waktuharian}}" name="waktuharian" value="{{$kgt->waktuharian}}" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Kegiatan</label>
                                                                            <input class="form-control" placeholder="{{$kgt->kegiatanharian}}" name="kegiatanharian" value="{{$kgt->kegiatanharian}}" >
                                                                        </div>          
                                                                        <div class="form-group">
                                                                            <label>Media</label>
                                                                            <input class="form-control" placeholder="{{$kgt->mediaharian}}" name="mediaharian" value="{{$kgt->mediaharian}}" >
                                                                        </div> 
                                                                    </div>
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
                                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus{{$kgt->id}}"><em class="fa fa-trash"></em></a>
                                        <div class="modal fade" id="ModalHapus{{$kgt->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="form-horizontal style-form" action="{{route('deleterpphkegiatan', $kgt->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Hapus Kegiatan</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger">
                                                              <h4><i class="fa fa-warning"></i> Note!</h4>
                                                              <p>Data akan dihapus</p>
                                                            </div>
                                                            <h4>Lanjutkan?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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

@section('js')
    
@endsection