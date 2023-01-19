<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function view_checkout(){
        $lines = session()->get('carts');
        return view('checkout', compact('lines',));
    }
}
