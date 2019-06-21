<?php

namespace App\Repositories;

use App\Models\LaporanJasaServis;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LaporanJasaServisRepository
 * @package App\Repositories
 * @version April 23, 2019, 3:12 am UTC
 *
 * @method LaporanJasaServis findWithoutFail($id, $columns = ['*'])
 * @method LaporanJasaServis find($id, $columns = ['*'])
 * @method LaporanJasaServis first($columns = ['*'])
*/
class LaporanJasaServisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'MULAI_TANGGAL',
        'SAMPAI_TANGGAL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LaporanJasaServis::class;
    }
}
