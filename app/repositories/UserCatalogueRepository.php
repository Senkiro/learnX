<?php

namespace App\repositories;

use App\Models\UserCatalogue;
use App\repositories\Interfaces\UserCatalogueRepositoryInterface;



/**
 * Class UserService
 * @package App\Services
 */
class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{
    protected $model;

    public function __construct(UserCatalogue $model){

        $this->model = $model;
    }

}
