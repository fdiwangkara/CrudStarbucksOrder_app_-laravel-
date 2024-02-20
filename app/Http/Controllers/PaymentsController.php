<?php

namespace App\Http\Controllers;
use App\Models\Payments;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public static function index() {
        return view('payments.all', [
            "title" => "Starbucks",
            "payments" => Payments::all()
        ]);
    }

    public function create(){
        return view('payments.create', [
            "title" => "Starbucks",
            "payments" => Payments::all()
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $result = Payments::create($validateData);
        if ($result) {
            return redirect('/payments/all')->with('success', 'Payments Added !');
        }
    }

    public function edit(Payments $payments){ 
        return view('payments.edit', [
            "title" => "Starbucks",
            "payments" => $payments,
        ]);
    }

    public function update(Request $request, Payments $payments) {
        $validateData = $request->validate([
            'name' => 'required',
        ]);

        $result = Payments::where('id', $payments->id)->update($validateData);

        if ($result) {
            return redirect('/payments/all')->with('success', 'Payments Changed !');
        }
    }

    public function destroy(Payments $payments)
    {
        $result = Payments::destroy($payments->id);

        if ($result) {
            return redirect('/payments/all')->with('success', 'Payment Displaced !');
        }
    }
}
