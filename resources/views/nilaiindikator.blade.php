@extends('layouts.app')

@section('title', 'Penilaian Anak Didik')

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
            <li class="active">Penilaian</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Penilaian Indikator</h1>
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
                <div class="panel-heading"><a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalIndikator"><em class="fa fa-plus">&nbsp;</em> Tambah Kegiatan</a> </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <tbody>
                                <tr>
                                    <td class="column1">Kompetensi Dasar</td>
                                    <td class="column1">Indikator</td>
                                    <td class="column1">Aspek</td>
                                    <td class="column1">Nilai Indikator</td>
                                </tr>
                                @foreach($nilaiindikator as $nilai)
                                <tr>                                    
                                    <td class="column2">{{$nilai->kompetensidasar}}</td>
                                    <td class="column2">{{$nilai->indikator}}</td>
                                    <td class="column2">{{$nilai->id_aspek}}</td>
                                    <td class="column2">{{$nilai->nilaiindikator}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalIndikator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal style-form" method="post" action="{{route('insertnilaiindikator')}}">
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
                                                            <label>Kompetensi Dasar</label>
                                                            <select class="form-control" placeholder="" name="kompetensidasar[]" id="kompetensidasar"  multiple="multiple">
                                                            <option value=""></option>
                                                                @foreach ($arrkompetensidasar as $kompdasar)
                                                                <option value="{{$kompdasar}}">{{$kompdasar}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Indikator</label>
                                                            <select class="form-control" placeholder="" name="indikator[]" id="indikator"  multiple="multiple">
                                                            <option value=""></option>
                                                                @foreach ($arrIndikatorHarian as $indikator)
                                                                <option value="{{$indikator}}">{{$indikator}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Aspek</label>
                                                            <select class="form-control" placeholder="" name="id_aspek" id="id_aspek">
                                                                @foreach($aspek as $aspk)
                                                                    <option value="{{$aspk->id}}">{{$aspk->namaaspek}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>          
                                                        <div class="form-group">
                                                            <label>Nilai</label>
                                                            <input class="form-control" placeholder="" name="nilaiindikator" id="nilaiindikator" >
                                                            <input type="hidden" name="id_harian" value="{{$id_harian}}">
                                                            <input type="hidden" name="id_datasiswa" value={{$id_datasiswa}}>
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
@endsection

@section('js')
    <script src="{{asset('assets/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#kompetensidasar').select2({
                placeholder: "Pilih Kompetensi Dasar"
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#indikator').select2({
                placeholder: "Pilih Indikator"
            });
        });
    </script>

@endsection