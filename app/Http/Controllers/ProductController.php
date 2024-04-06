<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Product;
 
class ProductController extends Controller
{
    /**
     * Display a listing of the medicines.
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
 
        return view('products.index', compact('product'));
    }
 
    /**
     * Show the form for creating a new medicines.
     */
    public function create()
    {
        return view('products.create');
    }
 
    /**
     * Store a newly created medicines in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
 
        return redirect()->route('owner/products')->with('success', 'Medicine added successfully');
    }
 
    /**
     * Display the specified medicines.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('products.show', compact('product'));
    }
 
    /**
     * Show the form for editing the specified medicines.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('products.edit', compact('product'));
    }
 
    /**
     * Update the specified medicines in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->update($request->all());
 
        return redirect()->route('cashier/products')->with('success', 'Medicine updated successfully');
    }
 
    /**
     * Remove the specified medicines from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->delete();
 
        return redirect()->route('cashier/products')->with('success', 'Medicine deleted successfully');
    }
}