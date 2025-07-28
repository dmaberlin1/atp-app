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

    //Приведение имени к lowercase при сохранении
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }

    //возвращение имени с заглавной буквы
    public function getNameAttribute($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
    }

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
