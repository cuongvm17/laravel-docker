<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreProfileRequest;
use App\Repositories\ProfileRepository\ProfileRepositoryInterface;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return $this->showOne($request->user()->profile);
    }

    /**
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