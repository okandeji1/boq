<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Category;
use App\Product;
use App\Vendor;
use App\Customer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Ramsey\Uuid\Uuid;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // passing category, product & vendor to the view
        $categories = Category::all();
        $products = Product::all();
        $vendors = Vendor::all();
        $stocks = Stock::orderBy('created_at', 'desc')->paginate(10);
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/');
        }
        return view('stock.stock_in', compact(['stocks', $stocks, 'categories', $categories, 'products', $products, 'vendors', $vendors]));
    }

    /**
     * Generating Invoice
     */

     /**
      * Order
      */
      public function order()
      {
          // passing category, product & vendor to the view
        $categories = Category::all();
        $products = Product::all();
        $customers = Customer::all();
        $stocks = Stock::orderBy('created_at', 'desc')->paginate(10);
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/');
        }
        return view('stock.order', compact(['stocks', $stocks, 'categories', $categories, 'products', $products, 'customers', $customers]));
      }

     public function invoice()
     {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/');
        }
        return view('stock.invoice');
     }

     /**
      * get product
      */
      public function getProduct(Request $request)
      {
        $this -> validate($request, [
            'product' => 'required',
        ]);
        $data = $request->input('product');
        $selectedProduct = Product::where('name', '=', $data)->firstOrFail();
        if (count($selectedProduct) > 0) {
            return Response::json($selectedProduct);
        } else {
            return Response::json([
                "status" => 404,
                "message" => "No details found. Try to search again with different query"
                ]);
        }
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'product' => 'required',
            'vendor' => 'required',
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'selling' => 'required|numeric',
            'date' => 'required|date',
        ]);
        // Form data
        $data = $request->only(['category', 'product', 'vendor', 'quantity', 'cost', 'selling', 'date', 'note']);
        // Get category
        $category = Category::where('name', '=', $data['category'])->firstOrFail();
        $category_id = $category->id;
        
        // Get product
        $product = Product::where('name', '=', $data['product'])->firstOrFail();
        $product_id = $product->id;
        
        // Get vendor
        $vendor = Vendor::where('name', '=', $data['vendor'])->firstOrFail();
        $vendor_id = $vendor->id;
        
        // Create Stock
        $stock = new Stock();
        $stock->uuid = Uuid::uuid4();
        $stock->category_id = $category_id;
        $stock->product_id = $product_id;
        $stock->vendor_id = $vendor_id;
        $stock->quantity = $data['quantity'];
        $stock->cost = $data['cost'];
        $stock->selling = $data['selling'];
        $stock->date = $data['date'];
        $stock->note = $data['note'];
        $stock->save();

        return back()->with('success', 'New Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
