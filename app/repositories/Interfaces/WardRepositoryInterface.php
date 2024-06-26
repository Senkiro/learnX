<?php

namespace App\repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface WardRepositoryInterface
{
    public function getAll();
    public function findWardByDistrict(int $district_id);
}
