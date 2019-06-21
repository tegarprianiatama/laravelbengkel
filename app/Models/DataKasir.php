<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class DataKasir
 * @package App\Models
 * @version March 5, 2019, 10:00 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection dataPenjualanBarang
 * @property \Illuminate\Database\Eloquent\Collection dataTransaksi
 * @property \Illuminate\Database\Eloquent\Collection detailPenjualanBarang
 * @property string NAMA_KASIR
 * @property string TEMPAT_LAHIR
 * @property string TANGGAL_LAHIR
 * @property string ALAMAT
 * @property string EMAIL
 * @property string NO_TELP
 * @property string FOTO
 */
class DataKasir extends Model
{
    use SoftDeletes;

    public $table = 'data_kasir';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'ID_KASIR';

    public $fillable = [
        'NAMA_KASIR',
        'ROLE_ID',
        'TEMPAT_LAHIR',
        'TANGGAL_LAHIR',
        'ALAMAT',
        'EMAIL',
        'NO_TELP',
        'FOTO'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ID_KASIR' => 'integer',
        'NAMA_KASIR' => 'string',
        'ROLE_ID' => 'integer',
        'TEMPAT_LAHIR' => 'string',
        'TANGGAL_LAHIR' => 'string',
        'ALAMAT' => 'string',
        'EMAIL' => 'string',
        'NO_TELP' => 'string',
        'FOTO' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA_KASIR' => 'required',
        'ROLE_ID' => 'required',
        'TEMPAT_LAHIR' => 'required',
        'TANGGAL_LAHIR' => 'required',
        'ALAMAT' => 'required',
        'EMAIL' => 'required|min:3|email',
        'NO_TELP' => 'required|between:5,20',
        'FOTO' => 'required'
        // 'FOTO' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function dataPelanggans()
    {
        return $this->belongsToMany(\App\Models\DataPelanggan::class, 'data_penjualan_barang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function dataMotorPelanggans()
    {
        return $this->belongsToMany(\App\Models\DataMotorPelanggan::class, 'data_transaksi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function roles()
    {
        return $this->hasMany(\App\Models\Role::class, 'ROLE_ID');
    }

    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'ROLE_ID');
    }
}
