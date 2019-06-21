<?php

namespace App\Repositories;

use App\Models\Detail_Penjualan_Barang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Detail_Penjualan_BarangRepository
 * @package App\Repositories
 * @version March 5, 2019, 10:37 am UTC
 *
 * @method Detail_Penjualan_Barang findWithoutFail($id, $columns = ['*'])
 * @method Detail_Penjualan_Barang find($id, $columns = ['*'])
 * @method Detail_Penjualan_Barang first($columns = ['*'])
*/
class Detail_Penjualan_BarangRepository extends BaseRepository
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
        return Detail_Penjualan_Barang::class;
    }
}
