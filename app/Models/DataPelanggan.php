<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataPelanggan
 * @package App\Models
 * @version March 5, 2019, 10:09 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection DataMotorPelanggan
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property string NAMA
 * @property string ALAMAT
 * @property string NO_TELP
 */
class DataPelanggan extends Model
{
    use SoftDeletes;

    public $table = 'data_pelanggan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_PELANGGAN';

    public $fillable = [
        'NAMA',
        'ALAMAT',
        'NO_TELP'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_PELANGGAN' => 'integer',
        'NAMA' => 'string',
        'ALAMAT' => 'string',
        'NO_TELP' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA' => 'required',
        'ALAMAT' => 'required',
        'NO_TELP' => 'required|between:5,20'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dataMotorPelanggans()
    {
        return $this->hasMany(\App\Models\DataMotorPelanggan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function dataKasirs()
    {
        return $this->belongsToMany(\App\Models\DataKasir::class, 'data_penjualan_barang');
    }
}
