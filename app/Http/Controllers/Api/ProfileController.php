<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreProfileRequest;
use App\Repositories\ProfileRepository\ProfileRepositoryInterface;

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
        parent::__construct();
        $this->profileRepository = $profileRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->showAll($this->profileRepository->getList());
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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->showOne($this->profileRepository->getById($id));
    }
}