<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index()
    {
        $customer = Customer::orderBy('created_at', 'DESC')->get();
 
        return view('customers.index', compact('customer'));
    }
 
    /**
     * Show the form for creating a new customers.
     */
    public function create()
    {
        return view('customers.create');
    }
 
    /**
     * Store a newly created customers in storage.
     */
    public function store(Request $request)
    {
        Customer::create($request->all());
 
        return redirect()->route('owner/customers')->with('success', 'Customer added successfully');
    }
 
    /**
     * Display the specified customers.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
 
        return view('customers.show', compact('customer'));
    }
 
    /**
     * Show the form for editing the specified customers.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
 
        return view('customers.edit', compact('customer'));
    }
 
    /**
     * Update the specified customers in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);
 
        $customer->update($request->all());
 
        return redirect()->route('manager/customers')->with('success', 'Customer updated successfully');
    }
 
    /**
     * Remove the specified customers from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
 
        $customer->delete();
 
        return redirect()->route('manager/customers')->with('success', 'Customer deleted successfully');
    }
}
