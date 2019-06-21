<?php

namespace App\Repositories;

use App\Models\DataPenjualanBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataPenjualanBarangRepository
 * @package App\Repositories
 * @version March 14, 2019, 2:35 pm UTC
 *
 * @method DataPenjualanBarang findWithoutFail($id, $columns = ['*'])
 * @method DataPenjualanBarang find($id, $columns = ['*'])
 * @method DataPenjualanBarang first($columns = ['*'])
*/
class DataPenjualanBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_KASIR',
        'ID_PELANGGAN',
        'TGL_PENJUALAN',
        'KETERANGAN',
        'ID_BARANG',
        'QTY',
        'HARGA_JUAL',
        'TOTAL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataPenjualanBarang::class;
    }
}
