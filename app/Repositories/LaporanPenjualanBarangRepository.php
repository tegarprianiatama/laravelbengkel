<?php

namespace App\Repositories;

use App\Models\LaporanPenjualanBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LaporanPenjualanBarangRepository
 * @package App\Repositories
 * @version April 22, 2019, 8:25 am UTC
 *
 * @method LaporanPenjualanBarang findWithoutFail($id, $columns = ['*'])
 * @method LaporanPenjualanBarang find($id, $columns = ['*'])
 * @method LaporanPenjualanBarang first($columns = ['*'])
*/
class LaporanPenjualanBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tanggal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LaporanPenjualanBarang::class;
    }
}
