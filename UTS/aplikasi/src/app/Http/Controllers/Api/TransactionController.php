<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Get all transactions
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    // Get a specific transaction by id
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json($transaction);
    }

    // Create a new transaction
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction, 201);
    }

    // Update an existing transaction
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $request->validate([
            'customer_id' => 'sometimes|required|exists:customers,id',
            'date' => 'sometimes|required|date',
            'amount' => 'sometimes|required|numeric',
            'description' => 'sometimes|required|string',
        ]);

        $transaction->update($request->all());

        return response()->json($transaction);
    }

    // Delete a transaction
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}
