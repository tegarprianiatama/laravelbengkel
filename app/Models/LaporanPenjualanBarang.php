<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LaporanPenjualanBarang
 * @package App\Models
 * @version April 22, 2019, 8:25 am UTC
 *
 * @property string MULAI_TANGGAL
 * @property string SAMPAI_TANGGAL
 */
class LaporanPenjualanBarang extends Model
{
    use SoftDeletes;

    public $table = 'laporan_penjualan_barangs';
    

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
    public function dataKasir()
    {
        return $this->belongsTo(\App\Models\DataKasir::class, 'ID_KASIR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataPelanggan()
    {
        return $this->belongsTo(\App\Models\DataPelanggan::class, 'ID_PELANGGAN');
    }
}
