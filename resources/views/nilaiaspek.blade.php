@extends('layouts.app')

@section('title', 'Penilaian Anak Didik')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Penilaian Anak</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Penilaian Aspek {{$rpphkgt->harians->tglpemb}}</h1>
                <p><b>Kegiatan:</b> "{{$rpphkgt->kegiatanharian}}"</p>
                <p><b>Indikator:</b> "{{$rpphkgt->harians->indikatorharian}}"</p>
            </div>
            
        </div>
	</div>

    @if (\Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check-circle-o">&nbsp;</em> {{ \Session::get('success') }} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        </div>
    </div>
    @endif

@foreach($aspek as $asp)

    @if ($nilaiaspek = DB::table('nilaiaspek')->where('id_aspek', $asp->id)->where('id_kegiatanharian', $rpphkgt->id)->exists())
    @else
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="post" action="{{route('insertnilaiaspekkegiatan', $rpphkgt->id )}}">
                {{ csrf_field() }}
                <input type="hidden" name="tglnilaiaspk" value="{{$rpphkgt->harians->tglpemb}}">
                <input type="hidden" name="id_kegiatanharian" value="{{$rpphkgt->id}}">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user-o"></i> {{$asp->namaaspek}}
                    <input type="hidden" name="id_aspek" value="{{$asp->id}}">
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr>
                                    <th class="column1">Nama Anak</th>
                                    <th class="column2">Masukkan Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $anak)
                                    <tr>
                                        <td class="column1"><b>{{$anak->namalengkap}}</b></td>
                                        <td class="column2">
                                            <input type="hidden" name="id_datasiswa[]" value="{{$anak->id}}">
                                            <input class="form-control" type="text" name="nilaiaspk[]" placeholder="Nilai" value="">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Buat Nilai</button>
                        </div>
                    </div>
                </div>
            </div>     
            </form>
        </div>
    </div>
    @endif
@endforeach


@endsection