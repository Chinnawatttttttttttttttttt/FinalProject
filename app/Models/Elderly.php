<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elderly extends Model
{
    use HasFactory;

    protected $fillable = [
        'FirstName', 'LastName', 'NickName', 'Birthday', 'Age', 'Address', 'Latitude', 'Longitude', 'Phone'
    ];

}
