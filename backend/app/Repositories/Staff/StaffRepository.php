<?php
namespace App\Repositories\Staff;

use App\Models\Staff;

class StaffRepository implements StaffRepositoryInterface
{
    public function getAll()
    {
        return Staff::all();
    }

    public function findById($id)
    {
        return Staff::findOrFail($id);
    }

    public function create(array $data)
    {
        return Staff::create($data);
    }

    public function update($id, array $data)
    {
        $staff = Staff::findOrFail($id);
        $staff->update($data);
        return $staff;
    }

    public function delete($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return true;
    }
}
