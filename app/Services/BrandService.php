<?php

namespace App\Services;

use App\Models\Brand;

class BrandService
{
    public function store(array $data): Brand
    {
        return Brand::create([
            'name' => ucfirst(strtolower($data['name']))
        ]);
    }

    public function update(Brand $brand, array $data): Brand
    {
        $brand->update([
            'name' => ucfirst(strtolower($data['name']))
        ]);

        return $brand;
    }
}
