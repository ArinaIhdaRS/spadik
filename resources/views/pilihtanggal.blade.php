@extends('layouts.app')

@section('title', 'Nilai Anak')

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
        <form action="{{route('nilaianak')}}" method="GET">
        
        <input type="date" name="tanggalRPP">

        <button type="submit">Submit</button>

        </form> 
        </div>
    
    </div>
</div>
@endsection