<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function profilepage()
    {
        return view('profile');
    }
}
