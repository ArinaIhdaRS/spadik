@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Beranda</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->

@can('isAdmin')
@endcan

@can('isGuru')
    <div class="row">
        <!-- panel -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><em class="fa fa-files-o">&nbsp;</em> RPPH Hari Ini</div>
                    <div class="panel-body">
                        <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Anda belum membuat RPPH untuk hari ini. <a href="{{ route('buatrpph')}}">Buat RPPH</a> <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                        <p>Preview RPPH</p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><em class="fa fa-check-square-o">&nbsp;</em> Penilaian Hari Ini</div>
                    <div class="panel-body">
                        <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Untuk mengisikan Penilaian anda perlu membuat RPPH. <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                        <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Anda belum mengisikan Nilai Anak Didik anda hari ini. <a href="#">Buat Nilai</a><a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                        <p>Preview Penilaian</p>
                    </div>
                </div>
            </div>
        <!-- kalender -->
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <em class="fa fa-calendar">&nbsp;</em>Calendar
                        <ul class="pull-right panel-settings panel-button-tab-right">
                            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <ul class="dropdown-settings">
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 1
                                            </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 2
                                            </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                <em class="fa fa-cog"></em> Settings 3
                                            </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            
    </div>
@endcan

@endsection
