<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'packages';
    protected $fillable = [
        'name',
        'price',
        'max_days',
        'max_users',
        'is_download',
        'is_4k'
    ];
}
