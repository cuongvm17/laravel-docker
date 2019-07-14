<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function doSave($request);

    /**
     * @return mixed
     */
    public function getList();

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);
}