<?php

namespace App\Services;

use App\Models\Bus;

class BusService
{
    public function store(array $data): Bus
    {
        return Bus::create($data);
    }

    public function update(Bus $bus, array $data): Bus
    {
        $bus->update($data);
        return $bus;
    }
}
