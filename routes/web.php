<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/beranda', 'HomeController@index')->name('home');
Route::get('/profil/{id}', 'HomeController@userprofile')->name('userprofile');
Route::put('/profil/foto/{id}/add', 'HomeController@insertphotorofil')->name('insertphotoprofil');
Route::put('/profil/foto/{id}/save', 'HomeController@editphotoprofil')->name('editphotoprofil');
Route::get('/profil/edit/{id}', 'HomeController@editdataprofil')->name('editdataprofil');
Route::put('/profil/edit/{id}/save', 'HomeController@simpandataprofil')->name('simpandataprofil');

// route guru
//PROFIL
Route::get('/profil-kelas', 'GuruController@profilkelas')->name('profilkelas');
Route::get('/profil-kelas/siswa/{id}', 'GuruController@showdatasiswa')->name('showdatasiswa');


//RENCANA BELAJAR - HARIAN
Route::get('/rencana-belajar-harian', 'GuruController@harian')->name('harian');
Route::get('/rencana-belajar-harian/{id}/lihat', 'GuruController@showrpph')->name('showrpph');
Route::get('/rencana-belajar-harian/{id}/edit', 'GuruController@editrppharian')->name('editrppharian');
Route::put('/rencana-belajar-harian/{id}/save', 'GuruController@savedataeditrpph')->name('savedataeditrpph');

Route::get('/rencana-belajar-harian/buat', 'GuruController@buatrpph')->name('buatrpph');
Route::post('/rencana-belajar-harian/buat/save', 'GuruController@insertrpph')->name('insertrpph');



// kegiatan
Route::get('/rencana-belajar-harian/kegiatan/{id}', 'GuruController@buatrpphkegiatan')->name('buatrpphkegiatan');
Route::post('/rencana-belajar-harian/kegiatan/{id}/add', 'GuruController@insertrpphkegiatan')->name('insertrpphkegiatan');
Route::put('/rencana-belajar-harian/kegiatan/{id}/save', 'GuruController@saverpphkegiatan')->name('saverpphkegiatan');
Route::delete('/rencana-belajar-harian/kegiatan/{id}/delete', 'GuruController@deleterpphkegiatan')->name('deleterpphkegiatan');

Route::delete('/rencana-belajar-harian/{id}/hapus', 'GuruController@deleterpph')->name('deleterpph');

// RENCANA BELAJAR MINGGUAN
Route::get('/rencana-belajar-mingguan', 'GuruController@mingguan')->name('mingguan');
Route::get('/program-semester', 'GuruController@semester')->name('semester');
Route::get('/semua-rencana-belajar', 'GuruController@semuarpp')->name('semuarpp');
Route::get('/showrpmm', 'GuruController@showRPPM')->name('showRPPM');

//PENILAIAN
Route::get('/penilaian', 'GuruController@penilaian')->name('penilaian');
Route::post('/penilaian/cari', 'GuruController@caripenilaian')->name('caripenilaian');

// nilai aspek
Route::get('/penilaian/buat-penilaian-aspek', 'GuruController@buatpenilaianaspek')->name('buatpenilaianaspek');
Route::get('/penilaian/buat-penilaian-aspek/{id}', 'GuruController@penilaiankegiatanaspek')->name('penilaiankegiatanaspek');
Route::get('/penilaian/buat-penilaian-aspek/kegiatan/{id}', 'GuruController@nilaiaspekkegiatan')->name('nilaiaspekkegiatan');
Route::post('/penilaian-rpph/kegiatan/{id}/save', 'GuruController@insertnilaiaspekkegiatan')->name('insertnilaiaspekkegiatan');

// nilai indikator
Route::get('/penilaian/buat-penilaian-indikator', 'GuruController@buatpenilaianindikator')->name('buatpenilaianindikator');
Route::get('/penilaian/buat-penilaian-indikator/{id}', 'GuruController@penilaianindikatoranak')->name('penilaianindikatoranak');
Route::get('/penilaian/buat-penilaian-indikator/{id}/anak/{id_datasiswa}', 'GuruController@penilaianindikator')->name('penilaianindikator');
Route::post('penilaian/tambah', 'GuruController@insertnilaiindikator')->name('insertnilaiindikator');

// nilai ceklis
Route::get('/penilaian/buat-penilaian-ceklis', 'GuruController@buatpenilaianceklis')->name('buatpenilaianceklis');

// nilai anekdot
Route::get('/penilaian/penilaian-anekdot', 'GuruController@buatpenilaiananekdot')->name('buatpenilaiananekdot');
Route::get('/penilaian/buat-penilaian-anekdot', 'GuruController@penilaiananekdot')->name('penilaiananekdot');
Route::post('penilaian/buat-penilaian-anekdot/add', 'GuruController@insertnilaianekdot')->name('insertnilaianekdot');

// NILAI ANAK
Route::get('/pilih-tanggal', 'GuruController@tanggalRPP')->name('tanggalRPP');
Route::get('/nilai-anak', 'GuruController@nilaianak')->name('nilaianak');

// nilai aspek //
Route::get('/nilai-anak/{id}/aspek', 'GuruController@nilaiaspekanak')->name('nilaiaspekanak');

// nilai indikator //
Route::get('/nilai-anak/{id}/indikator', 'GuruController@nilaiindikatoranak')->name('nilaiindikatoranak');

// nilai ceklis //
Route::get('/nilai-anak/{id}/ceklis', 'GuruController@nilaiceklisanak')->name('nilaiceklisanak');

// nilai anekdot
Route::get('/nilai-anak/{id}/anekdot', 'GuruController@nilaianekdotanak')->name('nilaianekdotanak');

Route::get('/printRPPH/{id}', 'GuruController@printRPPH')->name('printRPPH');

Route::get('/printRPPM/{id}', 'GuruController@printRPPM')->name('printRPPM');
Route::get('/nilai-anak/penilaian/{id}','GuruController@showNilaiIndikator')->name('showNilaiIndikator');

// route admin / kepsek

// DATA GURU /
Route::get('/data-guru', 'AdminController@dataguru')->name('dataguru');

// tambah data guru
Route::get('/data-guru/tambah','AdminController@tambahdataguru')->name('tambahdataguru');
Route::post('data-guru/tambah/save', 'AdminController@insertdataguru')->name('insertdataguru');
// lihat data guru /
Route::get('/data-guru/{id}', 'AdminController@showdataguru')->name('showdataguru');
// edit data guru
Route::get('/data-guru/edit/{id}', 'AdminController@editdataguru')->name('editdataguru');
Route::put('/data-guru/edit-photo/{id}/add', 'AdminController@insertphotoguru')->name('insertphotoguru');
Route::put('/data-guru/edit-photo/{id}/save', 'AdminController@editphotoguru')->name('editphotoguru');
Route::put('/data-guru/edit/{id}/save', 'AdminController@simpandataguru')->name('simpandataguru');
// hapus data guru
Route::delete('/data-guru/{id}/hapus', 'AdminController@hapusdataguru')->name('hapusdataguru');

// DATA SISWA /
Route::get('/data-siswa', 'AdminController@datasiswa')->name('datasiswa');

// tambah data siswa
Route::get('/data-siswa/tambah', 'AdminController@tambahdatasiswa')->name('tambahdatasiswa');
Route::post('/data-siswa/tambah/save', 'AdminController@insertdatasiswa')->name('insertdatasiswa');

// lihat data siswa /
Route::get('/data-siswa/{id}', 'AdminController@showdatasiswa')->name('showdatasiswa');

// crud siswa
Route::put('/data-siswa/edit-photo/{id}/add', 'AdminController@insertphotosiswa')->name('insertphotosiswa');
Route::put('/data-siswa/edit-photo/{id}/save', 'AdminController@editphotosiswa')->name('editphotosiswa');
Route::get('/data-siswa/edit/{id}', 'AdminController@editdatasiswa')->name('editdatasiswa');
Route::put('/data-siswa/edit/{id}/save', 'AdminController@savedatasiswa')->name('savedatasiswa');
Route::delete('/data-siswa/{id}/hapus', 'AdminController@deletedatasiswa')->name('deletedatasiswa');

// DATA KELAS-SENTRA
Route::get('/data-kelas-sentra', 'AdminController@showkelassentra')->name('showkelassentra');
// kelas
Route::get('/data-kelas-sentra/tambah-kelas', 'AdminController@tambahkelas')->name('tambahkelas');
Route::post('data-kelas-sentra/tambah-kelas/save', 'AdminController@insertdatakelas')->name('insertdatakelas');
Route::get('/data-kelas-sentra/edit-kelas/{id}', 'AdminController@editkelas')->name('editkelas');
Route::put('/data-kelas-sentra/edit-kelas/{id}/save', 'AdminController@savekelas')->name('savekelas');
Route::delete('/data-kelas-sentra/hapus-kelas/{id}', 'AdminController@deletekelas')->name('deletekelas');
// sentra
Route::get('/data-kelas-sentra/tambah-sentra', 'AdminController@tambahsentra')->name('tambahsentra');
Route::post('data-kelas-sentra/tambah-sentra/save', 'AdminController@insertdatasentra')->name('insertdatasentra');
Route::get('/data-kelas-sentra/edit-sentra/{id}', 'AdminController@editsentra')->name('editsentra');
Route::put('/data-kelas-sentra/edit-sentra/{id}/save', 'AdminController@savesentra')->name('savesentra');
Route::delete('/data-kelas-sentra/hapus-sentra/{id}', 'AdminController@deletesentra')->name('deletesentra');

// DATA KOMPONEN
Route::get('/data-komponen/KIKD', 'AdminController@showkompetensi')->name('showkompetensi');
Route::get('/data-komponen/aspek', 'AdminController@showaspek')->name('showaspek');
Route::get('/data-komponen/materi', 'AdminController@showmateri')->name('showmateri');

// DATA RPP
Route::get('/data-rencana-belajar', 'AdminController@showdatarpp')->name('showdatarpp');
Route::get('/data-rencana-belajar/{id}/lihat', 'AdminController@showdatarpph')->name('showdatarpph');



Route::put('/data-rencana-belajar/{id}/validate', 'AdminController@setujuirpph')->name('setujuirpph');

Route::put('/data-rencana-belajar/{id}/validate', 'AdminController@setujuirpph')->name('setujuirpph');

// DATA NILAI
Route::get('/data-penilaian', 'AdminController@showdatanilai')->name('showdatanilai');



// PROGRES REPORT