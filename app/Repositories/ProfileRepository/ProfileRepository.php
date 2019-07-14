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

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed
     */
    public function getList()
    {
        return $this->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->find($id);
    }
}