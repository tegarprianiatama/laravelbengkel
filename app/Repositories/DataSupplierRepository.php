<?php

namespace App\Repositories;

use App\Models\DataSupplier;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataSupplierRepository
 * @package App\Repositories
 * @version March 5, 2019, 10:42 am UTC
 *
 * @method DataSupplier findWithoutFail($id, $columns = ['*'])
 * @method DataSupplier find($id, $columns = ['*'])
 * @method DataSupplier first($columns = ['*'])
*/
class DataSupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA_SUPPLIER',
        'ALAMAT_SUPPLIER',
        'CABANG_SUPPLIER',
        'NO_TELP_SUPPLIER'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataSupplier::class;
    }
}
