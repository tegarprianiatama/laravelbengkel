<?php

namespace App\Repositories;

use App\Models\DataBarang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataBarangRepository
 * @package App\Repositories
 * @version March 5, 2019, 9:53 am UTC
 *
 * @method DataBarang findWithoutFail($id, $columns = ['*'])
 * @method DataBarang find($id, $columns = ['*'])
 * @method DataBarang first($columns = ['*'])
*/
class DataBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_DETAIL_PEMBELIAN_BARANG',
        'NAMA_BARANG',
        'STOK',
        'SATUAN',
        'HARGA_MODAL',
        'HARGA_JUAL',
        'JENIS',
        'BIAYA_PEMASANGAN',
        'KETERANGAN'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataBarang::class;
    }
}
