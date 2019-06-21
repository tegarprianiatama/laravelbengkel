<?php

namespace App\Repositories;

use App\Models\DataPelanggan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataPelangganRepository
 * @package App\Repositories
 * @version March 5, 2019, 10:09 am UTC
 *
 * @method DataPelanggan findWithoutFail($id, $columns = ['*'])
 * @method DataPelanggan find($id, $columns = ['*'])
 * @method DataPelanggan first($columns = ['*'])
*/
class DataPelangganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA',
        'ALAMAT',
        'NO_TELP'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataPelanggan::class;
    }
}
