<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $customers = Customer::all();
        return view('internals.customers', [
            'customers' => $customers
        ]);
    }

    public function store()
    {
        Customer::create($this->validateCustomer());
        return back();
    }

    private function validateCustomer()
    {
        return request()->validate([
            'name' => 'required| min:3',
            'email' => 'required|email'
        ]);
    }
}
