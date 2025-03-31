<?php

namespace App\Http\Controllers;
use App\Repositories\Item\ItemRepositoryInterface;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    protected $itemRepository;
    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    public function index()
    {
        return response()->json($this->itemRepository->getAll());
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
        return response()->json($this->itemRepository->create($validated), 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->itemRepository->findById($id));
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
        return response()->json($this->itemRepository->update($id, $validated));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->itemRepository->delete($id);
        return response()->json_decode(null, 204);
    }
}
