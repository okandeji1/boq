<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(10);
        return view('product.vendor')->with('vendors', $vendors);
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
        // Validate form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
        
        // Form data
        $data = $request->only(['name', 'email', 'phone']);
        // Check if user already exit
        if(Vendor::where('name', '=', $data['name'])->exists()){
            return back()->with('error', ' This vendor already exist!');
        }else {
            // Store Vendor
        $vendor = new Vendor();
        $vendor->uuid = Uuid::uuid4();
        $vendor->name = $data['name'];
        $vendor->email = $data['email'];
        $vendor->phone = $data['phone'];
        $vendor->save();
        
        return back()->with('success', 'New Vendor Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
