<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Notifications\OrderCreated;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $order = new Order;
        $contacts = Contact::all();

        return view('orders.create', compact('order', 'contacts'));
    }

    public function store(Request $request)
    {

        $order = new Order();
        $order->order_number = $order->generateOrderNumber();
        $order->contact_id = $request->contact_id;
        $order->product = $request->product;
        $order->save();

        Notification::route('mail', 'info@pretendcompany.com')
                ->notify(new OrderCreated($order));

        return redirect()->back()->with('alert', 'Order created!');
    }
}
