<?php

namespace App\Repositories;

use App\Models\DataKasir;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataKasirRepository
 * @package App\Repositories
 * @version March 5, 2019, 10:00 am UTC
 *
 * @method DataKasir findWithoutFail($id, $columns = ['*'])
 * @method DataKasir find($id, $columns = ['*'])
 * @method DataKasir first($columns = ['*'])
*/
class DataKasirRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA_KASIR',
        'EMAIL',
        'PASSWORD',
        'LEVEL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataKasir::class;
    }
}
