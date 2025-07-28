<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Http\UploadedFile;

class DriverService
{
    public function store(array $data): Driver
    {
        if (isset($data['image'])) {
            $data['image_path'] = $this->uploadImage($data['image']);
        }

        unset($data['image']);

        return Driver::create($data);
    }

    public function update(Driver $driver, array $data): Driver
    {
        if (isset($data['image'])) {
            $data['image_path'] = $this->uploadImage($data['image']);
        }

        unset($data['image']);

        $driver->update($data);

        return $driver;
    }

    protected function uploadImage(UploadedFile $image): string
    {
        return $image->store('drivers', 'public');
    }
}
