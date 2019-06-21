<?php

namespace App\Repositories;

use App\Models\DetailTransaksi;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailTransaksiRepository
 * @package App\Repositories
 * @version March 12, 2019, 2:25 pm UTC
 *
 * @method DetailTransaksi findWithoutFail($id, $columns = ['*'])
 * @method DetailTransaksi find($id, $columns = ['*'])
 * @method DetailTransaksi first($columns = ['*'])
*/
class DetailTransaksiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_DATA_TRANSAKSI',
        'ID_MEKANIK',
        'ID_BARANG',
        'ID_PELANGGAN',
        'ID_JASA_SERVIS',
        'QTY',
        'DISKON',
        'SUB_TOTAL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailTransaksi::class;
    }
}
