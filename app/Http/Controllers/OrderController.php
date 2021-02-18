<?php

namespace App\Http\Controllers;

use App\Contact;
use App\LineItem;
use App\Notifications\OrderCreated;
use App\Notifications\RemindStaffToProcessOrders;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {

        $orders = app(Pipeline::class)
            ->send(Order::query())
            ->through([
                \App\QueryFilters\OrderTotal::class,
                \App\QueryFilters\NumberOfItems::class,
            ])
            ->thenReturn()
            ->get();



        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $order = new Order();
        $order_number = $order->generateOrderNumber();
        $contacts = Contact::all();

        return view('orders.create', compact('order', 'order_number', 'contacts'));
    }

    public function store(Request $request)
    {

        // Create the order
        $order = new Order();
        $order->order_number = $request->order_number;
        $order->contact_id = $request->contact_id;
        $order->total_products = count($request->lineItems);
        $order->save();
        $id = $order->id;


        // Array to store price of each product
        $arr_orderTotal = [];

        // Foreach line item create a line item model
        foreach($request->lineItems as $item)
        {
            // Add item's price to order total array
            $arr_orderTotal[] = $item['price'];

            $lineItem = new LineItem();
            $lineItem->order_id = $id;
            $lineItem->product = $item['product'];
            $lineItem->price = $item['price'];
            $lineItem->save();
        }

        // Add all the price of the items together
        $order_total = array_sum($arr_orderTotal);

        // Create the order
        $order = Order::find($id);
        $order->order_total = $order_total;
        $order->save();

        // Send new order email notfication, I used mailtrap.io to test this
        //Notification::route('mail', 'info@pretendcompany.com')
          //      ->notify(new OrderCreated($order));

        /**
         * Send on demand notification to all users
         * 30 minutes after order has been created
         *
         */

        $delay = now()->addMinutes(30);

        Notification::send(User::all(), new RemindStaffToProcessOrders($order))->delay($delay);

        return redirect()->back()->with('alert', 'Order created!');
    }
}
