<?php

namespace App\Http\Controllers;

use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        return response()->json($this->serviceRepository->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        return response()->json($this->serviceRepository->create($validated), 201);
    }

    public function show($id)
    {
        return response()->json($this->serviceRepository->findById($id));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'duration' => 'sometimes|required|integer|min:1',
        ]);

        return response()->json($this->serviceRepository->update($id, $validated));
    }

    public function destroy($id)
    {
        $this->serviceRepository->delete($id);
        return response()->json(null, 204);
    }
}