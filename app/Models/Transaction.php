<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transactions';
    protected $fillable = [
        'package_id',
        'user_id',
        'amount',
        'trasaction_code',
        'status'
    ];
}
