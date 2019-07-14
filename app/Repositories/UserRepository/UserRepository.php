<?php

namespace App\Repositories\UserRepository;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use App\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    /**
     * @param SignupRequest $request
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function doSave($request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verification_token'] = User::generateVerificationCode();

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

    /**
     * @param $token
     * @return mixed
     */
    public function findVerifiedToken($token)
    {
        return $this->getModel()->where('verification_token', $token)->firstOrFail();
    }

    /**
     * @param $id
     * @param array $data
     * @return bool|mixed|void
     */
    public function update($id,array $data)
    {
        $this->update($id, $data);
    }
}