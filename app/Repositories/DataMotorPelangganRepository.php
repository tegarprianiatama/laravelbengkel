<?php

namespace App\Repositories;

use App\Models\DataMotorPelanggan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataMotorPelangganRepository
 * @package App\Repositories
 * @version March 5, 2019, 10:06 am UTC
 *
 * @method DataMotorPelanggan findWithoutFail($id, $columns = ['*'])
 * @method DataMotorPelanggan find($id, $columns = ['*'])
 * @method DataMotorPelanggan first($columns = ['*'])
*/
class DataMotorPelangganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ID_PELANGGAN',
        'NAMA',
        'NO_POL',
        'ISI_SILIDER',
        'KATEGORI'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataMotorPelanggan::class;
    }
}
