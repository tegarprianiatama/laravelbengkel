<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPembelianBarang
 * @package App\Models
 * @version March 15, 2019, 5:23 pm UTC
 *
 * @property \App\Models\DataPembelianBarang dataPembelianBarang
 * @property \Illuminate\Database\Eloquent\Collection dataPembelianBarang
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property integer ID_DATA_PEMBELIAN_BARANG
 * @property integer ID_BARANG
 * @property integer QTY
 * @property float HARGA_MODAL
 * @property float SUBTOTAL
 */
class DetailPembelianBarang extends Model
{
    use SoftDeletes;

    public $table = 'detail_pembelian_barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_DETAIL_PEMBELIAN_BARANG';

    public $fillable = [
        'ID_DATA_PEMBELIAN_BARANG',
        'ID_BARANG',
        'QTY',
        'HARGA_MODAL',
        'HARGA_BARU',
        'SUBTOTAL'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_DETAIL_PEMBELIAN_BARANG' => 'integer',
        'ID_DATA_PEMBELIAN_BARANG' => 'integer',
        'ID_BARANG' => 'integer',
        'QTY' => 'integer',
        'HARGA_MODAL' => 'float',
        'HARGA_BARU' => 'float',
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
    public function dataPembelianBarang()
    {
        return $this->belongsTo(\App\Models\DataPembelianBarang::class);
    }

    public function dataBarang() 
    {
        return $this->belongsTo(DataBarang::class, 'ID_BARANG');
    }
}
