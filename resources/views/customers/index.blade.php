@extends('layouts.app')

@section('title','Customer List')
@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <p><a href="{{route('customers.create')}}">Add New Customer</a></p>
        </div>
    </div>
    <ul class="list-group">
        @foreach($customers as $customer)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-2">
                        {{ $customer->id }}
                    </div>
                    <div class="col-4">
                        <a href="/customers/{{$customer->id}}">   {{ $customer->name }}</a>
                    </div>
                    <div class="col-4">
                        {{ $customer->company->name }}
                    </div>
                    <div class="col-2">
                        {{ $customer->active }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="row">
        <div class="col-12 d-flex justify-content-center py-2">
            {{ $customers->links() }}
        </div>
    </div>
@endsection
