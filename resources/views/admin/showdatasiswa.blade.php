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
        <div class="col-lg-3"> <!-- foto siswa -->
            <div class="panel panel-default">
                <div class="panel-body">
                    @if ($datasiswa->photo == NULL || "")
                    <p><i>Belum ada foto</i></p>
                    @can('isAdmin')
                    <a href="" data-toggle="modal" data-target="#Modalphoto{{$datasiswa->id}}" class="btn btn-sm btn-info"><em class="fa fa-pencil"></em> Tambahkan Photo</a>
                    @endcan
                    <div class="modal fade" id="Modalphoto{{$datasiswa->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal style-form" action="{{ route('insertphotosiswa', $datasiswa->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Foto Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="form-group">
                                            <label>Foto Profil</label>
                                            <input type="file" name="photo" value="{{$datasiswa->photo }}" accept="images/*" >
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
                        <img src="{{ asset('datasiswa/'.$datasiswa->photo)}}" width="100%">
                    </div>
                    @can('isAdmin')
                        <a href="" type="button" class="btn btn-sm btn-info"data-toggle="modal" data-target="#Modaleditphoto{{$datasiswa->id}}"><em class="fa fa-pencil"></em> Edit Photo</a>
                    @endcan
                        <div class="modal fade" id="Modaleditphoto{{$datasiswa->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal style-form" action="{{ route('editphotosiswa', $datasiswa->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Foto Siswa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="form-group">
                                                <label>Foto Profil</label>
                                                <input type="file" name="photo" value="{{$datasiswa->photo }}" accept="images/*" >
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
        <div class="col-lg-9"> <!-- data siswa -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                                <tr class="">
                                    <td class="column1">NISN</td>
                                    <td class="column2">{{$datasiswa->nisn}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Nama</td>
                                    <td class="column2">{{$datasiswa->namalengkap}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Nama Panggilan</td>
                                    <td class="column2">{{$datasiswa->namapanggil}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Nomor Induk</td>
                                    <td class="column2">{{$datasiswa->noinduk}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Jenis Kelamin</td>
                                    <td class="column2">{{$datasiswa->jeniskelamin}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Tempat/Tgl Lahir</td>
                                    <td class="column2">{{$datasiswa->templhir}}, {{$datasiswa->tgllahir}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Agama</td>
                                    <td class="column2">{{$datasiswa->agama}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Anak ke</td>
                                    <td class="column2">{{$datasiswa->anakke}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Status Orang Tua</td>
                                    <td class="column2">{{$datasiswa->statusorangtua}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Nama Ibu</td>
                                    <td class="column2">{{$datasiswa->namaibu}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Nama Ayah</td>
                                    <td class="column2">{{$datasiswa->namaayah}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Pekerjaan Ibu</td>
                                    <td class="column2">{{$datasiswa->pekerjaanibu}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Pekerjaan Ayah</td>
                                    <td class="column2">{{$datasiswa->pekerjaanayah}}</td>
                                </tr>
                                <tr class="">
                                    <td class="column1">Alamat</td>
                                    <td class="column2">{{$datasiswa->alamat}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Desa/Kelurahan</td>
                                    <td class="column2">{{$datasiswa->desakelurahan}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Kecamatan</td>
                                    <td class="column2">{{$datasiswa->kecamatan}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Kabupaten</td>
                                    <td class="column2">{{$datasiswa->kabupatenkota}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Provinsi</td>
                                    <td class="column2">{{$datasiswa->provinsi}}</td>
                                </tr>
                                <tr>
                                    <td class="column1">Tahun masuk</td>
                                    <td class="column2">{{$datasiswa->tahunmasuk}}</td>
                                </tr>
                                @if($datasiswa->id_kelas != NULL || "")
                                <tr>
                                    <td class="column1">Kelas</td>
                                    <td class="column2">{{$datasiswa->kelass->namakelas}}</td>
                                </tr>
                                @endif
                                @if($datasiswa->id_sentra != NULL || "")
                                <tr>
                                    <td class="column1">Sentra</td>
                                    <td class="column2">{{$datasiswa->sentras->namasentra}}</td>
                                </tr>
                                @endif
                        </table>
                    </div>
                    @can('isAdmin')
                    <a href="{{ route('editdatasiswa', $datasiswa->id)}}" type="button" class="btn btn-sm btn-info"><em class="fa fa-pencil"></em> Edit Data</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>


@endsection