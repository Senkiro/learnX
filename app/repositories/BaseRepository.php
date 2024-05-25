<?php

namespace App\repositories;

use App\Models\District;
use App\Models\User;
use App\repositories\Interfaces\BaseRepositoryInterface;
use App\repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;


/**
 * Class UserService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
