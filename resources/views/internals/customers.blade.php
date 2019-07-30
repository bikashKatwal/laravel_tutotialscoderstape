@extends('layout')

@section('title','Customer List')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="customers" method="POST" class="pb-5">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>

                <div class="form-group ">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
                </div>
                <div class="form-group ">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select customer status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>

    @include('utils.error')

    <hr/>


    <div class="row">
        <div class="col-6">
            <h3>Active Customers</h3>
            <ul>
                @foreach($activeCustomers as $activeCustomer)
                    <li> {{$activeCustomer->name}} <span class="text-muted">({{$activeCustomer->email}})</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h3>Inactive Customers</h3>
            <ul>
                @foreach($inactiveCustomers as $inactiveCustomer)
                    <li> {{$inactiveCustomer->name}} <span class="text-muted">({{$inactiveCustomer->email}})</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
