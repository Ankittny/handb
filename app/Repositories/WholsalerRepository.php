<?php

namespace App\Repositories;

use App\Contracts\Repositories\WholsalerRepositoryInterface;
use App\Models\Wholsale;

class WholsalerRepository implements WholsalerRepositoryInterface
{
    public function __construct(
        private readonly Wholsale $wholsaleModel
    ) {
    }

    public function add(array $wholsalerData, int|string $productId): bool
    {
        //dd($wholsalerData);
        // first delete all wholsale data by product id
        $this->wholsaleModel->where('product_id', $productId)->delete();
        // then insert new data
        foreach ($wholsalerData as $data) {
            $wholsale = $this->wholsaleModel->create([
                'product_id'        => $productId,
                'min_qty'           => $data['min_qty'],
                'max_qty'           => $data['max_qty'],
                'wholesale_price'   => currencyConverter(amount: $data['price']),
            ]);

            if (!$wholsale) {
                return false;
            }
        }
        return true;
    }

    public function update(array $wholsalerData, int|string $productId): bool
    {
        $id = $productId;
        $wholsale = Wholsale::find($id);

        if (!$wholsale) {
            return false;
        }

        $data = $request->only([
            'product_id',
            'wholesale_price',
            'wholesale_quantity',
            'created_at',
            'updated_at'
        ]);

        $wholsale->fill($data);
        return $wholsale->save();
    }

    public function updateData(string $model, string $id, string $lang, string $key, string $value): bool
    {
        return $this->wholsaleModel->updateOrInsert(
            [
                'model_type' => $model,
                'model_id' => $id,
                'locale' => $lang,
                'key' => $key
            ],
            [
                'value' => $value
            ]
        );
    }

    public function delete(object $request): bool
    {
        $id = $request->input('id');
        $wholsale = Wholsale::find($id);

        if (!$wholsale) {
            return false;
        }

        return $wholsale->delete();
    }
}

