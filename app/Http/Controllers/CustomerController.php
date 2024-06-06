<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller {
    public function index(){
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(CustomerRequest $request){
       
            $customer = new Customer();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->phone_number = $request->phone_number;
            $customer->address = $request->address;
            $customer->save();

            return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function show(string $id) {
        // Método show no implementado
    }

    public function edit(Customer $customer){
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $id) {

            $customer = Customer::find($id);

            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->phone_number = $request->phone_number;
            $customer->address = $request->address;
            $customer->save();

            return redirect()->route('customers.index')->with('successMsg', 'El registro se ha actualizado exitosamente');
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('customers.index')->with('delete', 'ok');
    }

    public function changestatuscustomer(Request $request){
        $customer = Customer::find($request->customer_id);
        $customer->status = $request->status;
        $customer->save();
    }
}
