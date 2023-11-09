<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street',
        'number',
        'complement',
        'city',
        'country',
        'zipcode',
        'user_id',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
    public function setStreetAttribute($value)
    {
        $this->attributes['street'] = ucfirst(strtolower($value));
    }
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = ucfirst(strtolower($value));
    }
    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = strtoupper($value);
    }
    public function setZipCodeAttribute($value)
    {
        $this->attributes['zipcode'] = str_replace('-', '', $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
