<?php

namespace App\repositories;

use App\Models\District;
use App\Models\User;
use App\repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;


/**
 * Class UserService
 * @package App\Services
 */
class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    protected $model;

    public function __construct(District $model){

        $this->model = $model;
    }

    public function findDistrictByProvince(int $province_id=0)
    {
        return $this->model->where('province_code','=', $province_id)->get();
    }
}
