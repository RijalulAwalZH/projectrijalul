<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawaiModel extends Model
{
	protected $table='pegawai';

	protected $fillable=array('nip','user_id','jabatan_id','golongan_id','foto');
	protected $visible=array('nip','user_id','jabatan_id','golongan_id','foto');

	

    public function golonganModel()
	{
		return $this->belongsTo('App\golonganModel','golongan_id');
	}
	public function jabatanModel()
	{
		return $this->belongsTo('App\jabatanModel','jabatan_id');
	}

	public function tunjangan_pegawaiModel()
	{
		return $this->hasOne('App\tunjangan_pegawaiModel','pegawai_id');
	}

	public function lembur_pegawaiModel()
	{
		return $this->hasMany('App\lembur_pegawaiModel','pegawai_id');
	}

	public function User()
	{
		return $this->belongsTo('App\User','user_id');
	}

}
