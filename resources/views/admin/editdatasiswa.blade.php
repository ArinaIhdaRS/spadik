@extends('layouts.app')

@section('title', 'Edit Data Siswa')

@section('content')
	<div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li>Data Siswa</li>
            <li class="active">Edit</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Siswa</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><em class="fa fa-user-o">&nbsp;</em> Profil Anak
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{route('savedatasiswa', $data_siswa->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="panel-heading"><b><em class="fa fa-user-o">&nbsp;</em> Profil Anak</b></div>
                        <div class="panel-body"> <!-- profil anak -->                   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Induk</label>
                                    <input class="form-control" placeholder="{{$data_siswa->noinduk}}" name="noinduk" value="{{$data_siswa->noinduk}}" >
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" placeholder="{{$data_siswa->namalengkap}}" name="namalengkap" value="{{$data_siswa->namalengkap}}" >
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" required>
                                        <option value="{{$data_siswa->jeniskelamin}}">{{$data_siswa->jeniskelamin}}</option>
                                        <option value="Laki-Laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input class="form-control" placeholder="{{$data_siswa->templhir}}" name="templhir" value="{{$data_siswa->templhir}}" >
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input class="form-control" type="date" placeholder="{{$data_siswa->tgllahir}}" name="tgllahir" value="{{$data_siswa->tgllahir}}" >
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input class="form-control" type="text" placeholder="{{$data_siswa->nisn}}" name="nisn" value="{{$data_siswa->nisn}}" >
                                </div>

                                <div class="form-group">
                                    <label>Nama Panggilan</label>
                                    <input class="form-control" placeholder="{{$data_siswa->namapanggil}}" name="namapanggil" value="{{$data_siswa->namapanggil}}" >
                                </div>

                                <div class="form-group">
                                    <label>Agama</label>
                                    <input class="form-control" placeholder="{{$data_siswa->agama}}" name="agama" value="{{$data_siswa->agama}}" >
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading"><b><em class="fa fa-user-o">&nbsp;</em> Wali Anak</b></div>
                        <div class="panel-body"> <!-- wali anak -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Anak ke</label>
                                    <input class="form-control" placeholder="{{$data_siswa->anakke}}" name="anakke" value="{{$data_siswa->anakke}}">
                                </div>

                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input class="form-control" placeholder="{{$data_siswa->namaibu}}" name="namaibu" value="{{$data_siswa->namaibu}}" >
                                </div>

                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input class="form-control" placeholder="{{$data_siswa->namaayah}}" name="namaayah" value="{{$data_siswa->namaayah}}" >
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" rows="3" placeholder="{{$data_siswa->alamat}}" name="alamat" value="{{$data_siswa->alamat}}" ></input>
                                </div>

                                <div class="form-group">
                                    <label>Desa/Kelurahan</label>
                                    <input class="form-control" placeholder="{{$data_siswa->desakelurahan}}" name="desakelurahan" value="{{$data_siswa->desakelurahan}}" >
                                </div>    

                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input class="form-control" placeholder="{{$data_siswa->kecamatan}}" name="kecamatan" value="{{$data_siswa->kecamatan}}" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Orang Tua</label>
                                    <input class="form-control" placeholder="{{$data_siswa->statusorangtua}}" name="statusorangtua" value="{{$data_siswa->statusorangtua}}" >
                                </div>           

                                <div class="form-group">
                                    <label>Pekerjaan Ibu</label>
                                    <input class="form-control" placeholder="{{$data_siswa->pekerjaanibu}}" name="pekerjaanibu" value="{{$data_siswa->pekerjaanibu}}" >
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan Ayah</label>
                                    <input class="form-control" placeholder="{{$data_siswa->pekerjaanayah}}" name="pekerjaanayah" value="{{$data_siswa->pekerjaanayah}}" >
                                </div>
                                    
                                

                                <div class="form-group">
                                    <label>Kabupaten/Kota</label>
                                    <input class="form-control" placeholder="{{$data_siswa->kabupatenkota}}" name="kabupatenkota" value="{{$data_siswa->kabupatenkota}}" >
                                </div>

                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input class="form-control" placeholder="{{$data_siswa->provinsi}}" name="provinsi" value="{{$data_siswa->provinsi}}" >
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading"><b><em class="fa fa-user-o">&nbsp;</em> Kelas Anak</b></div>
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control" name="id_kelas">
                                        <option value="{{$data_siswa->id_kelas}}">Pilih Kelas</option>
                                        @foreach ($kelas as $kls)
                                        <option value="{{$kls->id}}">{{$kls->namakelas}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sentra</label>
                                    <select class="form-control" name="id_sentra">
                                        <option value="{{$data_siswa->id_sentra}}">Pilih Sentra</option>
                                        @foreach($sentra as $sntr)
                                        <option value="{{$sntr->id}}">{{$sntr->namasentra}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun Masuk</label>
                                    <input class="form-control" placeholder="{{$data_siswa->tahunmasuk}}" name="tahunmasuk" value="{{$data_siswa->tahunmasuk}}" >
                                </div>

                                <div class="form-group">
                                    <label>Tingkat</label>
                                    <input class="form-control" placeholder="{{$data_siswa->tingkat}}" name="tingkat" value="{{$data_siswa->tingkat}}" >
                                </div>
                                

                                <!-- <div class="form-group">
                                    <label>Status Siswa</label>
                                    <input class="form-control" placeholder="" name="statussiswa" value="" >
                                </div> -->
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>    
                    
            </div>
        </div>
    </div>
@endsection