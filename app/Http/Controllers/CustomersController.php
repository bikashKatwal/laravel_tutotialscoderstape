<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except(['index']);
        //$this->middleware('auth')->only(['index']);
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('companies','customer'));
    }

    public function store()
    {
        $customer=Customer::create($this->validateCustomer());
        //One Event and three listener
        event(new NewCustomerHasRegisteredEvent($customer));

        // Send email to the new user
        //Mail::to($customer->email)->send(new WelcomeNewUserMail());

        //Register to news letter
        //dump("Registered to news letter");

        //Send slack notification
        //dump("Send slack notification");

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));

        //Route::get('customers/{customer}','CustomersController@show');
        //Parameter ($customer)={customer} in this show() function is the same with Route's {customer} following Route-Model binding concept in laravel
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateCustomer());
        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');
    }

    private function validateCustomer()
    {
        return request()->validate([
            'name' => 'required| min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required'
        ]);
    }
}
