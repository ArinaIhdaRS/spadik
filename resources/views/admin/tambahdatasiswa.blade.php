@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('content')
	<div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li>Data Siswa</li>
            <li class="active">Tambah</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Siswa</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- <div class="panel-heading"><em class="fa fa-user-o">&nbsp;</em> Data Siswa
                </div> -->
                <form role="form" method="POST" action="{{route('insertdatasiswa')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="panel-heading"><b><em class="fa fa-user-o">&nbsp;</em> Profil Anak</b></div>
                    <div class="panel-body"> <!-- profil anak -->                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Induk </label><i> *(wajib diisi)</i>
                                <input class="form-control" placeholder="" name="noinduk" value="" required>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label><i> *(wajib diisi)</i>
                                <input class="form-control" placeholder="" name="namalengkap" value="" required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label><i> *(wajib diisi)</i>
                                <select class="form-control" name="jeniskelamin" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-Laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir</label><i> *(wajib diisi)</i>
                                <input class="form-control" placeholder="" name="templhir" value="" required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir</label><i> *(wajib diisi)</i>
                                <input class="form-control" type="date" placeholder="" name="tgllahir" value="" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NISN</label>
                                <input class="form-control" type="text" placeholder="" name="nisn" value="" >
                            </div>

                            <div class="form-group">
                                <label>Nama Panggilan</label>
                                <input class="form-control" placeholder="" name="namapanggil" value="" >
                            </div>

                            <div class="form-group">
                                <label>Agama</label>
                                <input class="form-control" placeholder="" name="agama" value="" >
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading"><b><em class="fa fa-user-o">&nbsp;</em> Wali Anak</b></div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Anak ke</label>
                                <input class="form-control" placeholder="" name="anakke" value="" >
                            </div>

                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input class="form-control" placeholder="" name="namaibu" value="" >
                            </div>

                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input class="form-control" placeholder="" name="namaayah" value="" >
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" rows="3" type="text" placeholder="" name="alamat" value="" ></input>
                            </div>

                            <div class="form-group">
                                <label>Desa/Kelurahan</label>
                                <input class="form-control" placeholder="" name="desakelurahan" value="" >
                            </div>   

                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" placeholder="" name="kecamatan" value="" >
                            </div> 

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Orang Tua</label>
                                <input class="form-control" placeholder="" name="statusorangtua" value="" >
                            </div>
                            
                            <div class="form-group">
                                <label>Pekerjaan Ibu</label>
                                <input class="form-control" placeholder="" name="pekerjaanibu" value="" >
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Ayah</label>
                                <input class="form-control" placeholder="" name="pekerjaanayah" value="" >
                            </div>   

                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <input class="form-control" placeholder="" name="kabupatenkota" value="" >
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input class="form-control" placeholder="" name="provinsi" value="" >
                            </div>

                        </div>
                    </div>
                    <div class="panel-heading"><b><em class="fa fa-user-o">&nbsp;</em> Kelas Anak</b></div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="id_kelas">
                                    <option value="">Pilih Kelas</option>
                                    @foreach($kelas as $kls)
                                    <option value="{{$kls->id}}">{{$kls->namakelas}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sentra</label>
                                <select class="form-control" name="id_sentra">
                                    <option value="">Pilih Sentra</option>
                                    @foreach($sentra as $sntr)
                                    <option value="{{$sntr->id}}">{{$sntr->namasentra}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label>Status Siswa</label>
                                <input class="form-control" placeholder="" name="statussiswa" value="" >
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Masuk</label>
                                <input class="form-control" placeholder="{{$tahun}}" name="tahunmasuk" value="{{$tahun}}" >
                            </div>

                            <div class="form-group">
                                <label>Tingkat</label>
                                <input class="form-control" placeholder="" name="tingkat" value="" >
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection