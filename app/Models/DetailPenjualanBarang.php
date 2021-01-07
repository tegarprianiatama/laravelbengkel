<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPenjualanBarang
 * @package App\Models
 * @version March 5, 2019, 10:37 am UTC
 *
 * @property \App\Models\DataBarang dataBarang
 * @property \App\Models\DataPenjualanBarang dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property integer ID_TRANSAKSI_PENJUALAN
 * @property integer ID_BARANG
 * @property integer QTY
 * @property float HARGA_JUAL
 * @property float SUBTOTAL
 */
class DetailPenjualanBarang extends Model
{
    use SoftDeletes;

    public $table = 'detail_penjualan_barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_PENJUALAN_BARANG';

    public $fillable = [
        'ID_TRANSAKSI_PENJUALAN',
        'ID_BARANG',
        'QTY',
        'HARGA_JUAL',
        'SUBTOTAL'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_PENJUALAN_BARANG' => 'integer',
        'ID_TRANSAKSI_PENJUALAN' => 'integer',
        'ID_BARANG' => 'integer',
        'QTY' => 'integer',
        'HARGA_JUAL' => 'float',
        'SUBTOTAL' => 'float'
     
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
    public function dataBarang()
    {
        return $this->belongsTo(\App\Models\DataBarang::class, 'ID_BARANG');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataPenjualanBarang()
    {
        return $this->belongsTo(\App\Models\DataPenjualanBarang::class);
    }
}
