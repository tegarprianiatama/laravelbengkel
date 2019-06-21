<?php

namespace App\Repositories;

use App\Models\LaporanPembelianBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LaporanPembelianBarangRepository
 * @package App\Repositories
 * @version April 23, 2019, 3:09 am UTC
 *
 * @method LaporanPembelianBarang findWithoutFail($id, $columns = ['*'])
 * @method LaporanPembelianBarang find($id, $columns = ['*'])
 * @method LaporanPembelianBarang first($columns = ['*'])
*/
class LaporanPembelianBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'MULAI_TANGGAL',
        'SAMPAI_TANGGAL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LaporanPembelianBarang::class;
    }
}
