<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPremium extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_premiums';
    protected $fillable = [
        'package_id',
        'user_id',
        'end_of_subscription'
    ];
}
