@extends('layouts.app')

@section('title', 'Rencana Pembelajaran Harian')

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
            <h1 class="page-header">Rencana Pembelajaran Harian</h1>
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
                <form role="form" method="POST" action="{{route('insertrpph')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="panel-heading">RPPH</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>Tanggal RPPH</label>
                                <input class="form-control" type="date" name="tglpemb" placeholder="Placeholder">
                            </div>
                            <div class="form-group">
                                <label>Tahun Pelajaran</label>
                                <input class="form-control" type="text" name="tahunajaran" placeholder="Placeholder" value="{{$tahun}}">
                            </div>
                            
                            <div class="form-group">
                                <label>Tema</label>
                                <input class="form-control" type="text" name="tema" placeholder="" value="">
                            </div>
                            <div class="form-group">
                                <label>Subtema</label>
                                <input class="form-control" type="text" name="subtema" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Masukkan Indikator</label><i>*pisahkan indikator dengan (;)</i>
                                <input class="form-control" placeholder="" name="indikatorharian" value="">
                            </div>

                            <div class="form-group">
                                <label>Kompetensi Dasar</label>
                                <select id="id_kompdasar" name="id_kompdasar[]" class="form-control" multiple="multiple">
                                    <option value=""></option>
                                    @foreach ($kompetensidasar as $kd)
                                    <option value="{{$kd->nomorkompdasar}}">{{$kd->nomorkompdasar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <h4><big><b>{{$kelas->namakelas}}</b></big></h4>
                                <input type="hidden" name="id_kelas" value="{{$kelas->id}}">
                                
                                <!-- <input class="form-control" type="text" name="id_kelas" value="{{$kelas->id}}" placeholder="{{$kelas->namakelas}}" > -->
                            </div>

                            <div class="form-group">
                                <label>Semester</label>
                                <input class="form-control" type="text" name="semester" placeholder="" value="">
                            </div>

                            <div class="form-group">
                                <label>Minggu</label>
                                <input class="form-control" type="text" name="minggu" placeholder="" value="">
                            </div>
                            
                            <div class="form-group">
                                <label>Strategi Pembelajaran</label>
                                <input class="form-control" type="text" name="strategipemb" placeholder="">
                            </div>
                            
                            <div class="form-group">
                                <label>Masukkan Tujuan</label><i>*pisahkan tujuan dengan (;)</i>
                                <input class="form-control" placeholder="" name="tujuanpemb" value="">
                            </div>
                            
                            <div class="form-group">
                                <label>Pilih Materi <a href="{{route('showmateri')}}"><i class="fa fa-info-circle"></i></a></label>
                                <select id="id_materi" name="id_materi[]" class="form-control" multiple="multiple" >
                                    <option value=""></option>
                                    @foreach ($materipemb as $materi)
                                    <option value="{{$materi->kodemateri}}">{{$materi->kodemateri}}</option>
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