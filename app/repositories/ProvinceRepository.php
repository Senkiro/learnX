<?php

namespace App\repositories;

use App\Models\Province;
use App\repositories\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;


/**
 * Class UserService
 * @package App\Services
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    protected $model;
    public function __construct(Province $model)
    {
        $this->model = $model;
    }
}
