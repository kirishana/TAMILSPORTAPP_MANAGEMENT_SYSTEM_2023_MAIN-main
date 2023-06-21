<?php

namespace App\Repositories;

use App\Models\UserPermission;
use InfyOm\Generator\Common\BaseRepository;

class UserPermissionRepository extends BaseRepository
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
        return UserPermission::class;
    }
}
