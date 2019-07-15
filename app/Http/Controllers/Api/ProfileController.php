<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreProfileRequest;
use App\Repositories\ProfileRepository\ProfileRepositoryInterface;
use Illuminate\Http\Request;

/**
 * @group User profile
 *
 * Class ProfileController
 * @package App\Http\Controllers\Api
 */
class ProfileController extends ApiController
{
    /**
     * @var ProfileRepositoryInterface
     */
    private $profileRepository;

    /**
     * ProfileController constructor.
     * @param ProfileRepositoryInterface $profileRepository
     */
    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->middleware('auth:api');
        $this->profileRepository = $profileRepository;
    }

    /**
     * User show own profile
     *
     * @authenticated Bearer {access_token}
     *
     * @response {
     *  "data": {
     *  "id": 2,
     *  "user_id": 21,
     *  "first_name": "jacky",
     *  "last_name": "vu",
     *  "gender": "male",
     *  "address": "Vietnam",
     *  "phone": "1234567",
     *  "creation_date": "2019-07-15 15:45:27",
     *  "last_update": "2019-07-15 15:45:27"
     *  }
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return $this->showOne($request->user()->profile);
    }

    /**
     * Store user profile
     *
     * @authenticated Bearer {access_token}
     *
     * @bodyParam first_name string required The first name of user.
     * @bodyParam last_name string required The last name of user.
     * @bodyParam gender string required The gender of user.
     * @bodyParam address string required The address of user.
     * @bodyParam phone string required The phone of user.
     *
     * @response {
     *  "data": {
     *  "id": 2,
     *  "user_id": 21,
     *  "first_name": "jacky",
     *  "last_name": "vu",
     *  "gender": "male",
     *  "address": "Vietnam",
     *  "phone": "1234567",
     *  "creation_date": "2019-07-15 15:45:27",
     *  "last_update": "2019-07-15 15:45:27"
     *  }
     * }
     *
     * @param StoreProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProfileRequest $request)
    {
        if (!$profile = $this->profileRepository->doSave($request)) {
            return $this->showMessage('User already has profile!');
        }

        return $this->showOne($profile);
    }
}