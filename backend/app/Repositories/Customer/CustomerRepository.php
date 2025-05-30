<?php
namespace App\Repositories\Customer;
use App\Models\Customer;
class CustomerRepository implements CustomerRepositoryInterface{
    public function getAll()
    {
        return Customer::all();
    }
    public function findById($id)
    {
        return Customer::findOrFail($id);
    }
    public function create(array $data)
    {
        return Customer::create($data);
    }
    public function update($id, array $data)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($data);
        return $customer;
    }
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return true;
    }
}
