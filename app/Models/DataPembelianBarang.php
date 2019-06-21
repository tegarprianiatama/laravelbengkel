<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class DataPembelianBarang
 * @package App\Models
 * @version March 14, 2019, 2:34 pm UTC
 *
 * @property \App\Models\DataSupplier dataSupplier
 * @property \App\Models\DataBarang dataBarang
 * @property \Illuminate\Database\Eloquent\Collection DetailPembelianBarang
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property integer ID_SUPPLIER
 * @property date TGL_PEMBELIAN
 * @property string KETERANGAN
 * @property integer ID_BARANG
 * @property string QTY
 * @property float HARGA_MODAL
 * @property string TOTAL
 */
class DataPembelianBarang extends Model
{
    use SoftDeletes;

    public $table = 'data_pembelian_barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_DATA_PEMBELIAN_BARANG';

    public $fillable = [
        'ID_SUPPLIER',
        'TGL_PEMBELIAN',
        'KETERANGAN',
        'DISKON',
        'JUMLAH_BAYAR',
        'TOTAL',
        'TOTAL_BERSIH',
        'KEMBALIAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_DATA_PEMBELIAN_BARANG' => 'integer',
        'ID_SUPPLIER' => 'integer',
        'TGL_PEMBELIAN' => 'date',
        'KETERANGAN' => 'string',
        'DISKON' => 'integer',
        'JUMLAH_BAYAR' => 'integer',
        'TOTAL' => 'integer',
        'TOTAL_BERSIH' => 'integer',
        'KEMBALIAN' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'KETERANGAN' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataSupplier()
    {
        return $this->belongsTo(\App\Models\DataSupplier::class, 'ID_SUPPLIER');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataBarang()
    {
        return $this->belongsTo(\App\Models\DataBarang::class, 'ID_BARANG');
    }

    public function detailPembelianBarang()
    {
        return $this->hasMany(DetailPembelianBarang::class, 'ID_DATA_PEMBELIAN_BARANG');
    }

     public function setTglPembelianAttribute($data)
    {
        $this->attributes['TGL_PEMBELIAN'] = Carbon::createFromFormat('m-d-Y', $data);
    }
    public function getTglPembelianAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
}
