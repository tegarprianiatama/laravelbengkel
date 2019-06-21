<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class DataJasaServis
 * @package App\Models
 * @version March 5, 2019, 9:57 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection DetailTransaksi
 * @property string NAMA_JASA
 * @property string KETERANGAN
 * @property float HARGA
 */
class DataJasaServis extends Model
{
    use SoftDeletes;

    public $table = 'data_jasa_servis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_JASA_SERVIS';

    public $fillable = [
        'NAMA_JASA',
        'KETERANGAN',
        'HARGA'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_JASA_SERVIS' => 'integer',
        'NAMA_JASA' => 'string',
        'KETERANGAN' => 'string',
        'HARGA' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA_JASA' => 'required',
        'KETERANGAN' => 'required',
        'HARGA' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailTransaksis()
    {
        return $this->hasMany(\App\Models\DetailTransaksi::class);
    }
}
