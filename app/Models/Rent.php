<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id', 'user_id', 'rent_date', 'return_date', 'returned'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function car() {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
