<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataTransaksi
 * @package App\Models
 * @version March 12, 2019, 2:19 pm UTC
 *
 * @property \App\Models\DataMotorPelanggan dataMotorPelanggan
 * @property \App\Models\DataKasir dataKasir
 * @property \App\Models\DataPelanggan dataPelanggan
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection DetailTransaksi
 * @property integer ID_PELANGGAN
 * @property integer ID_KASIR
 * @property integer ID_MEKANIK
 * @property integer ID_DETAIL_MOTOR
 * @property integer ID_JASA_SERVIS
 * @property date TGL_PENJUALAN
 * @property string KETERANGAN
 * @property string BIAYA_TAMBAHAN
 * @property string TOTAL_DISKON
 * @property string TOTAL
 */
class DataTransaksi extends Model
{
    use SoftDeletes;

    public $table = 'data_transaksi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_DATA_TRANSAKSI';

    public $fillable = [
        'ID_PELANGGAN',
        'ID_KASIR',
        'ID_MEKANIK',
        'ID_DETAIL_MOTOR',
        'ID_JASA_SERVIS',
        'TGL_PENJUALAN',
        'KETERANGAN',
        'BIAYA_TAMBAHAN',
        'TOTAL_DISKON',
        'TOTAL',
        'JUMLAH_BAYAR',
        'TOTAL_BERSIH',
        'KEMBALIAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_DATA_TRANSAKSI' => 'integer',
        'ID_PELANGGAN' => 'integer',
        'ID_KASIR' => 'integer',
        'ID_MEKANIK' => 'integer',
        'ID_DETAIL_MOTOR' => 'integer',
        'ID_JASA_SERVIS' => 'integer',
        'TGL_PENJUALAN' => 'date',
        'KETERANGAN' => 'string',
        'BIAYA_TAMBAHAN' => 'integer',
        'TOTAL_DISKON' => 'string',
        'TOTAL' => 'string',
        'JUMLAH_BAYAR' => 'integer',
        'TOTAL_BERSIH' => 'integer',
        'KEMBALIAN' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'TOTAL' => 'required',
        'JUMLAH_BAYAR' => 'required',
        'KETERANGAN' => 'required'
    ];

    public function setTglPenjualanAttribute($data){
        $this->attributes['TGL_PENJUALAN'] = \Carbon\Carbon::createFromFormat('m/d/Y', $data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataMotorPelanggan()
    {
        return $this->belongsTo(\App\Models\DataMotorPelanggan::class, 'ID_DETAIL_MOTOR');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataKasir()
    {
        return $this->belongsTo(DataKasir::class, 'ID_KASIR', 'ID_KASIR');
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataMekanik()
    {
        return $this->belongsTo(\App\Models\DataMekanik::class, 'ID_MEKANIK');
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
    public function dataJasaServis()
    {
        return $this->belongsTo(\App\Models\DataJasaServis::class, 'ID_JASA_SERVIS');
    }

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  **/
    // public function dataTransaksis()
    // {
    //     return $this->belongsTo(\App\Models\DataTransaksi::class);
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailTransaksis()
    {
        return $this->hasMany(\App\Models\DetailTransaksi::class, 'ID_DATA_TRANSAKSI');
    }      

    public function kasir()
    {
        return $this->belongsTo(DataKasir::class, 'iuo');
    }    
}
