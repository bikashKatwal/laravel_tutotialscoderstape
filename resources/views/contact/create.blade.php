@extends('layouts.app')
@section('title','Contact Us')
@section('content')
    <h1>Contact Us</h1>

    @if(!session()->has('message'))
        <form action="{{route('contact.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid':'' }} " name="name"
                       value="{{ old('name')  }}"/>
            </div>

            <div class="form-group ">
                <label for="Email">Email</label>
                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" name="email"
                       value="{{ old('email') }}"/>
            </div>

            <div class="form-group pb-2 ">
                <label for="message">Message</label>
                <textarea type="text" class="form-control {{ $errors->has('message') ? 'is-invalid':'' }}"
                          name="message"
                          cols="30"
                          rows="10">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    @endif


    @include('utils.error')

@endsection
