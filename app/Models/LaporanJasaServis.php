<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LaporanJasaServis
 * @package App\Models
 * @version April 23, 2019, 3:12 am UTC
 *
 * @property string MULAI_TANGGAL
 * @property string SAMPAI_TANGGAL
 */
class LaporanJasaServis extends Model
{
    use SoftDeletes;

    public $table = 'laporan_jasa_servis';
    

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
        'MULAI_TANGGAL' => 'required',
        'SAMPAI_TANGGAL' => 'required'
    ];

    public function setMulaiTglAttribute($data){
        $this->attributes['MULAI_TANGGAL'] = \Carbon\Carbon::createFromFormat('m/d/Y', $data);
    }

     public function setSampaiTglAttribute($data){
        $this->attributes['SAMPAI_TANGGAL'] = \Carbon\Carbon::createFromFormat('m/d/Y', $data);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dataJasaServis()
    {
        return $this->belongsTo(\App\Models\DataJasaServis::class, 'ID_JASA_SERVIS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dataTransaksis()
    {
        return $this->belongsTo(\App\Models\DataTransaksi::class, 'ID_DATA_TRANSAKSI');
    }
}
