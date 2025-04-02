<?php

namespace App\Contracts\Repositories;

interface WholsalerRepositoryInterface
{
    /**
     * @param object $request Data value must be in key and value pair structure, ex: params = ['name'=>'John Doe']
     * @param string $model
     * @param int|string $id
     * @return bool
     */
    public function add(array $wholsalerData, int|string $productId): bool;

    /**
     * @param object $request
     * @param string $model
     * @param int|string $id
     * @return bool
     */
    public function update( array $wholsalerData, int|string $productId): bool;

    /**
     * @param string $model
     * @param int|string $id
     * @return bool
     */
    public function delete(object $request): bool;

    /**
     * @param string $model
     * @param string $id
     * @param string $lang
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function updateData(string $model, string $id, string $lang, string $key, string $value):bool;

}
