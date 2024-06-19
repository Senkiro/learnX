<?php

namespace App\repositories;

use App\Models\Role;
use App\repositories\Interfaces\UserCatalogueRepositoryInterface;



/**
 * Class UserService
 * @package App\Services
 */
class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{
    protected $model;

    public function __construct(Role $model){

        $this->model = $model;
    }

}
