<?php

namespace App\Repositories;

use App\Models\DataJasaServis;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataJasaServisRepository
 * @package App\Repositories
 * @version March 5, 2019, 9:57 am UTC
 *
 * @method DataJasaServis findWithoutFail($id, $columns = ['*'])
 * @method DataJasaServis find($id, $columns = ['*'])
 * @method DataJasaServis first($columns = ['*'])
*/
class DataJasaServisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NAMA_JASA',
        'KETERANGAN',
        'HARGA'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataJasaServis::class;
    }
}
