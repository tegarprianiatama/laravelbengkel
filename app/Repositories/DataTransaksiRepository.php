<?php

namespace App\Repositories;

use App\Models\DataTransaksi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataTransaksiRepository
 * @package App\Repositories
 * @version March 12, 2019, 2:19 pm UTC
 *
 * @method DataTransaksi findWithoutFail($id, $columns = ['*'])
 * @method DataTransaksi find($id, $columns = ['*'])
 * @method DataTransaksi first($columns = ['*'])
*/
class DataTransaksiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_PELANGGAN',
        'ID_KASIR',
        'ID_DETAIL_MOTOR',
        'TGL_PENJUALAN',
        'KETERANGAN',
        'TOTAL_DISKON',
        'TOTAL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataTransaksi::class;
    }
}
