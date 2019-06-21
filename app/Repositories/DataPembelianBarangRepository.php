<?php

namespace App\Repositories;

use App\Models\DataPembelianBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataPembelianBarangRepository
 * @package App\Repositories
 * @version March 14, 2019, 2:34 pm UTC
 *
 * @method DataPembelianBarang findWithoutFail($id, $columns = ['*'])
 * @method DataPembelianBarang find($id, $columns = ['*'])
 * @method DataPembelianBarang first($columns = ['*'])
*/
class DataPembelianBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_SUPPLIER',
        'TGL_PEMBELIAN',
        'KETERANGAN',
        'ID_BARANG',
        'QTY',
        'HARGA_MODAL',
        'TOTAL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataPembelianBarang::class;
    }
}
