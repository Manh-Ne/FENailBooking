<?php
namespace App\Repositories\Item;
use App\Models\Item;
class ItemRepository implements ItemRepositoryInterface
{
    public function getAll()
    {
        return Item::all();
    }
    public function findById($id)
    {
        return Item::findOrFail($id);
    }
    public function create(array $data)
    {
        return Item::create($data);
    }
    public function update($id, array $data)
    {
        $item = Item::findOrFail($id);
        $item->update($data);
        return $item;
    }
    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return true;
    }
    
}

