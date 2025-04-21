<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Customer\CustomerRepositoryInterface;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $customerRepository;
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function index()
    {
        return response()->json($this->customerRepository->getAll());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'age'=>'required|integer|min:0',
            'gender'=>'required|in:Nam,Nữ',
            'address'=>'required|string|max:255',
            'appointment'=>'nullable|date',
        ]);
        return response()->json($this->customerRepository->create($validated), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->customerRepository->findById($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'=>'sometimes|required|string|max:255',
            'age'=>'sometimes|required|integer|min:0',
            'gender'=>'sometimes|required|in:Nam,Nữ',
            'address'=>'sometimes|required|string|max:255',
            'appointment'=>'sometimes|nullable|date',
        ]);
        return response()->json($this->customerRepository->update($id, $validated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->customerRepository->delete($id);
        return response()->json(null, 204);
    }
}
