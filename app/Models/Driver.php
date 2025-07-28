<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Driver extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'salary',
        'image_path',
        'image_description',
    ];

    protected $appends = ['full_name'];

    public function getFirstNameAttribute($value): string
    {
        return ucfirst($value);
    }

    public function setFirstNameAttribute($value): void
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isRetired(): bool
    {
        return Carbon::parse($this->birth_date)->age >= 65;
    }
}
