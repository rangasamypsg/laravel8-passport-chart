@extends('layouts.app')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="margin-left: 125px;">Show Customer <a class="btn btn-danger" href="{{ route('customers.index') }}">Back</a></h3>
            </div>
        </div>
    </div>

    <div class="row col-md-10 mx-auto">      
        <div class="col-sm-6">
            <div class="form-group">
                <label for="first_name">First Name </label>
                {{ Form::text('first_name', $customer->first_name, array('_required','class' => 'form-control','placeholder'=>'Your First Name','readonly' => true)) }}
                @if($errors->has('first_name'))
                <div class="error" style="color:red">{{ $errors->first('first_name') }}</div>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="last_name">Last Name </label>
                {{ Form::text('last_name', $customer->last_name, array('_required','class' => 'form-control','placeholder'=>'Your Last Name','readonly' => true)) }}
                @if($errors->has('last_name'))
                <div class="error" style="color:red">{{ $errors->first('last_name') }}</div>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="email">Email </label>
                {{ Form::text('email', $customer->email, array('_required','class' => 'form-control','placeholder'=>'Your Email','readonly' => true)) }}
                @if($errors->has('email'))
                <div class="error" style="color:red">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>        
        <div class="col-sm-6">
            <div class="form-group">
                <label for="phone">Phone Number </label>
                {{ Form::text('phone', $customer->phone, array('_required','class' => 'form-control','placeholder'=>'Your Phone Number', 'onKeyUp' => "this.value=this.value.replace(/[^0-9,\.]/g,'');",'readonly' => true)) }}
                @if($errors->has('phone'))
                <div class="error" style="color:red">{{ $errors->first('phone') }}</div>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="street">Street </label>
                {{ Form::text('street', $customer->street, array('_required','class' => 'form-control','placeholder'=>'Your Street','readonly' => true)) }}
                @if($errors->has('street'))
                <div class="error" style="color:red">{{ $errors->first('street') }}</div>
                @endif
            </div>
        </div>
    
        <div class="col-sm-6">
            <div class="form-group">
                <label for="city">City </label>
                {{ Form::text('city', $customer->city, array('_required','class' => 'form-control','placeholder'=>'Your City','readonly' => true)) }}
                @if($errors->has('city'))
                <div class="error" style="color:red">{{ $errors->first('city') }}</div>
                @endif
            </div>
        </div>
    
        <div class="col-sm-6">
            <div class="form-group">
                <label for="state">State </label>
                {{ Form::text('state', $customer->state, array('_required','class' => 'form-control','placeholder'=>'Your State','readonly' => true)) }}
                @if($errors->has('state'))
                <div class="error" style="color:red">{{ $errors->first('state') }}</div>
                @endif
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip_code">Zip code </label>
                {{ Form::text('zip_code', $customer->zip_code, array('_required','class' => 'form-control','placeholder'=>'Your Zip code', 'onKeyUp' => "this.value=this.value.replace(/[^0-9,\.]/g,'');",'readonly' => true)) }}
                @if($errors->has('zip_code'))
                <div class="error" style="color:red">{{ $errors->first('zip_code') }}</div>
                @endif
            </div>
        </div>
        
    </div>    
     
@endsection
