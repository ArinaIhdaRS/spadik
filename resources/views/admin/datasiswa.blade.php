@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
    
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data Siswa</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Siswa</h1>
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
                    @can('isAdmin')
                    <div>
                        <a href="{{route('tambahdatasiswa')}}" class="btn btn-primary"><em class="fa fa-plus">&nbsp;</em> Tambah Data</a>
                    </div>
                    <br>
                    @endcan
                     <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">NISN</th>
                                    <th class="column2">NoInduk</th>
                                    <th class="column3">Nama</th>
                                    <th class="column4">Jenis Kelamin</th>
                                    <th class="column5">Kelas/Sentra</th>
                                    <th class="column6">Tahun Masuk</th>
                                    <th class="column7">Lengkap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datasiswa as $siswa)
                                    <tr>
                                        <td class="column1">{{$siswa->nisn}}</td>
                                        <td class="column2">{{$siswa->noinduk}}</td>
                                        <td class="column3">{{$siswa->namalengkap}}</td>
                                        <td class="column4">{{$siswa->jeniskelamin}}</td>
                                        <td class="column5">{{$siswa->kelass->namakelas}}</td>
                                        <td class="column6">{{$siswa->tahunmasuk}}</td>
                                        <td class="column7" align="center">
                                            <a href="{{route('showdatasiswa', $siswa->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-id-badge"></em>
                                                @can('isKepsek')
                                                 Data
                                                @endcan
                                            </a>
                                            @can('isAdmin')
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#ModalDelete"><em class="fa fa-trash-o"></em></button>
                                            @endcan
                                        </td>
                                        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <form class="form-horizontal style-form" action="" method="post">
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
                </div>
            </div>
        </div>
    </div>

@endsection