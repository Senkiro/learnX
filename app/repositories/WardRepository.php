<?php

namespace App\repositories;

use App\Models\User;
use App\Models\Ward;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\repositories\Interfaces\WardRepositoryInterface;


/**
 * Class UserService
 * @package App\Services
 */
class WardRepository implements WardRepositoryInterface
{

    public function getAll()
    {
        return Ward::all();
    }
}
