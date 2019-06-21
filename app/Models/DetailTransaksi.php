<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailTransaksi
 * @package App\Models
 * @version March 12, 2019, 2:25 pm UTC
 *
 * @property \App\Models\DataTransaksi dataTransaksi
 * @property \App\Models\DataJasaServi dataJasaServi
 * @property \App\Models\DataBarang dataBarang
 * @property \App\Models\DataMekanik dataMekanik
 * @property \App\Models\DataPelanggan dataPelanggan
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property integer ID_DATA_TRANSAKSI
 * @property integer ID_BARANG
 * @property integer ID_JASA_SERVIS
 * @property string QTY
 * @property string DISKON
 * @property string SUB_TOTAL
 */
class DetailTransaksi extends Model
{
    use SoftDeletes;

    public $table = 'detail_transaksi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_DETAIL_JASA_SERVIS';

    public $fillable = [
        'ID_DATA_TRANSAKSI',
        'ID_BARANG',
        // 'ID_JASA_SERVIS',
        'QTY',
        'DISKON',
        'SUB_TOTAL'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_DETAIL_JASA_SERVIS' => 'integer',
        'ID_DATA_TRANSAKSI' => 'integer',        
        'ID_BARANG' => 'integer',       
        // 'ID_JASA_SERVIS' => 'integer',
        'QTY' => 'string',
        'DISKON' => 'string',
        'SUB_TOTAL' => 'string'
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
    public function dataTransaksi()
    {
        return $this->belongsTo(\App\Models\DataTransaksi::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    // public function dataJasaServi()
    // {
    //     return $this->belongsTo(\App\Models\DataJasaServis::class);
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataBarang()
    {
        return $this->belongsTo(\App\Models\DataBarang::class, 'ID_BARANG');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    // public function dataMekanik()
    // {
    //     return $this->belongsTo(\App\Models\DataMekanik::class);
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    // public function dataPelanggan()
    // {
    //     return $this->belongsTo(\App\Models\DataPelanggan::class);
    // }
}
