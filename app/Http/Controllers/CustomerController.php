<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\CustomMessage;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $query = Customer::orderBy('id', 'DESC');
        
        $customers = $query->paginate(5);

        return view('customer.index',compact('customers'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:customers,phone',
            'email' => 'required|email|max:255|unique:customers,email',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ]);
   
        if($validator->fails()){

            return redirect()->back()->withInput()->with('errors',$validator->errors()); 
  
        } else {

            $customer = new Customer();                       
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->street = $request->street;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip_code = $request->zip_code; 
            $customer->save();

            return redirect()->route('customers.index')->with('success','Customer created successfully');	
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:customers,phone,' . $id,
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required'
        ]);
   
        if($validator->fails()){
            
            return redirect()->back()->withInput()->with('errors',$validator->errors()); 
  
        } else {

            $customer = Customer::find($id);
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->street = $request->street;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip_code = $request->zip_code;
            $customer->save();

            return redirect()->route('customers.index')->with('success','Customer updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
      
        return redirect()->route('customers.index')->with('success','Customer deleted successfully');
      
    }   

}
