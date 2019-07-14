<?php

namespace App\Repositories\ProfileRepository;

use App\Models\Profile;
use App\Repositories\AbstractRepository;

class ProfileRepository extends AbstractRepository implements ProfileRepositoryInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return Profile::class;
    }

    public function doSave($request)
    {
        // TODO: Implement doSave() method.
    }

    public function getList()
    {
        // TODO: Implement getList() method.
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }
}