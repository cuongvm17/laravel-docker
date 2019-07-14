<?php

namespace App\Repositories\ProfileRepository;

use App\Models\Profile;
use App\Repositories\AbstractBaseRepository;

class ProfileRepository extends AbstractBaseRepository implements ProfileRepositoryInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Profile::class;
    }
}