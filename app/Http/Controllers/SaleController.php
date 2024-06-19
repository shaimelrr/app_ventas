<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /**
     * Display a listing of the sales.
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new sale.
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created sale in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return redirect('sales/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    /**
     * Display the specified sale.
     */
    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified sale.
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified sale in storage.
     */
    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('sales.edit', $sale->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    /**
     * Remove the specified sale from storage.
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
