@extends('layouts.app')

@section('title', 'Edit Rencana Pembelajaran Harian')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
@endsection

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
            <h1 class="page-header">Edit Rencana Pembelajaran Harian</h1>
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <form role="form" method="POST" action="{{route('savedataeditrpph', $rppharian->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="panel-heading">RPPH</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal RPPH</label>
                                <input class="form-control" type="date" name="tglpemb" placeholder="{{$rppharian->tglpemb}}" value="{{$rppharian->tglpemb}}">
                            </div>
                            <div class="form-group">
                                <label>Tahun Pelajaran</label>
                                <input class="form-control" type="text" name="tahunajaran" placeholder="{{$rppharian->tahunajaran}}" value="{{$rppharian->tahunajaran}}">
                            </div>
                            
                            <div class="form-group">
                                <label>Tema</label>
                                <input class="form-control" type="text" name="tema" placeholder="{{$rppharian->tema}}" value="{{$rppharian->tema}}">
                            </div>
                            <div class="form-group">
                                <label>Subtema</label>
                                <input class="form-control" type="text" name="subtema" placeholder="{{$rppharian->subtema}}" value="{{$rppharian->subtema}}">
                            </div>

                            <div class="form-group">
                                <label>Masukkan Indikator</label><i>*pisahkan indikator dengan (;)</i>
                                <input class="form-control" placeholder="{{$rppharian->indikatorharian}}" name="indikatorharian" value="{{$rppharian->indikatorharian}}">
                            </div>

                            <div class="form-group">
                                <label>Kompetensi Dasar</label>
                                <select id="id_kompdasar" name="id_kompdasar[]" class="form-control" multiple="multiple">
                                    <option value=""></option>
                                    @foreach ($kompetensidasar as $kd)
                                    @if(in_array($kd->nomorkompdasar, $kompdasar))
                                    <option value="{{$kd->nomorkompdasar}}" selected="true">{{$kd->nomorkompdasar}}</option>
                                    @else
                                    <option value="{{$kd->nomorkompdasar}}">{{$kd->nomorkompdasar}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <h4><big><b>{{$kelas->namakelas}}</b></big></h4>
                                <input type="hidden" name="id_kelas" value="{{$kelas->id}}" placeholder="{{$kelas->id}}">
                            </div>

                            <div class="form-group">
                                <label>Semester</label>
                                <input class="form-control" type="text" name="semester" placeholder="{{$rppharian->semester}}" value="{{$rppharian->semester}}">
                            </div>

                            <div class="form-group">
                                <label>Minggu</label>
                                <input class="form-control" type="text" name="minggu" placeholder="{{$rppharian->minggu}}" value="{{$rppharian->minggu}}">
                            </div>
                            
                            <div class="form-group">
                                <label>Strategi Pembelajaran</label>
                                <input class="form-control" type="text" name="strategipemb" placeholder="{{$rppharian->strategipemb}}" value="{{$rppharian->strategipemb}}">
                            </div>
                            
                            <div class="form-group">
                                <label>Masukkan Tujuan</label><i>*pisahkan tujuan dengan (;)</i>
                                <input class="form-control" placeholder="{{$rppharian->tujuanpemb}}" name="tujuanpemb" value="{{$rppharian->tujuanpemb}}">
                            </div>
                            
                            <div class="form-group">
                                <label>Pilih Materi <a href="{{route('showmateri')}}"><i class="fa fa-info-circle"></i></a></label>
                                <select id="id_materi" name="id_materi[]" class="form-control" multiple="multiple" >
                                    <option value=""></option>
                                    @foreach ($materipemb as $materi)
                                    @if(in_array($materi->kodemateri, $mtrpemb))
                                    <option value="{{$materi->kodemateri}}" selected="true">{{$materi->kodemateri}}</option>
                                    @else
                                    <option value="{{$materi->kodemateri}}">{{$materi->kodemateri}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">    
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-default">Reset</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#id_kompdasar').select2({
                placeholder: "Pilih Kompetensi Dasar"
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#id_materi').select2({
                placeholder: "Pilih Materi"
            });
        });
    </script>

@endsection