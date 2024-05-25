<?php

namespace App\repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface DistrictRepositoryInterface
{
    public function getAll();
    public function findDistrictByProvince(int $province_id);
}
