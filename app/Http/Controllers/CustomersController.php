<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $activeCustomers = Customer::active()->get(); //get my active customer
        $inactiveCustomers = Customer::inActive()->get();//get my inactive customer
        $companies = Company::all();

        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers', 'companies'));

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
            'email' => 'required|email',
            'active' => 'required',
            'company_id'=> 'required'
        ]);
    }
}
