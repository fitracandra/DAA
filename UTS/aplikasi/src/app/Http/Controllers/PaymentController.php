<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('order')->get(); // Load relasi dengan Order
        return PaymentResource::collection($payments); // Mengembalikan data dalam format JSON
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
            'method' => 'required|string',
            'status' => 'required|string',
            'payment_date' => 'required|date',
        ]);

        $payment = Payment::create($request->all());
        return new PaymentResource($payment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return new PaymentResource($payment); // Menampilkan detail pembayaran
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'method' => 'required|string',
            'status' => 'required|string',
            'payment_date' => 'required|date',
        ]);

        $payment->update($request->all());
        return new PaymentResource($payment); // Mengembalikan data pembayaran yang telah diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(null, 204); // Menghapus payment
    }
}
