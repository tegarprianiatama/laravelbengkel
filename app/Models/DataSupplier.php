<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataSupplier
 * @package App\Models
 * @version March 5, 2019, 10:42 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection DataPembelianBarang
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property string NAMA_SUPPLIER
 * @property string ALAMAT_SUPPLIER
 * @property string CABANG_SUPPLIER
 * @property string NO_TELP_SUPPLIER
 */
class DataSupplier extends Model
{
    use SoftDeletes;

    public $table = 'data_supplier';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_SUPPLIER';

    public $fillable = [
        'NAMA_SUPPLIER',
        'ALAMAT_SUPPLIER',
        'CABANG_SUPPLIER',
        'NO_TELP_SUPPLIER'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_SUPPLIER' => 'integer',
        'NAMA_SUPPLIER' => 'string',
        'ALAMAT_SUPPLIER' => 'string',
        'CABANG_SUPPLIER' => 'string',
        'NO_TELP_SUPPLIER' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA_SUPPLIER' => 'required',
        'ALAMAT_SUPPLIER' => 'required',
        'CABANG_SUPPLIER' => 'required',
        'NO_TELP_SUPPLIER' => 'required|between:5,20'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dataPembelianBarangs()
    {
        return $this->hasMany(\App\Models\DataPembelianBarang::class);
    }
}
