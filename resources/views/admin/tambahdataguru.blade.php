@extends('layouts.app')

@section('title', 'Tambah Data Guru')

@section('content')
	<div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data Guru</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Guru</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form role="form" method="POST" action="{{route('insertdataguru')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NUPTK</label>
                                <input class="form-control" type="text" placeholder="" name="nuptk" value="" required>
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" placeholder="" name="nama" value="" required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input class="form-control" type="date" placeholder="" name="tgllahir" value="" required>
                            </div>

                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" placeholder="" name="email" value="" required>
                            </div>
                                
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" placeholder="" name="alamat" value="" required></textarea>
                            </div>    
                        </div>
                        <div class="col-md-6">

                            <!-- <div class="form-group">
                                <label>Foto Profil</label>
                                <input type="file" name="photo" value="" accept="images/*" required>
                                <p class="help-block">Max: 1MB</p>
                            </div> -->
                            
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control" name="id_role" required>
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($role as $jbtn)
                                    <option value="{{ $jbtn->id }}">{{ $jbtn->jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="control-label">Username</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection