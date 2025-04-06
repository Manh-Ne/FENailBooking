<?php

namespace App\Http\Controllers;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $ProductRepository;
    public function __construct(ProductRepositoryInterface $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }
    public function index()
    {
        return response()->json($this->ProductRepository->getAll());
    }
    /**
     * Display a listing of the resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|string|in:service,product',
        ]);
        return response()->json($this->ProductRepository->create($validated), 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->ProductRepository->findById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer|min:1',
            'price' => 'sometimes|required|numeric|min:0',
            'type' => 'sometimes|required|string|in:import,export',
            'time' => 'sometimes|required|date',
        ]);
        return response()->json($this->ProductRepository->update($id, $validated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ProductRepository->delete($id);
        return response()->json_decode(null, 204);
    }
}
