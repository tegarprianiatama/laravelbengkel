<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class KategoriMotor
 * @package App\Models
 * @version May 14, 2019, 6:33 am UTC
 *
 * @property string NAMA
 * @property string KETERANGAN
 */
class KategoriMotor extends Model
{
    use SoftDeletes;

    public $table = 'kategori_motors';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'NAMA',
        'KETERANGAN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'NAMA' => 'string',
        'KETERANGAN' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NAMA' => 'required',
        'KETERANGAN' => 'required'
    ];

    public function dataMotorPelanggans()
    {
        return $this->hasMany(\App\Models\DataMotorPelanggan::class);
    }
}
