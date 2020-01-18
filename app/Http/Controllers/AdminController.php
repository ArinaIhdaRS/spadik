<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Kelas;
use App\Sentra;
use App\Siswa;
use App\Harian;
use App\KegiatanHarian;
use App\KtgMateri;
use App\Materi;

class AdminController extends Controller
{
    // DATA GURU

    public function dataguru()
    {
        $daftar_guru = User::orderBy('id_role', 'ASC')->paginate(10);
        return view('admin.dataguru', compact('daftar_guru'));
    }

    public function tambahdataguru()
    {
        $role = Role::all(); 
        return view('admin.tambahdataguru', compact('role'));
    }

    public function insertdataguru(Request $request)
    {
            $data_guru = new User();
            $data_guru->nuptk = $request->nuptk;
            $data_guru->nama = $request->nama;
            $data_guru->alamat = $request->alamat;
            $data_guru->tgllahir = $request->tgllahir;
            $data_guru->id_role = $request->id_role;
            $data_guru->email = $request->email;
            $data_guru->username = $request->username;
            $data_guru->password = bcrypt($request->password);
            $data_guru->save();

            return redirect()->route('dataguru')->with('success','Data berhasil ditambahkan.');
    }

    public function insertphotoguru(Request $request, $id)
    {
        $dataguru = User::find($id);
        $destination = "users/";
        $photo = $request->file('photo');
        $ext = $photo->getClientOriginalExtension();
        $newName = 'profil'.$id.'.'.$ext; /// blom
        $photo->move($destination, $newName);
        $dataguru->photo = $newName;
        $dataguru->save();

        return redirect()->route('showdataguru',$id)->with('success','Foto berhasil diubah.');
    }

    public function editphotoguru(Request $request, $id)
    {
        $dataguru = User::find($id);
        if (empty($request->file('photo')))
        {
            $dataguru->photo = $dataguru->photo;
        }
        else{    
            $destination = "users/";
            unlink('users/'.$dataguru->photo);
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $newName = 'profil'.$id.'.'.$ext; /// blom
            $photo->move($destination, $newName);
            $dataguru->photo = $newName; 
        }
        $dataguru->save();

        return redirect()->route('showdataguru',$id)->with('success','Foto berhasil diubah.');   
    }

    public function showdataguru($id)
    {        
        $dataguru = User::find($id);
        return view('admin.showdataguru', compact('dataguru'));
    }

    public function editdataguru($id)
    {
    	$data_guru = User::find($id);
        $role = Role::all();
        return view('admin.editdataguru', compact('data_guru', 'role'));
    }

    public function simpandataguru(Request $request, $id)
    {
        $data_guru = User::findOrFail($id);
        $data_guru->nuptk = $request->input('nuptk');
        $data_guru->nama = $request->input('nama');
        $data_guru->tgllahir = $request->input('tgllahir');
        $data_guru->alamat = $request->input('alamat');
        $data_guru->email = $request->input('email');
        $data_guru->id_role = $request->input('id_role');
        $data_guru->save();

        return redirect()->route('showdataguru',$data_guru->id)->with('success','Data berhasil diubah.');
    }

    public function hapusdataguru($id)
    {
        $data_guru = User::find($id);
        unlink('users/'.$data_guru->photo);
        $data_guru->delete();
        return redirect()->route('dataguru')->with('success', 'Satu Data Dihapus!');
    }

    // DATA SISWA

    public function datasiswa()
    {
        $datasiswa = Siswa::orderBy('tahunmasuk', 'DESC')->paginate(10);
        return view('admin.datasiswa', compact('datasiswa'));
    }

    public function tambahdatasiswa()
    {
        $kelas = Kelas::all();
        $sentra = Sentra::all();
        $tahun = Carbon::now()->year;
        return view('admin.tambahdatasiswa', compact('kelas', 'sentra', 'tahun'));
    }

    public function insertdatasiswa(Request $request)
    {
        $data_siswa = new Siswa();
        $data_siswa->nisn = $request->nisn;
        $data_siswa->namalengkap = $request->namalengkap;
        $data_siswa->namapanggil = $request->namapanggil;
        $data_siswa->noinduk = $request->noinduk;
        $data_siswa->jeniskelamin = $request->jeniskelamin;
        $data_siswa->templhir = $request->templhir;
        $data_siswa->tgllahir = $request->tgllahir;
        $data_siswa->agama = $request->agama;
        $data_siswa->anakke = $request->anakke;
        $data_siswa->namaibu = $request->namaibu;
        $data_siswa->namaayah = $request->namaayah;
        $data_siswa->statusorangtua = $request->statusorangtua;
        $data_siswa->pekerjaanibu = $request->pekerjaanibu;
        $data_siswa->pekerjaanayah = $request->pekerjaanayah;
        $data_siswa->alamat = $request->alamat;
        $data_siswa->desakelurahan = $request->desakelurahan;
        $data_siswa->kecamatan = $request->kecamatan;
        $data_siswa->kabupatenkota = $request->kabupatenkota;
        $data_siswa->provinsi = $request->provinsi;
        $data_siswa->id_kelas = $request->id_kelas;
        $data_siswa->id_sentra = $request->id_sentra;
        $data_siswa->tingkat = $request->tingkat;
        $data_siswa->tahunmasuk = $request->tahunmasuk;
        $data_siswa->save();

        return redirect()->route('datasiswa')->with('success','Data siswa berhasil ditambahkan.');
    }

    public function showdatasiswa($id)
    {
        $datasiswa = Siswa::find($id);
        return view('admin.showdatasiswa', compact('datasiswa'));
    }

    public function insertphotosiswa(Request $request, $id)
    {
        $datasiswa = Siswa::find($id);
        $destination = "datasiswa/";
        $photo = $request->file('photo');
        $ext = $photo->getClientOriginalExtension();
        $newName = 'siswa'.$id.'.'.$ext; /// blom
        $photo->move($destination, $newName);
        $datasiswa->photo = $newName;
        $datasiswa->save();

        return redirect()->route('showdatasiswa',$id)->with('success','Foto berhasil diubah.');
    }

    public function editdatasiswa($id)
    {
        $data_siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $sentra = Sentra::all();
        $tahun = Carbon::now()->year;
        return view('admin.editdatasiswa', compact('data_siswa', 'kelas', 'sentra', 'tahun'));   
    }

    public function savedatasiswa(Request $request, $id)
    {
        $data_siswa = Siswa::findOrFail($id);
        $data_siswa->nisn = $request->input('nisn');
        $data_siswa->namalengkap = $request->input('namalengkap');
        $data_siswa->namapanggil = $request->input('namapanggil');
        $data_siswa->noinduk = $request->input('noinduk');
        $data_siswa->jeniskelamin = $request->input('jeniskelamin');
        $data_siswa->templhir = $request->input('templhir');
        $data_siswa->tgllahir = $request->input('tgllahir');
        $data_siswa->agama = $request->input('agama');
        $data_siswa->anakke = $request->input('anakke');
        $data_siswa->namaibu = $request->input('namaibu');
        $data_siswa->namaayah = $request->input('namaayah');
        $data_siswa->statusorangtua = $request->input('statusorangtua');
        $data_siswa->pekerjaanibu = $request->input('pekerjaanibu');
        $data_siswa->pekerjaanayah = $request->input('pekerjaanayah');
        $data_siswa->alamat = $request->input('alamat');
        $data_siswa->desakelurahan = $request->input('desakelurahan');
        $data_siswa->kecamatan = $request->input('kecamatan');
        $data_siswa->kabupatenkota = $request->input('kabupatenkota');
        $data_siswa->provinsi = $request->input('provinsi');
        $data_siswa->id_kelas = $request->input('id_kelas');
        $data_siswa->id_sentra = $request->input('id_sentra');
        $data_siswa->tingkat = $request->input('tingkat');
        $data_siswa->tahunmasuk = $request->input('tahunmasuk');
        $data_siswa->save();

        return redirect()->route('showdatasiswa',$data_siswa->id)->with('success','Data berhasil diubah.');
    }

    public function editphotosiswa(Request $request, $id)
    {
        $datasiswa = Siswa::find($id);
        if (empty($request->file('photo')))
        {
            $datasiswa->photo = $datasiswa->photo;
        }
        else{    
            $destination = "datasiswa/";
            unlink('datasiswa/'.$datasiswa->photo);
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $newName = 'siswa'.$id.'.'.$ext; /// blom
            $photo->move($destination, $newName);
            $datasiswa->photo = $newName; 
        }
        $datasiswa->save();

        return redirect()->route('showdatasiswa',$id)->with('success','Foto berhasil diubah.');   
    }

    public function deletedatasiswa($id)
    {
        $data_siswa = Siswa::find($id);
        unlink('datasiswa/'.$data_siswa->photo);
        $data_siswa->delete();
        return redirect()->route('datasiswa')->with('success', 'Satu Data siswa telah Dihapus!');
    }

    // data kelas sentra

    public function showkelassentra()
    {
        $kelas = Kelas::all();
        $sentra = Sentra::all();
        return view ('admin.kelassentra', compact('kelas', 'sentra'));
    }

    //kelas

    public function tambahkelas()
    {
        $walikelas = User::where('id_role', '=', '3')->get();
        return view('admin.tambahkelas', compact('walikelas'));
    }

    public function insertdatakelas(Request $request)
    {
        $kelas = new Kelas();
        $kelas->namakelas = $request->namakelas;
        $kelas->usiasiswa = $request->usiasiswa;
        $kelas->id_users = $request->id_users;
        $kelas->save();

        return redirect()->route('showkelassentra')->with('success','Data Kelas berhasil ditambahkan.');
    }

    public function editkelas($id)
    {
        $kelas = Kelas::find($id);
        $walikelas = User::where('id_role', '=', '3')->get();
        return view('admin.editkelas', compact('kelas', 'walikelas'));
    }

    public function savekelas(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->namakelas = $request->input('namakelas');
        $kelas->usiasiswa = $request->input('usiasiswa');
        $kelas->id_users = $request->input('id_users');
        $kelas->save();

        return redirect()->route('showkelassentra')->with('success','Data Kelas berhasil diubah.');
    }

    public function deletekelas($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('showkelassentra')->with('success', 'Satu Data Kelas Dihapus!');
    }

    //sentra

    public function tambahsentra()
    {
        $walikelas = User::where('id_role', '=', '3')->get();
        return view('admin.tambahsentra', compact('walikelas'));
    }

    public function insertdatasentra(Request $request)
    {
        $sentra = new Sentra();
        $sentra->namasentra = $request->namasentra;
        $sentra->id_users = $request->id_users;
        $sentra->save();

        return redirect()->route('showkelassentra')->with('success','Data Sentra berhasil ditambahkan.');
    }

    public function editsentra($id)
    {
        $sentra = Sentra::find($id);
        $walikelas = User::where('id_role', '=', '3');
        return view('admin.editsentra', compact('sentra', 'walikelas'));
    }

    public function savesentra(Request $request, $id)
    {
        $sentra = Kelas::findOrFail($id);
        $sentra->namasentra = $request->input('namasentra');
        $sentra->id_users = $request->input('id_users');
        $sentra->save();

        return redirect()->route('showkelassentra')->with('success','Data Sentra berhasil diubah.');
    }

    public function deletesentra($id)
    {
        $sentra = Sentra::find($id);
        $sentra->delete();
        return redirect()->route('showkelassentra')->with('success', 'Satu Data Sentra Dihapus!');
    }

    // DATA RPP

    public function showdatarpp()
    {
        $rppharian = Harian::all();
        return view ('admin.datarpp', compact('rppharian'));
    }

    public function showdatarpph($id)
    {
        $rppharian = Harian::find($id);

        $kompetensidasar = Harian::select('id_kompdasar')->where('id', $rppharian->id)->first();
        $kompdasar = explode(",", $kompetensidasar->id_kompdasar);
        $materipembelajaran = Harian::select('id_materi')->where('id', $rppharian->id)->first();
        $materipemb = explode(",", $materipembelajaran->id_materi);
        $indikatorpembelajaran = Harian::select('indikatorharian')->where('id', $rppharian->id)->first();
        $indktpemb = str_replace(";", ";", $indikatorpembelajaran->indikatorharian);
        $tujuanpembelajaran = Harian::select('tujuanpemb')->where('id', $rppharian->id)->first();
        $tjnpemb = str_replace(";", ";", $tujuanpembelajaran->tujuanpemb);

        $kegiatanharian = KegiatanHarian::where('id_harian', $id)->get();

        return view('showrpph', compact('rppharian', 'kompdasar', 'materipemb', 'indktpemb', 'tjnpemb', 'kegiatanharian'));
    }

    public function setujuirpph(Request $request, $id)
    {
        $rppharian = Harian::find($id);
        $rppharian->statuspemb = $request->input('statuspemb');
        $rppharian->save();

        return redirect()->route('showdatarpph',$rppharian->id)->with('success','RPPH Disetujui');

    }

    // DATA NILAI

    public function showdatanilai()
    {
        return view ('admin.datanilai');
    }

    // DATA KOMPONEN

    public function showkompetensi()
    {
        $kompetensiinti = DB::table('kompinti')->get();
        $kompetensidasar = DB::table('kompdasar')->join('kompinti', 'kompinti.id', '=', 'kompdasar.id_kompinti')->get();
        return view('admin.showkompetensi', compact('kompetensiinti', 'kompetensidasar'));
    }

    public function showaspek()
    {
        $showaspek = DB::table('aspek')->get();
        $det_aspek = DB::table('aspek')->join('ranah', 'ranah.id', '=', 'aspek.id_ranah')->join('detailranah', 'ranah.id', '=', 'detailranah.id_ranah')->get();
        return view('admin.showaspek', compact('showaspek', 'det_aspek'));
    }

    public function showmateri()
    {
        $showktg = KtgMateri::all();
        
        return view('admin.showmateri', compact('showktg'));
    }

}
