<?php

namespace App\repositories;
use App\repositories\Interfaces\BaseRepositoryInterface;
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

    public function pagination(
        array $column=['*'],
        array $condition=[],
        array $join=[],
        array $extend = [],
        int $perpage = 20,
        array $relations= []

    ){
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', ''. $condition['keyword'] . '%');
            }

            if(isset($condition['publish']) && ($condition['publish'] != 0)){
                $query->where('publish', $condition['publish']);
            }
            return $query;
        });

        if(isset($relations) && !empty($relations)){
            foreach($relations as $relation){
                $query->withCount($relation);
            }
        }

        if (!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }
    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $payload = [])
    {
        $model =  $this->model->create($payload);
        return $model->fresh();
    }

    public function findById(
        int $modelId,
        array $column = ['*'],
        array $relation = []
    ){
        return $this->model->select($column)->with($relation)->findorFail($modelId);
    }

    public function update(
        int $id = 0,
        array $payload = []
    )
    {
        $model = $this->findById($id);
        if ($model && $model->update($payload)) {
            return $model;
        }
        return false;
    }

    public function updateByWhereIn(String $whereInField = '',array $whereIn = [],array $payload = []){
        return $this->model->whereIn($whereInField,$whereIn)->update($payload);
    }

    public function delete(int $id=0)
    {
        return $this->findById($id)->delete();
    }

    public function forceDelete(int $id=0)
    {
        return $this->findById($id)->forceDelete();
    }
}
