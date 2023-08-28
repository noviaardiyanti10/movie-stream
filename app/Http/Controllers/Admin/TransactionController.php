<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){

        $data = Transaction::with([
            'package',
            'user'
        ])->get();

        return view('admin.transaction.index', ['data' => $data]);
    }
}
