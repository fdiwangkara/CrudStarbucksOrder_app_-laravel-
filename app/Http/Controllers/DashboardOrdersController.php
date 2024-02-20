<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Orders;
use Illuminate\Http\Request;

class DashboardOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(){
        $orders = Orders::latest();

        if(request('search')) {
            $searchTerm = request('search');
            $orders->where(function($query) use ($searchTerm) {
                $query->where('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('beverage', 'like', '%' . $searchTerm . '%');
            });
        }

        return view('/dashboards/orders/all', [
            "title" => "Starbucks",
            "orders" => $orders->paginate(10),
            "payments" => Payments::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create(){
        return view('orders/create', [
            "title" => "Starbucks",
            "payments" => payments::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
   public  function store(Request $request){
        $validateData = $request -> validate(
            [
               'beverage' => 'required|max:255',
            'payments_id' => 'required',
            'total' => 'required|max:255',
            'order_date' => 'required',
            'buyer' => 'required',
            'address' => 'required',
            ]);

        $result = Orders::create($validateData);
        if ($result){
            return redirect()->route('orders.all')->with('success','Orders Placed!');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show($orders){
        return view('orders/detail',[
                "title" => "Starbucks",
                "orders" => Orders::find($orders)
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders){
        return view('orders/edit',[
            "title" => "Starbucks",
            "orders" => $orders,
            "payments" => Payments::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Orders $orders){
        $validateData = $request -> validate(
            [
                'beverage' => 'required|max:255',
            'payments_id' => 'required',
            'total' => 'required|max:255',
            'order_date' => 'required',
            'buyer' => 'required',
            'address' => 'required',
            ]
        );
       $result = Orders::where('id', $orders->id)->update($validateData);

        if ($result) {
            return redirect('/orders/all')->with('success', 'Order Changed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders){
        $result = $orders->delete();

        if($result){
            return redirect()->route('orders.all')->with('success','Order Displaced!');
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
