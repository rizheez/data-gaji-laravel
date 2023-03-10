<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGaji extends Model
{
    use HasFactory;

    protected $table = 'data_gaji';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'nik',
        'nama',
        'jabatan',
        'gajibulan',
        'telat',
        'nominalgaji',
        'denda',
        'totalgaji'
    ];
    public $incrementing = false;

    // public function getGajibulanAttribute($value)
    // {
    //     return $this->attributes['gajibulan']->format('d-m-Y');
    // }
}
