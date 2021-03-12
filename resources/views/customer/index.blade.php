@extends('layouts.app')

@section('title')
Customers
@endsection

@section('styles')
    <style>
        .msg {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
        } 
    </style>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success col-md-10 mx-auto msg">
            <p style="text-align: center;font-weight: 600;font-size: 18px;">{{ $message }}</p>
        </div>
    @endif
    <div class="row col-md-10 mx-auto" style="margin-bottom: 20px;">
        <div class="col-lg-12">
            <div class="pull-left">
                <h3>Customers</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}">Add customer</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered col-md-10 mx-auto">
        <tr>
            <th>S.no</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>State</th>
            <th>City</th>
            <th width="280px">Actions</th>
        </tr>
        @php $i = 0; @endphp
        @if(count($customers) > 0)
        @foreach ($customers as $customer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $customer->full_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->state }}</td>
                <td>{{ $customer->city }}</td>
                <td>
                    <form class="delete" action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>                        
                        @csrf
                        @method('DELETE')
                        <a onclick="return confirm('Are you sure u want to delete this customer?')" href="{{route('customers.destroy', $customer->id)}}"><button type="submit" class="btn btn-danger">Delete</button></a>
                    </form>
                </td>
            </tr>
        @endforeach
        @else 
            <tr>
                <td colspan="7" style="text-align: center;"> No Record Found</td>
            </tr>    
        @endif
    </table>

    {!! $customers->links() !!}

@endsection

@section('scripts')
@endsection