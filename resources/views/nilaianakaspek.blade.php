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
            <h1 class="page-header">Nilai Aspek Anak</h1>
        </div>
	</div>
	
	@foreach ($aspeknya as $asp)   
	    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user-o"></i> {{$asp->namaaspek}}
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <tbody>
                            @php
                                $nilaiaspek = DB::table('nilaiaspek')->where('id_aspek', $asp->id)
                                        ->where('id_datasiswa', $id_anak)
                                        ->where('tglnilaiaspk', app('request')->input('tanggalRPP'))->get()->sum('nilaiaspk');                                   
                                
                            @endphp 
                            @if($nilaiaspek === NULL)
                                <tr>
                                <td class="column1">Data Kosong</td>
                            </tr>
                            @else
                            <tr>
                                <td class="column1">
                                {{$nilaiaspek}}
                                </td>
                            </tr>
                            @endif
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>     
            </form>
        </div>
    </div>
	@endforeach
    
@endsection

@section('js')

@endsection