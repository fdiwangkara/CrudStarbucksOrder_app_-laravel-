<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Orders;
use Illuminate\Http\Request;

class DashboardPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboards.payments.all',[
                "title" => "Starbucks",
                "payments" => Payments::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payments/create', [
            "title" => "Starbucks"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $validateData = $request -> validate(
            [
                'name' => 'required',
            ]);
        $result = Payments::create($validateData);
        if ($result){
            return redirect()->route('payments.all')->with('success','Order Placed!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Payments $payments)
    {
        return view('payments.edit', [
            "title" => "Starbucks",
            "payments" => $payments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments) {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $result = Payments::where('id', $payments->id)->update($validateData);

        if ($result) {
            return redirect('/payments/all')->with('success', 'Payments Changed !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Payments $payments)
    {
        $result = Payments::destroy($payments->id);

        if ($result) {
            return redirect('/payments/all')->with('success', 'Payment Displaced !');
        }
    }
}
