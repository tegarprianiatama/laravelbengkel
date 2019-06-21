<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataMekanik
 * @package App\Models
 * @version March 5, 2019, 10:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection DetailTransaksi
 * @property string NAMA_MEKANIK
 * @property string ALAMAT
 * @property string NO_TELP
 */
class DataMekanik extends Model
{
    // use SoftDeletes;

    public $table = 'data_mekanik';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_MEKANIK';

    public $fillable = [
        'NAMA_MEKANIK',
        'ALAMAT',
        'NO_TELP'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_MEKANIK' => 'integer',
        'NAMA_MEKANIK' => 'string',
        'ALAMAT' => 'string',
        'NO_TELP' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA_MEKANIK' => 'required',
        'ALAMAT' => 'required',
        'NO_TELP' => 'required|between:5,20'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailTransaksis()
    {
        return $this->hasMany(\App\Models\DetailTransaksi::class);
    }
}
