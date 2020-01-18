@extends('layouts.app')

@section('title', 'Komponen - Materi')

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
            <h1 class="page-header">Materi</h1>
        </div>
    </div><!--/.row-->

@foreach ($showktg as $ktgm)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> {{$ktgm->kategorimateri}}
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">Kode</th>
                                    <th class="column2">Isi Materi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $showmateri = DB::table('materi')->where('id_kategorimateri', $ktgm->id)->get();

                                    foreach($showmateri as $showm){
                                    echo '<tr><td class="column1"><b>'.$showm->kodemateri.'</b></td><td class="column2">'.$showm->isimateri.'</td></tr>';
                                }
                                @endphp
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@can('isAdmin')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="" class="btn btn-primary pull-right"><em class="fa fa-pencil">&nbsp;</em> Edit</a>
                
                </div>
            </div>
        </div>
    </div>
@endcan

    

    

@endsection