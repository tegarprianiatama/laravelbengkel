<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class DataBarang
 * @package App\Models
 * @version March 5, 2019, 9:53 am UTC
 *
 * @property \App\Models\DetailPembelianBarang detailPembelianBarang
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection DetailTransaksi
 * @property integer ID_DETAIL_PEMBELIAN_BARANG
 * @property string KODE_BARANG
 * @property string NAMA_BARANG
 * @property integer STOK
 * @property string SATUAN
 * @property float HARGA_MODAL
 * @property float HARGA_JUAL
 * @property string JENIS
 * @property float BIAYA_PEMASANGAN
 * @property string KETERANGAN
 */
class DataBarang extends Model
{
    use SoftDeletes;

    public $table = 'data_barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_BARANG';

    public $fillable = [
        'ID_DETAIL_PEMBELIAN_BARANG',
        'KODE_BARANG',
        'NAMA_BARANG',
        'ID_SUPPLIER',
        'STOK',
        'SATUAN',
        'HARGA_MODAL',
        'HARGA_JUAL',
        'JENIS',
        'BIAYA_PEMASANGAN',
        'KETERANGAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_BARANG' => 'integer',
        'ID_DETAIL_PEMBELIAN_BARANG' => 'integer',
        'KODE_BARANG' => 'string',
        'NAMA_BARANG' => 'string',
        'ID_SUPPLIER' => 'integer',
        'STOK' => 'integer',
        'SATUAN' => 'string',
        'HARGA_MODAL' => 'float',
        'HARGA_JUAL' => 'float',
        'JENIS' => 'string',
        'BIAYA_PEMASANGAN' => 'float',
        'KETERANGAN' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'KODE_BARANG' => 'required',
        'STOK' => 'required',
        'SATUAN' => 'required',
        'HARGA_MODAL' => 'required',
        'HARGA_JUAL' => 'required',
        'JENIS' => 'required',
        'BIAYA_PEMASANGAN' => 'required',
        'KETERANGAN' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function detailPembelianBarang()
    {
        return $this->belongsTo(\App\Models\DetailPembelianBarang::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function dataPenjualanBarangs()
    {
        return $this->belongsToMany(\App\Models\DataPenjualanBarang::class, 'detail_penjualan_barang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailTransaksis()
    {
        return $this->hasMany(\App\Models\DetailTransaksi::class);
    }

    public function dataSupplier()
    {
        return $this->belongsTo(\App\Models\DataSupplier::class, 'ID_SUPPLIER');
    }
}
