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
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading"><em class="fa fa-files-o">&nbsp;</em> RPPH Hari Ini</div> -->
                <div class="panel-body">
                    @can ('isAdmin')
                    <div>
                        <a href="{{ route('tambahdataguru') }}" class="btn btn-primary"><em class="fa fa-plus">&nbsp;</em> Tambah Data</a>
                    </div>
                    <br>
                    @endcan
                     <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">NUPTK</th>
                                    <th class="column2">Nama</th>
                                    <th class="column3">Jabatan</th>
                                    <th class="column4">Tempat/Tgl Lahir</th>
                                    <th class="column5">Alamat</th>
                                    <th class="column6">Lengkap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $daftar_guru as $guru )
                                    <tr>
                                        <td class="column1">{{ $guru->nuptk}}</td>
                                        <td class="column2">{{ $guru->nama}}</td>
                                        <td class="column3">{{ $guru->roles->jabatan}}</td>
                                        <td class="column4">{{ $guru->tgllahir}}</td>
                                        <td class="column5">{{ $guru->alamat}}</td>
                                        <td class="column6" align="center">
                                            <a href="{{route('showdataguru', $guru->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-id-badge"></em>
                                            @can('isKepsek')
                                                Data
                                            @endcan
                                            </a>
                                            @can ('isAdmin')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDelete{{$guru->id}}"><em class="fa fa-trash-o"></em></button>
                                            @endcan
                                        </td>
                                        <div class="modal fade" id="ModalDelete{{$guru->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <form class="form-horizontal style-form" action="{{ route('hapusdataguru', $guru->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus Data Guru</h4>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $daftar_guru->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection