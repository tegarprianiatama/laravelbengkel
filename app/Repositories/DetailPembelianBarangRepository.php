<?php

namespace App\Repositories;

use App\Models\DetailPembelianBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailPembelianBarangRepository
 * @package App\Repositories
 * @version March 15, 2019, 5:23 pm UTC
 *
 * @method DetailPembelianBarang findWithoutFail($id, $columns = ['*'])
 * @method DetailPembelianBarang find($id, $columns = ['*'])
 * @method DetailPembelianBarang first($columns = ['*'])
*/
class DetailPembelianBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_DATA_PEMBELIAN_BARANG',
        'QTY',
        'HARGA_MODAL',
        'TOTAL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailPembelianBarang::class;
    }
}
