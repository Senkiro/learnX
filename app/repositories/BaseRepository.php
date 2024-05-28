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
}
