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

    /**
     * @param $request
     * @return bool|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function doSave($request)
    {
        $user = $request->user();
        if (!is_null($user->profile)) {
            return false;
        }
        $data = $request->all();
        $data['user_id'] = $user->id;

        return $this->create($data);
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