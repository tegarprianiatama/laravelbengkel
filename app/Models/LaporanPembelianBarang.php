<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LaporanPembelianBarang
 * @package App\Models
 * @version April 23, 2019, 3:09 am UTC
 *
 * @property string MULAI_TANGGAL
 * @property string SAMPAI_TANGGAL
 */
class LaporanPembelianBarang extends Model
{
    use SoftDeletes;

    public $table = 'laporan_pembelian_barangs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'MULAI_TANGGAL',
        'SAMPAI_TANGGAL'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'MULAI_TANGGAL' => 'string',
        'SAMPAI_TANGGAL' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataSupplier()
    {
        return $this->belongsTo(\App\Models\dataSupplier::class, 'ID_SUPPLIER');
    }
}
