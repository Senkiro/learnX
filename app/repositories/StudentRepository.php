<?php

namespace App\repositories;

use App\Models\Course;
use App\Repositories\Interfaces\UserRepositoryInterface;


/**
 * Class UserService
 * @package App\Services
 */
class StudentRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(Course $model){

        $this->model = $model;
    }

    public function getAllPaginate()
    {
        return Course::paginate(3) ;
    }

    public function pagination(
        array $column=['*'],
        array $condition=[],
        array $join=[],
        array $extend = [],
        int $perpage = 20,
        array $relation = []

    ){
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('title', 'LIKE', ''. $condition['keyword'] . '%')
                    ->orWhere('description', 'LIKE', ''. $condition['keyword'] . '%');
            }

            if(isset($condition['publish'])  && $condition['publish'] != 0){
                $query->where('publish','=', $condition['publish']);
            }
            return $query;

        })
//            ->with('user_catalogues')
        ;
        if (!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perpage)->withQueryString();
    }

}
