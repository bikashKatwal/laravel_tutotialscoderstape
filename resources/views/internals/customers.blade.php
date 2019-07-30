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

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>

    @include('utils.error')

    <hr/>


    <div class="row">
        <div class="col-12">
            <ul>
                @foreach($customers as $customer)
                    <li> {{$customer->name}} <span class="text-muted">({{$customer->email}})</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
