<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\CreateProfileRequest;
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

    public function create(CreateProfileRequest $request)
    {
        return true;
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