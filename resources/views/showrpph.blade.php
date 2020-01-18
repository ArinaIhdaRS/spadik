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
        <div class="col-md-12">
            <div class="panel panel-default">
            	<div class="panel-heading">
                    RPPH {{$rppharian->tglpemb}} 
                    @can('isGuru')
                    <span>
                        <a href="" type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#ModalDelete{{$rppharian->id}}"><em class="fa fa-trash"></em></a>
                        <div class="modal fade" id="ModalDelete{{$rppharian->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                              <form class="form-horizontal style-form" action="{{ route('deleterpph', $rppharian->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus RPPH</h4>
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
                    </span>
                    <span><a href="{{route('printRPPH', $rppharian->id)}}" type="button" class="btn btn-info pull-right"><em class="fa fa-print"></em> Print</a></span>
                    @endcan
                    
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <tbody>
                                <tr>
                                    <td class="column1">Tanggal RPPH</td>
                                    <td class="column2">{{$rppharian->tglpemb}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Tahun Ajaran</td>
                                    <td class="column2">{{$rppharian->tahunajaran}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Kelas</td>
                                    <td class="column2">{{$rppharian->kelas->namakelas}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Semester/ Minggu</td>
                                    <td class="column2">{{$rppharian->semester}}/ {{$rppharian->minggu}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Tema</td>
                                    <td class="column2">{{$rppharian->tema}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Subtema</td>
                                    <td class="column2">{{$rppharian->subtema}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Strategi Pembelajaran</td>
                                    <td class="column2">{{$rppharian->strategipemb}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Kompetensi Dasar</td>
                                    <td class="column2">
                                        @if ($rppharian->id_kompdasar == NULL || '')
                                            <i>Belum diisi</i>
                                        @else
                                            {{$rppharian->id_kompdasar}}
                                        @endif
                                        
                                    </td>   
                                </tr>
                                <tr>
                                    <td class="column1">Materi</td>
                                    <td class="column2">
                                        @if ($rppharian->id_materi == NULL || '')
                                            <i>Belum diisi</i>
                                        @else
                                            {{$rppharian->id_materi}}
                                        @endif
                                    </td>   
                                </tr>
                                <tr>
                                    <td class="column1">Indikator</td>
                                    <td class="column2">{{$indktpemb}}</td>   
                                </tr>
                                <tr>
                                    <td class="column1">Tujuan Pembelajaran</td>
                                    <td class="column2">{{$tjnpemb}}</td>   
                                </tr>
                            </tbody>
                        </table>
                        @can('isGuru')
                        <a href="{{route('editrppharian', $rppharian->id)}}" type="button" class="btn btn-sm btn-primary pull-right"><em class="fa fa-pencil"></em> Edit</a>
                        @endcan
                    </div>
                </div>
                <div class="panel-heading">
                    Kegiatan
                </div>
                <div class="panel-body">

                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">No</th>
                                    <th class="column2">Tahapan</th>
                                    <th class="column3">Waktu</th>
                                    <th class="column4">Kegiatan</th>
                                    <th class="column5">Media</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatanharian as $key => $kegiatan)
                            	<tr>
                                    <td class="column1">{{++$key}}</td>
                                    <td class="column2">{{$kegiatan->tahapanharian}}</td>
                                    <td class="column3">{{$kegiatan->waktuharian}}</td>
                                    <td class="column4">{{$kegiatan->kegiatanharian}}</td>
                                    <td class="column5">{{$kegiatan->mediaharian}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @can('isGuru')
                        <a href="{{route('buatrpphkegiatan', $rppharian->id)}}" type="button" class="btn btn-sm btn-primary pull-right"><em class="fa fa-pencil"></em> Edit Kegiatan</a>
                        @endcan

                        @can('isKepsek')
                        @if($rppharian->statuspemb == NULL)
                            <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#Modalsetuju"><em class="fa fa-check"></em> Setujui</button>

                            <div class="modal fade" id="Modalsetuju" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form role="form" method="POST" action="{{route('setujuirpph', $rppharian->id)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}                                        
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Setujui RPPH</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="statuspemb" value="Disetujui">
                                            <p>RPPH tanggal {{$rppharian->tglpemb}} akan disetujui. Pastikan Data sudah diperiksa dan benar.</p>
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
                        </form>
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script>
function myFunction() {
  window.print();
}
</script>
@endsection