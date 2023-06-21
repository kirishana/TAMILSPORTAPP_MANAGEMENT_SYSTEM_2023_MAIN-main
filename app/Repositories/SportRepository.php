<?php

namespace App\Repositories;

use App\Models\Sport;
use InfyOm\Generator\Common\BaseRepository;

class SportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sport::class;
    }
}
