<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\CustomMessage;
use App\Models\Customer;

class CustomerController extends Controller
{
    use CustomMessage;
   
    public $successStatusCode = 200; ////Success status code
    public $failureStatusCode = 400; //failure status code
    public $successStatus = 'true'; //success
    public $failureStatus = 'false'; //failure

     
    public function index()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        if($customers->count() > 0) {
            
            $response = $customers->map(function ($item, $key) {
                $data['id'] = $item['id'];
                $data['first_name'] = $item['first_name'];
                $data['last_name'] = $item['last_name'];
                $data['phone'] = $item['phone'];
                $data['email'] = $item['email'];
                $data['street'] = $item['street'];
                $data['state'] = $item['state'];
                $data['city'] = $item['city'];
                $data['zip_code'] = $item['zip_code'];
                return $data;
            });

            return response()->json(['success' => $this->successStatus, 'message' => $this->printCustomerDetails(), 'data' => $response ], $this->successStatusCode );

        } else {

            return response()->json(['success' => $this->failureStatus, 'message' => $this->printCustomerNotFound(), 'data' => '' ], $this->failureStatusCode );
        }
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
            $errors = $validator->messages()->toArray();
           
            // If validation falis redirect back to login.
            return response()->json(['SuccessMsg' => $this->failureStatus, 'DisplayMsg' => $errors], $this->failureStatusCode );
  
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
        
           // if($this->save($request, $customer)){
            if($customer->save()){   
           
                return response()->json(['success' => $this->successStatus, 'message' => $this->printCustomerRegisterSuccess() ], $this->successStatusCode );

            } else {

                return response()->json(['success' => $this->failureStatus, 'message' => $this->printCustomerRegisterFailure() ], $this->failureStatusCode );

            }
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::find($id);
         
        if(!empty($customers)) {
            
            return response()->json(['success' => $this->successStatus, 'message' => $this->printShowRecords(), 'data' => $customers ], $this->successStatusCode );

        } else {

            return response()->json(['success' => $this->failureStatus, 'message' => $this->printCustomerNotFound(), 'data' => '' ], $this->failureStatusCode );

        }
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
            $errors = $validator->messages()->toArray();
          
            // If validation falis redirect back to login.
            return response()->json(['SuccessMsg' => $this->failureStatus, 'DisplayMsg' => $errors], $this->failureStatusCode );
  
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
                       
           // if($this->save($request, $customer)){
           if($customer->save()){

                return response()->json(['success' => $this->successStatus, 'message' => $this->printCustomerUpdateSuccess() ], $this->successStatusCode );

            } else {

                return response()->json(['success' => $this->failureStatus, 'message' => $this->printCustomerUpdateFailure() ], $this->failureStatusCode );

            }
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
         
        if(!empty($customer)) {
            
            $customer->delete();
            return response()->json(['success' => $this->successStatus, 'message' => $this->printCustomerDeleteSuccess() ], $this->successStatusCode );

        } else {

            return response()->json(['success' => $this->failureStatus, 'message' => $this->printCustomerDeleteFailure() ], $this->failureStatusCode );

        }       
      
    }

    private function save(Request $request, Customer $customer)
    {
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->street = $request->street;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->zip_code = $request->zip_code; 
        $customer->save();           
    }

}
