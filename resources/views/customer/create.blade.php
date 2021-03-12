@extends('layouts.app')

@section('title')
Users
@endsection

@section('styles')
    @include('Customer.__style')
@endsection

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="margin-left: 125px;">Add Customer <a class="btn btn-danger" href="{{ route('customers.index') }}">Back</a></h3>
            </div>
        </div>
    </div>

    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
        @include('Customer._form')
             
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-success">Add Customer</button>
            </div>

        </div>
    </form>          
@endsection

@section('scripts')      
@endsection