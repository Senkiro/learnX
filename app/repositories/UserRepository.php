<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;


/**
 * Class UserService
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model){

        $this->model = $model;
    }

    public function getAllPaginate()
    {
        return User::paginate(5) ;
    }

    public function pagination(
        array $column=['users.*'],
        array $condition=[],
        array $join=[],
        array $extend = [],
        int $perpage = 20,
        array $relation = []
    ){
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where(function($query) use ($condition) {
                    $query->where('users.name', 'LIKE', '%' . $condition['keyword'] . '%')
                        ->orWhere('users.email', 'LIKE', '%' . $condition['keyword'] . '%')
                        ->orWhere('users.phone', 'LIKE', '%' . $condition['keyword'] . '%')
                        ->orWhere('users.address', 'LIKE', '%' . $condition['keyword'] . '%');
                });
            }

            if (isset($condition['publish']) && $condition['publish'] != 0) {
                $query->where('users.publish', '=', $condition['publish']);
            }

            if (isset($condition['role_id']) && $condition['role_id'] != 0) {
                $query->where('users.role_id', '=', $condition['role_id']);
            }

            return $query;
        })->with($relation);

        if (!empty($join)) {
            $query->join(...$join);
        }

        $pagination = $query->paginate($perpage)->withQueryString();

        if (isset($extend['path'])) {
            $pagination->withPath(env('APP_URL') . $extend['path']);
        }

        return $pagination;
    }



}
