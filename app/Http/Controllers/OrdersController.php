<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class OrdersController extends Controller
{
    public static function index() {
         return view('orders.all', [
            "title" => "Starbucks",
            "orders" => Orders::paginate(10),
        ]);
    }


    public function show($orders) {
        return view('orders.details', [
            "title" => "Starbucks",
            "orders" => Orders::find($orders)
        ]);
    }

    public function create(){
        return view('orders.create', [
            "title" => "Starbucks",
            "payments" => Payments::all()
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'beverage' => 'required|max:255',
            'payments_id' => 'required',
            'total' => 'required|max:255',
            'order_date' => 'required',
            'buyer' => 'required',
            'address' => 'required',
        ]);

        $result = Orders::create($validateData);
        if ($result) {
            return redirect('/orders/all')->with('success', 'Order Pending !');
        }
    }

    public function edit(Orders $orders) {
        return view('orders.edit', [
            "title" => "Starbucks",
            "orders" => $orders,
            "payments" => Payments::all()
        ]);
    }

    public function update(Request $request, Orders $orders) {
        $validateData = $request->validate([
            'beverage' => 'required|max:255',
            'payments_id' => 'required',
            'total' => 'required|max:255',
            'order_date' => 'required',
            'buyer' => 'required',
            'address' => 'required',
        ]);

        $result = Orders::where('id', $orders->id)->update($validateData);

        if ($result) {
            return redirect('/orders/all')->with('success', 'Order Changed!');
        }
    }

    public function destroy(Orders $orders)
    {
        $result = Orders::destroy($orders->id);

        if ($result) {
            return redirect('/orders/all')->with('success', 'Order Displaced !');
        }
    }

    public function filter($payments_id)
    {
        $result = Orders::where('payments_id', $payments_id)->paginate(10);

        return view('dashboards.orders.all', [
            "title" => "Starbucks",
            "orders" => $result,
            "payments" => Payments::all()
        ]);
    }
}
