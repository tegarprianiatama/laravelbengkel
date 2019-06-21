<?php

namespace App\Repositories;

use App\Models\DataMekanik;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataMekanikRepository
 * @package App\Repositories
 * @version March 5, 2019, 10:05 am UTC
 *
 * @method DataMekanik findWithoutFail($id, $columns = ['*'])
 * @method DataMekanik find($id, $columns = ['*'])
 * @method DataMekanik first($columns = ['*'])
*/
class DataMekanikRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA_MEKANIK',
        'ALAMAT',
        'NO_TELP'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataMekanik::class;
    }
}
