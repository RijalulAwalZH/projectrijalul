<?php

namespace App\Http\Controllers;

use App\pegawaiModel;
use App\User;
use App\golonganModel;
use App\jabatanModel;
use Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;



class pegawaiController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
         $pegawai=pegawaiModel::paginate(5);
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       $user=User::all();
            $jabatan=jabatanModel::all();
            $golongan=golonganModel::all();
        return view('pegawai.create',compact('golongan','jabatan','users'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =['email' => 'required|unique:users',
                                'password' => 'required|min:6|confirmed',
                                'name' => 'required',
                                'permision' =>'required',
                                'nip' => 'required|min:11|numeric|unique:pegawai',
                                'jabatan_id' =>'required',
                                'golongan_id' => 'required',
                                'foto' => 'required',
                                 ];

        $message =['email.unique' =>'Gunakan Email Lain',
                                        'name.required' =>'Wajib Isi',
                                        'email.required' =>'Wajib Isi',
                                        'password.unique' =>'wajib isi',
                                        'permision.confirmed' =>'Masukan Password Yang Benar',
                                        'permision.required' =>'Wajib isi',
                                        'nip.unique' =>'Gunakan Nip Lain',
                                        'nip.required' =>'Wajib isi',
                                        'nip.min' =>'Min 11',
                                        'nip.numeric' =>'Input Dengan Angka',
                                        'jabatan_id.required' =>'Wajib isi',
                                        'golongan_id.required' =>'Wajib isi'];


        $val=validator::make(Input::all(),$rules,$message);
        if($val->fails())
        {
            return redirect('pegawai/create')
            ->withErrors($val)
            ->withInput();

        }



           $akun=new User ;
         $akun->name=Input::get('name');
         $akun->email=Input::get('email');
         $akun->password=bcrypt(Input::get('password'));
         $akun->permision=Input::get('permision');
         $akun->save();
         
         $file = Input::file('foto');
        $destinationPath = public_path().'/assets/image/';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('foto')){
            $pegawai = new pegawaiModel;
            $pegawai->nip =$request->get('nip');
            $pegawai->jabatan_id =$request->get('jabatan_id');
            $pegawai->golongan_id =$request->get('golongan_id');
            $pegawai->foto =$request->get('foto');
            $pegawai->user_id = $akun->id;
            $pegawai->foto = $filename;
            $pegawai->save();
            }   
         return redirect('pegawai');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // dd($id);
        $jabatan=jabatanModel::all();
        $golongan=golonganModel::all();
         $pegawai=pegawaiModel::find($id);
         // $user=User::where('id',$pegawai->user_id)->first();
         
        return view('pegawai.edit',compact('pegawai','jabatan','golongan','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cariid=pegawaiModel::find($id);
        if ($cariid->nip != Request('nip')) {
            $rules = array('email' => 'required|unique:users',
                        'password' => 'required|min:6|confirmed',
                        'name' => 'required',
                        'permision' =>'required',
                        'nip' => 'required|min:11|numeric|unique:pegawai',
                        'jabatan_id' =>'required',
                        'golongan_id' => 'required',
                        'foto' => 'required',
                         );
        }
        else{

            $rules = array('email' => 'required',
                            'password' => 'required|min:6|confirmed',
                            'name' => 'required',
                            'permision' =>'required',
                            'nip' => 'required|min:11|numeric',
                            'jabatan_id' =>'required',
                            'golongan_id' => 'required',
                            'foto' => 'required',
                             );
        }

        $message =array('email.unique' =>'Gunakan Email Lain' ,
                        'name.required' =>'Wajib Isi',
                        'email.required' =>'Wajib Isi',
                        'password.unique' =>'wajib isi',
                        'permision.confirmed' =>'Masukan Password Yang Benar',
                        'permision.required' =>'Wajib isi',
                        'nip.unique' =>'Gunakan Nip Lain',
                        'nip.required' =>'Wajib isi',
                        'nip.min' =>'Min 11',
                        'nip.numeric' =>'Input Dengan Angka',
                        'jabatan_id.required' =>'Wajib isi',
                        'golongan_id.required' =>'Wajib isi');

        $val=validator::make(Input::all(),$rules,$message);
        if($val->fails())
        {
            return redirect('pegawai/'.$cariid->id.'/edit')
            ->withErrors($val)
            ->withInput();

        }
        $update=Request::all();
        $pegawai=User::find($id);
        // // $user=User::where('id',$pegawai->user_id) ;
        // // dd($user);
        // // $user=User::find($pegawai->user_id);
        // $user->update($update);
        $pegawai->update($update);
        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         pegawaiModel::find($id)->delete();
        return redirect('pegawai');
    }
}
