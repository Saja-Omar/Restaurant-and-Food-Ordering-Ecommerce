<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'offer',
        'title',
        'sub_title',
        'short_desc',
        'button_link',
        'status',
    ];
}
