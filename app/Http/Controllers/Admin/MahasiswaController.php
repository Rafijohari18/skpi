<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use App\Models\Kelas;
use App\Models\JenjangPendidikan;
use App\Models\Gelar;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;


class MahasiswaController extends Controller{
    
    private $model;

    public function __construct(Mahasiswa $Mahasiswa){
        $this->model = new Repository($Mahasiswa);
    }

    public function index(Request $request)
    {
        $data['title'] = 'Mahasiswa';
        $data['mahasiswa'] = Mahasiswa::all();
        
        return view('backend.Mahasiswa.index', compact('data'));
    }

    public function create()
    {
        $data['title'] = 'Tambah Mahasiswa ';
        $data['gelar'] = Gelar::all();
        $data['jenjang_pendidikan'] = JenjangPendidikan::all();
        $data['kelas'] = Kelas::all();
        $data['program_studi'] = ProgramStudi::all();

        return view('backend.Mahasiswa.create', compact('data'));
    }

    public function store(Request $request)
    {

        $user = User::create([ 
            'name'  => $request['name'],  
            'email' => $request['email'],  
            'password' => Hash::make($request['password']),  
        ]);

        Mahasiswa::create([
            'user_id'                 => $user['id'],  
            'npm'                     => $request['npm'],  
            'ttl'                     => date('Y-m-d',strtotime($request['ttl'])),  
            'program_studi_id'        => $request['program_studi_id'],  
            'kelas_id'                => $request['kelas_id'],  
            'no_ijazah'               => $request['no_ijazah'],  
            'thn_lulus'               => $request['thn_lulus'],  
            'gelar_id'                => $request['gelar_id'],  
            'jenjang_pendidikan_id'   => $request['jenjang_pendidikan_id'],  
        ]); 
        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil di Simpan !');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Mahasiswa ';
        $data['mahasiswa'] =  Mahasiswa::find($id);
        $data['gelar'] = Gelar::all();
        $data['jenjang_pendidikan'] = JenjangPendidikan::all();
        $data['kelas'] = Kelas::all();
        $data['program_studi'] = ProgramStudi::all();
    
        return view('backend.Mahasiswa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Mahasiswa::find($id);

        $data_user = User::where('id',$data['user_id'])->first();
        
        $data_user->update([
            'name' => $request['name'],  
            'email' => $request['email'],  
            'password' =>$request['password'] == NULL ? $data_user['password'] : Hash::make($request['password']),  
        ]);

        $data->update([
        'npm' => $request->npm,
        'ttl' => $request->ttl,
        'program_studi_id' => $request->program_studi_id,
        'kelas_id' => $request->kelas_id,
        'no_ijazah' => $request->no_ijazah,
        'thn_lulus' => $request->thn_lulus,
        'gelar_id' => $request->gelar_id,
        'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
        
        ]);

        return  redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil di Update !');
    }
      public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('success','Mahasiswa Berhasil di Hapus !');
    }    
}
