@extends('layouts.app')

@section('title', 'Nilai Anak')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Nilai Anak</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nilai Anekdot Anak</h1>
        </div>
	</div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nilai Anekdot
                    <span><a href="" type="button" class="btn btn-info pull-right" onclick="myFunctionank()"><em class="fa fa-print"></em> Print</a></span>
                </div>
                <div class="panel-body">
                    <table class="table fixed-table-container">
                        <thead>
                            <tr>
                                <th class="column1">Nama</th>
                                <th class="column2">Tanggal</th>
                                <th class="column3">Waktu</th>
                                <th class="column4">Tempat</th>
                                <th class="column5">Peristiwa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilaianekdotanak as $anekdot)
                            <tr>
                                <td class="column1">{{$anekdot->siswaanekdot->namalengkap}}</td>
                                <td class="column2">{{$anekdot->tglanekdot}}</td>
                                <td class="column3">{{$anekdot->waktuanekdot}}</td>
                                <td class="column4">{{$anekdot->tempatanekdot}}</td>
                                <td class="column5">{{$anekdot->peristiwa}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
<script>
function myFunctionank() {
  window.print();
}
</script>
@endsection