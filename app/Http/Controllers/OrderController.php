<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function invoice(Order $order)
    {
        return view('order.invoice', compact('order'));
    }
}
