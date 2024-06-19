<?php

namespace App\repositories;

use App\Models\Role;
use App\repositories\Interfaces\RoleRepositoryInterface;



/**
 * Class UserService
 * @package App\Services
 */
class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;

    public function __construct(Role $model){

        $this->model = $model;
    }

}
