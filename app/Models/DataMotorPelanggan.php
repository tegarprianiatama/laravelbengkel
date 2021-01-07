<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataMotorPelanggan
 * @package App\Models
 * @version March 5, 2019, 10:06 am UTC
 *
 * @property \App\Models\DataPelanggan dataPelanggan
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property integer ID_PELANGGAN
 * @property string NAMA
 * @property string NO_POL
 * @property integer ISI_SILIDER
 * @property string KATEGORI
 */
class DataMotorPelanggan extends Model
{
    use SoftDeletes;

    public $table = 'data_motor_pelanggan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_DETAIL_MOTOR';

    public $fillable = [
        'ID_PELANGGAN',
        'NAMA',
        'NO_POL',
        'ISI_SILIDER',
        'ID_KATEGORI'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_DETAIL_MOTOR' => 'integer',
        'ID_PELANGGAN' => 'string',
        'NAMA' => 'string',
        'NO_POL' => 'string',
        'ISI_SILIDER' => 'integer',
        'ID_KATEGORI' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ID_PELANGGAN' => 'required',
        'NAMA' => 'required',
        // 'NO_POL' => 'required|unique:data_motor_pelanggan',
        'ISI_SILIDER' => 'required',
        'ID_KATEGORI' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataPelanggan()
    {
        return $this->belongsTo(\App\Models\DataPelanggan::class, 'ID_PELANGGAN');
    }

    public function kategoriMotor()
    {
        return $this->belongsTo(\App\Models\KategoriMotor::class, 'ID_KATEGORI', 'ID_KATEGORI_MOTOR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function dataKasirs()
    {
        return $this->belongsToMany(\App\Models\DataKasir::class, 'data_transaksi');
    }
}
