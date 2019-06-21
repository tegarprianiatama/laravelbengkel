<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataPenjualanBarang
 * @package App\Models
 * @version March 14, 2019, 2:35 pm UTC
 *
 * @property \App\Models\DataPelanggan dataPelanggan
 * @property \App\Models\DataKasir dataKasir
 * @property \App\Models\DataBarang dataBarang
 * @property \Illuminate\Database\Eloquent\Collection dataPembelianBarang
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property integer ID_KASIR
 * @property integer ID_PELANGGAN
 * @property date TGL_PENJUALAN
 * @property string KETERANGAN
 * @property string TOTAL
 */
class DataPenjualanBarang extends Model
{
    use SoftDeletes;

    public $table = 'data_penjualan_barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_TRANSAKSI_PENJUALAN';

    public $fillable = [
        'ID_KASIR',
        'ID_PELANGGAN',
        'TGL_PENJUALAN',
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
        'ID_TRANSAKSI_PENJUALAN' => 'integer',
        'ID_KASIR' => 'integer',
        'ID_PELANGGAN' => 'integer',
        'TGL_PENJUALAN' => 'date',
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
        'KETERANGAN' => 'required',
        'TGL_PENJUALAN' => 'required'
    ];

    public function setTglPenjualanAttribute($data){
        $this->attributes['TGL_PENJUALAN'] = \Carbon\Carbon::createFromFormat('m/d/Y', $data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataPelanggan()
    {
        return $this->belongsTo(\App\Models\DataPelanggan::class, 'ID_PELANGGAN');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataKasir()
    {
        return $this->belongsTo(\App\Models\DataKasir::class, 'ID_KASIR');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function dataBarangs()
    {
        return $this->belongsToMany(\App\Models\DataBarang::class, 'ID_BARANG');
    }

        public function detailPenjualanBarang()
    {
        return $this->hasMany(\App\Models\Detail_Penjualan_Barang::class, 'ID_TRANSAKSI_PENJUALAN');
    }
        public function laporanPenjualanBarang()
    {
        return $this->belongsTo(App\Models\LaporanPenjualanBarang::class);
    }
}
