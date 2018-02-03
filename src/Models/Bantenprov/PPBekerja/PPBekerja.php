<?php

namespace Bantenprov\PPBekerja\Models\Bantenprov\PPBekerja;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PPBekerja extends Model
{

    protected $table = 'pp_bekerjas';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\PPBekerja\Models\Bantenprov\PPBekerja\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\PPBekerja\Models\Bantenprov\PPBekerja\Regency','id','regency_id');
    }

}

