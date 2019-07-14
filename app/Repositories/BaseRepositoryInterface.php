<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Get all record
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Find by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}