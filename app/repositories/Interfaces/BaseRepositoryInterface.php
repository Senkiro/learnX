<?php

namespace App\repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function update(
        int $id,
        array $payload = []
    );
    public function delete(int $id);
    public function pagination(
        array $column=['*'],
        array $condition=[],
        array $join=[],
        int $perpage = 5
    );
}
