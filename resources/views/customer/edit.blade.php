@extends('layouts.app')

@section('title')
Customers
@endsection

@section('styles')
    @include('customer.__style')
    <style>
        .alert-success {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
        } 
        </style>
@endsection

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="margin-left: 125px;">Edit Customer <a class="btn btn-danger" href="{{ route('customers.index') }}">Back</a></h3>
            </div>
        </div>
    </div>

    {!! Form::model($customer, ['method' => 'PATCH','files' => true,'class' => 'form-horizontal col-md-10 mx-auto','role' => 'form', 'route' => ['customers.update', $customer->id]]) !!}
    {{ csrf_field() }}    
    
    <div class="row">
        
        @include('customer._form')

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-danger" href="{{ route('customers.index') }}">Cancel</a>
            <button type="submit" class="btn btn-success">Update Customer</button>
        </div>
 
    </div>    
    {!! Form::close() !!}    

     
@endsection

@section('scripts')
    
@endsection