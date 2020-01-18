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
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function userprofile($id)
    {
        $profil = User::find($id);
        return view ('profil', compact('profil'));
    }

    public function insertphotoprofil(Request $request, $id)
    {
        $dataguru = User::find($id);
        $destination = "users/";
        $photo = $request->file('photo');
        $ext = $photo->getClientOriginalExtension();
        $newName = 'profil'.$id.'.'.$ext; /// blom
        $photo->move($destination, $newName);
        $dataguru->photo = $newName;
        $dataguru->save();

        return redirect()->route('userprofile',$id)->with('success','Foto berhasil diubah.');
    }

    public function editphotoprofil(Request $request, $id)
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

        return redirect()->route('userprofile',$id)->with('success','Foto berhasil diubah.');   
    }

    public function editdataprofil($id)
    {
        $data_guru = User::find($id);
        return view('editprofil', compact('data_guru'));
    }

    public function simpandataprofil(Request $request, $id)
    {
        $data_guru = User::findOrFail($id);
        $data_guru->nuptk = $request->input('nuptk');
        $data_guru->nama = $request->input('nama');
        $data_guru->tgllahir = $request->input('tgllahir');
        $data_guru->alamat = $request->input('alamat');
        $data_guru->email = $request->input('email');
        $data_guru->id_role = $request->input('id_role');
        $data_guru->save();

        return redirect()->route('userprofile',$data_guru->id)->with('success','Data berhasil diubah.');
    }
}
