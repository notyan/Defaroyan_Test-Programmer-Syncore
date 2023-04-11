<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', // Add this line
        'email',
        'address',
        'phone_number'
    ];
}