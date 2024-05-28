<?php

namespace App\repositories;

use App\Models\District;
use App\Models\User;
use App\Models\Ward;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\repositories\Interfaces\WardRepositoryInterface;


/**
 * Class UserService
 * @package App\Services
 */
class WardRepository extends BaseRepository implements WardRepositoryInterface
{

    public function __construct(District $model){

        $this->model = $model;
    }

    public function findWardByDistrict(int $district_id = 0)
    {
        return $this->model->where('district_code','=', $district_id)->get();
    }
}
