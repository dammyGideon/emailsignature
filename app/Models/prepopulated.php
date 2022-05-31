<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prepopulated extends Model
{
    use HasFactory;

    protected $fillable =[
        'logo',
        'main_number',
        'link',
        'socials'
    ];
}
