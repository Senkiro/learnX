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
}
