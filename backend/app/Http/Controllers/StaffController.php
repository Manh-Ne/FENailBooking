<?php

namespace App\Http\Controllers;

use App\Repositories\Staff\StaffRepositoryInterface;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    protected $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function index()
    {
        return response()->json($this->staffRepository->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        return response()->json($this->staffRepository->create($validated), 201);
    }

    public function show($id)
    {
        return response()->json($this->staffRepository->findById($id));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:staff,email,' . $id,
            'phone' => 'sometimes|required|string|max:15',
            'address' => 'nullable|string|max:255',
            'position' => 'sometimes|required|string|max:255',
        ]);

        return response()->json($this->staffRepository->update($id, $validated));
    }

    public function destroy($id)
    {
        $this->staffRepository->delete($id);
        return response()->json(null, 204);
    }
}
