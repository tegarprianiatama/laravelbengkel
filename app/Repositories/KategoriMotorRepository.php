<?php

namespace App\Repositories;

use App\Models\KategoriMotor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KategoriMotorRepository
 * @package App\Repositories
 * @version May 14, 2019, 6:33 am UTC
 *
 * @method KategoriMotor findWithoutFail($id, $columns = ['*'])
 * @method KategoriMotor find($id, $columns = ['*'])
 * @method KategoriMotor first($columns = ['*'])
*/
class KategoriMotorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA',
        'KETERANGAN'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return KategoriMotor::class;
    }
}
