<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Role;
use App\Kelas;
use App\Sentra;
use App\Siswa;
use App\KompDasar;
use App\Materi;
use App\Harian;
use App\KegiatanHarian;
use App\Aspek;
use App\Ranah;
use App\NilaiAspek;
use App\NilaiIndikator;
use App\NilaiAnekdot;
use Carbon\Carbon;

class GuruController extends Controller
{
    // perofil kelas based guru yang login

    public function profilkelas()
    {
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();
        $jumlahsiswa = count(Siswa::where('id_kelas', $kelas->id)->get());
        return view('profilkelas', compact('kelas', 'siswa', 'jumlahsiswa'));
    }

    public function showdatasiswa($id)
    {
        $datasiswa = Siswa::find($id);
        return view('admin.showdatasiswa', compact('datasiswa'));
    }

    // rpph harian, hari ini, rpph yang blom, crud, rpph yang sudh sah

    public function harian()
    {
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();        
        $rpphtoday = Harian::where('tglpemb', Carbon::now())->get();
        $rppharian = Harian::where('id_kelas', $kelas->id)->get();
        return view('harian', compact('rppharian', 'rpphtoday'));
    }

    public function buatrpph()
    {
        $hari = Carbon::now()->day; //blom
        $tanggal = Carbon::today(); //blom
        $tahun = Carbon::now()->year; //blom

        $kelas = Kelas::where('id_users', Auth::user()->id)->first();
        $materipemb = Materi::where('id_kelas', $kelas->id)->get();
        $kompetensidasar = KompDasar::all(); 
        return view('buatrpph', compact('kelas','materipemb', 'kompetensidasar', 'tahun'));
    }

    public function insertrpph(Request $request)
    {
        $rpph = new Harian();
        $rpph->tglpemb = $request->tglpemb;
        $rpph->tahunajaran = $request->tahunajaran;
        $rpph->id_kelas = $request->id_kelas;
        $rpph->semester = $request->semester;
        $rpph->minggu = $request->minggu;
        $rpph->tema = $request->tema;
        $rpph->subtema = $request->subtema;
        $rpph->strategipemb = $request->strategipemb;
        if (!empty($request->id_kompdasar)){
           $rpph->id_kompdasar = implode(",", $request->id_kompdasar);
        }
        if (!empty($request->id_materi)){
            $rpph->id_materi = implode(",", $request->id_materi);
        }
        $rpph->indikatorharian = $request->indikatorharian;
        $rpph->tujuanpemb = $request->tujuanpemb;
        $kodepemb = $request->id_kelas.'-'.$request->tglpemb.'-'.$request->minggu.'-'.$request->semester;
        $rpph->kodepemb = $kodepemb;
        $rpph->save();

        return redirect()->route('buatrpphkegiatan', $rpph->id)->with('success','RPPH berhasil dibuat, selanjutnya buat kegiatan pembelajaran untuk RPPH');
    }   

    public function showrpph($id)
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

    public function editrppharian($id)
    {
        $rppharian = Harian::find($id);
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();
        $materipemb = Materi::where('id_kelas', $kelas->id)->get();
        $kompetensidasar = KompDasar::all();
        $kompetnsdasar = Harian::select('id_kompdasar')->where('id', $rppharian->id)->first();
        $kompdasar = explode(",", $kompetnsdasar->id_kompdasar);
        $materipembelajaran = Harian::select('id_materi')->where('id', $rppharian->id)->first();
        $mtrpemb = explode(",", $materipembelajaran->id_materi);
        return view('editharian', compact('rppharian', 'kelas', 'materipemb', 'kompetensidasar', 'kompdasar', 'mtrpemb'));
    }

    public function savedataeditrpph(Request $request, $id)
    {
        $rppharian = Harian::find($id);
        $rppharian->tglpemb = $request->input('tglpemb');
        $rppharian->tahunajaran = $request->input('tahunajaran');
        $rppharian->id_kelas = $request->input('id_kelas');
        $rppharian->semester = $request->input('semester');
        $rppharian->minggu = $request->input('minggu');
        $rppharian->tema = $request->input('tema');
        $rppharian->subtema = $request->input('subtema');
        $rppharian->strategipemb = $request->input('strategipemb');
        if (!empty($request->input('id_kompdasar'))){
           $rppharian->id_kompdasar = implode(",", $request->input('id_kompdasar'));
        }
        if (!empty($request->input('id_materi'))){
            $rppharian->id_materi = implode(",", $request->input('id_materi'));
        }
        $rppharian->indikatorharian = $request->input('indikatorharian');
        $rppharian->tujuanpemb = $request->input('tujuanpemb');
        $kodepemb = $request->input('id_kelas').'-'.$request->input('tglpemb').'-'.$request->input('minggu').'-'.$request->input('semester');
        $rppharian->kodepemb = $kodepemb;
        $rppharian->save();

        return redirect()->route('showrpph', $rppharian->id)->with('success','RPPH berhasil diubah');
    }

   	public function buatrpphkegiatan($id)
   	{
   		$rpph = Harian::find($id);
        $rpphkgt = KegiatanHarian::where('id_harian', $rpph->id)->get();
        $rpphkgtall = count($rpphkgt);
        $aspek = DB::table('aspek');
   		return view('buatkegiatan', compact('rpph', 'rpphkgt', 'rpphkgtall', 'aspek'));
   	}

    public function deleterpph($id)
    {
        $rppharian = Harian::find($id);
        $kegiatanharian = KegiatanHarian::where('id_harian', $id);
        $kegiatanharian->delete();
        $rppharian->delete();
        return redirect()->route('harian')->with('success', 'Satu Data RPPH Dihapus!');
    }

    public function insertrpphkegiatan(Request $request, $id)
    {
        $rpph = Harian::find($id);
        $rpphkgt = new KegiatanHarian();
        $rpphkgt->id_harian = $id;
        $rpphkgt->tahapanharian = $request->tahapanharian;
        $rpphkgt->waktuharian = $request->waktuharian;
        $rpphkgt->kegiatanharian = $request->kegiatanharian;
        $rpphkgt->id_aspek = $request->id_aspek;
        $rpphkgt->mediaharian = $request->mediaharian;
        $rpphkgt->save();

        return redirect()->route('buatrpphkegiatan', $rpph->id)->with('success', 'Kegiatan berhasil dibuat.');   
    }
    public function saverpphkegiatan(Request $request, $id)
    {
        $rpphkgt = KegiatanHarian::find($id);
        $rpphkgt->tahapanharian = $request->input('tahapanharian');
        $rpphkgt->waktuharian = $request->input('waktuharian');
        $rpphkgt->kegiatanharian = $request->input('kegiatanharian');
        $rpphkgt->mediaharian = $request->input('mediaharian');
        $rpphkgt->save();

        return redirect()->route('buatrpphkegiatan', ['id' => $rpphkgt->id_harian])->with('success', 'Kegiatan berhasil diubah.');      
    }

    public function deleterpphkegiatan($id)
    {
        $rpphkgt = KegiatanHarian::find($id);
        $rpphkgt->delete();

        return redirect()->route('buatrpphkegiatan', ['id' => $rpphkgt->id_harian])->with('success', 'Kegiatan berhasil dihapus.');      
    }

    public function mingguan()
    {
        $harian = Harian::where('minggu', 4)->get();
        // dd($harian);
        return view('mingguan');
    }

    public function semester()
    {
        return view('semester');
    }

    public function semuarpp()
    {
        return view('semuarpp');
    }
    
    //  penilaian
    
    public function penilaian()
    {   
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();        
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();
        $rppharian = Harian::where('id_kelas', $kelas->id)->get(); 

        $rpphariandone = DB::table('harian')->where('id_kelas', '=', $kelas->id)->where('statuspemb', '=', "Disetujui")->get(); 
                            
        $aspek = DB::table('aspek')->get();
        return view('penilaian', compact('kelas', 'rppharian', 'rpphariandone','siswa', 'aspek'));
    }

    //nilai aspek

    public function buatpenilaianaspek()
    {
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();        
        $rppharian = Harian::where('id_kelas', $kelas->id)->where('statuspemb', "Disetujui")->get(); 
        $aspek = DB::table('aspek')->get();
        return view('penilaianaspek',compact('rppharian', 'aspek'));
    }
    public function penilaiankegiatanaspek($id)
    {
        $harian = Harian::find($id);
        $rpphkgt = KegiatanHarian::where('id_harian', $harian->id)->get();
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();
        $aspek = DB::table('aspek')->get();

        return view('penilaiankegiatanaspek', compact('siswa', 'rpphkgt', 'aspek'));
    }

    public function nilaiaspekkegiatan($id)
    {
        $rpphkgt = KegiatanHarian::find($id);
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();
        $aspek = DB::table('aspek')->get();
        $nilaiaspek = NilaiAspek::where('id_kegiatanharian', '=', $rpphkgt->id)->get();

        return view('nilaiaspek', compact('rpphkgt', 'kelas', 'siswa', 'aspek', 'nilaiaspek'));

    }

    public function insertnilaiaspekkegiatan(Request $request, $id)
    {
        $rpphkgt = KegiatanHarian::find($id);
        $data = $request->all();
        $siswa = $data['id_datasiswa'];
        $nilaiaspk = $data['nilaiaspk'];

        foreach ($siswa as $key => $input) {
            $nilai = new NilaiAspek();
            $nilai->tglnilaiaspk = $data['tglnilaiaspk'];
            $nilai->id_aspek = $data['id_aspek'];
            $nilai->id_kegiatanharian = $data['id_kegiatanharian'];
            $nilai->id_datasiswa = isset($siswa[$key]) ? $siswa[$key] : '';
            $nilai->nilaiaspk = isset($nilaiaspk[$key]) ? $nilaiaspk[$key] : '';
            $nilai->save();
        }

        return redirect()->route('nilaiaspekkegiatan', $id)->with('success', 'Nilai berhasil ditambahkan');
    }

    // penilaian indikator

    public function buatpenilaianindikator()
    {
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();        
        $rppharian = Harian::where('id_kelas', $kelas->id)->where('statuspemb', "Disetujui")->get(); 
        return view('penilaianindikator',compact('rppharian'));   
    }

    public function penilaianindikatoranak($id)
    {
        $rppharian = Harian::find($id);
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();           
        return view('penilaianindikatoranak', compact('rppharian', 'siswa'));
    }

    public function penilaianindikator($id, $id_datasiswa)
    {
        $rppharian = Harian::find($id);
        $siswa = Siswa::where('id', $id_datasiswa)->get();
        $indikatorpembelajaran = Harian::select('indikatorharian')->where('id', $rppharian->id)->first();
        $indktpemb = explode (";", $indikatorpembelajaran->indikatorharian);
        $kompetensidasar = Harian::select('id_kompdasar')->where('id', $rppharian->id)->first();
        $kompdasar = explode(",", $kompetensidasar->id_kompdasar);        
        $aspek = DB::table('aspek')->get();
        $nilaiindikator = NilaiIndikator::where('id_harian', $id)->where('id_datasiswa', $id_datasiswa)->get();
        return view('nilaiindikator', compact('rppharian', 'siswa', 'nilaiindikator','aspek', 'indktpemb', 'kompdasar'));
    }

    public function insertnilaiindikator(Request $req)
    {        
        $kompetensidasar = implode(',',$req->kompetensidasar);
        $indikator = implode(';', $req->indikator);
        NilaiIndikator::insert([
            'kompetensidasar' => $kompetensidasar,
            'indikator' => $indikator,
            'id_datasiswa' => $req->id_datasiswa,
            'id_harian' => $req->id_harian,
            'id_aspek' => $req->id_aspek,
            'nilaiindikator' => $req->nilaiindikator
        ]);

        return back()->with('success', 'Nilai Indikator Berhasil di Tambah');
       
    }

    // penilaian ceklis

    public function buatpenilaianceklis()
    {
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();        
        $rppharian = Harian::where('id_kelas', $kelas->id)->get(); 
        $aspek = DB::table('aspek')->get();
        return view('penilaianceklis',compact('rppharian', 'aspek'));
    }

    // penilaian anekdot

    public function buatpenilaiananekdot()
    {
        $nilaianekdot = NilaiAnekdot::orderBy('tglanekdot', 'DESC')->get();

        return view('penilaiananekdot', compact('nilaianekdot'));
    }

    public function penilaiananekdot()
    {
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();        
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();
        return view('nilaianekdot',compact('siswa'));
    }

    public function insertnilaianekdot(Request $request)
    {
        $anekdot = new NilaiAnekdot();
        $anekdot->id_datasiswa = $request->id_datasiswa;
        $anekdot->tglanekdot = $request->tglanekdot;
        $anekdot->waktuanekdot = $request->waktuanekdot;
        $anekdot->tempatanekdot = $request->tempatanekdot;
        $anekdot->peristiwa = $request->peristiwa;
        $anekdot->save();

        return redirect()->route('buatpenilaiananekdot')->with('success', 'Nilai berhasil ditambahkan');
    }

    // NILAI ANAK

    public function tanggalRPP(){
        
        return view('pilihtanggal');
    }
    
    public function nilaianak(Request $req)
    {   
        $tanggal = $req->tanggalRPP;
        
        $kelas = Kelas::where('id_users', Auth::user()->id)->first();        
        $siswa = Siswa::where('id_kelas', $kelas->id)->get();

        // $siswa  = NilaiAspek::where('tglnilaiaspk', $tanggal)->get();
            
        return view('nilaianak',compact('tanggal', 'siswa', 'kelas'));
    }    

    public function nilaiaspekanak($id)
    {
        $id_anak = $id;
        $aspeknya = DB::table('aspek')->get();
        // $aspeknya = NilaiAspek::where('id', $id)->get();
        return view('nilaianakaspek', compact('nilaiaspekanak', 'aspeknya', 'id_anak'));
    }

    public function nilaiindikatoranak($id, Request $req)
    {
        $id_harian = Harian::where('tglpemb', $req->tanggalRPP)->first();
        $nilai = NilaiIndikator::where('id_harian', $id_harian->id)
        ->where('id_datasiswa', $id)
        ->first();
        
        return view('nilaianakindikator', compact('nilai'));
    }

    public function nilaiceklisanak($id, Request $req)
    {
        $id_harian = Harian::where('tglpemb', $req->tanggalRPP)->first();
        $nilaiindikator = NilaiIndikator::where('id_harian', $id_harian->id)
        ->where('id_datasiswa', $id)
        ->get();
        return view('nilaianakceklis', compact('nilaiindikator'));
    }

    public function nilaianekdotanak($id)
    {
        $nilaianekdotanak = NilaiAnekdot::where('id_datasiswa', $id)->whereYear('tglanekdot','2020')->orderBy('tglanekdot')->get();
        return view('nilaianakanekdot', compact('nilaianekdotanak'));
    }    

    // tried :( but cannot yet :(

    public function caripenilaian(Request $request, $id_kelas)
    {
        $cari = $request->cari;
        $rpph = Harian::where('id_kelas', $id_kelas, 'AND', 'tglpemb', 'LIKE', "%".$cari."%" );

        return view('penilaian', ['rpph' => $rpph]);
    }

    public function printRPPH($id){

        $dataHarian = Harian::where('id', $id)->first();
        $kegiatan = KegiatanHarian::where('id_harian', $id)->get();

        return view('printRPPH', compact('dataHarian', 'kegiatan'));
    }    
    
    public function showNilaiIndikator($id, Request $req){
        
        $id_harian = $id;
        $id_datasiswa = $req->id_datasiswa;
        $nilaiindikator = NilaiIndikator::where('id_datasiswa', $id_datasiswa)
                        ->get();
        $kompetensidasar = Harian::where('id', $id)->first();
        $arrkompetensidasar = explode(',', $kompetensidasar->id_kompdasar);        
        $arrIndikatorHarian = explode(';', $kompetensidasar->indikatorharian);    
        $aspek = Aspek::all();           
        return view('nilaiindikator', compact('nilaiindikator', 'arrkompetensidasar', 'arrIndikatorHarian', 'aspek', 'id_harian', 'id_datasiswa'));
    }
}
