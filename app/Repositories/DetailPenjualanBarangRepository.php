<?php

namespace App\Repositories;

use App\Models\DetailPenjualanBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailPenjualanBarangRepository
 * @package App\Repositories
 * @version March 5, 2019, 10:37 am UTC
 *
 * @method DetailPenjualanBarang findWithoutFail($id, $columns = ['*'])
 * @method DetailPenjualanBarang find($id, $columns = ['*'])
 * @method DetailPenjualanBarang first($columns = ['*'])
*/
class DetailPenjualanBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_BARANG',
        'ID_TRANSAKSI_PENJUALAN'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailPenjualanBarang::class;
    }
}
