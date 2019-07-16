<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\UserRepository\UserRepositoryInterface;

/**
 * @group Account resource
 *
 * Allow client can get list or specific account information.
 *
 * Authenticate:
 *
 * headers x-api-key: {key}
 *
 * Bearer: {access_token}
 *
 * Class UserResourceController
 * @package App\Http\Controllers\Api
 */
class UserResourceController extends ApiController
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * AuthController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('user.resource');
        $this->middleware('client.credentials');
        $this->userRepository = $userRepository;
    }

    /**
     * Get list accounts
     *
     * @authenticated
     *
     * @response {
     *  "data": [
     *   {
     *   "id": 19,
     *   "email": "jacky@gmail.com",
     *   "verified": "0",
     *   "verification_token": "ryB38UaLBVrRYYBvk9uD63NOiFSTwzCraPr3dEhO",
     *   "creation_date": "2019-07-14 14:41:36",
     *   "last_update": "2019-07-14 14:41:36"
     *   },
     *   {
     *   "id": 20,
     *   "email": "jacky+1@gmail.com",
     *   "verified": "0",
     *   "verification_token": "lrRQnIG1f8HEPzwtoVmBtGRi3sajHQZQimxv4BJp",
     *   "creation_date": "2019-07-14 16:04:47",
     *   "last_update": "2019-07-14 16:04:47"
     *   }
     * ]
     * }
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll($this->userRepository->getList());
    }

    /**
     * Get specific user
     *
     * @authenticated
     *
     * @respone {
     *  "data": {
     *   "id": 22,
     *   "email": "jacky+22@gmail.com",
     *   "verified": "1",
     *   "verification_token": null,
     *   "creation_date": "2019-07-15 17:20:48",
     *   "last_update": "2019-07-15 17:33:09"
     *   }
     * }
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->showOne($this->userRepository->getById($id));
    }
}