<?php

namespace App\Http\Controllers;

use App\Models\Clothingitem;
use Illuminate\Http\Request;

class ClothingitemController extends Controller
{
    public function index()
    {
        $clothingItems = ClothingItem::all();
        return view('closet', compact('clothingItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/images', $imageName);
        }

        $clothingItem = new ClothingItem([
            'category' => $request->get('category'),
            'name' => $request->get('name'),
            'image_path' => $imagePath,
        ]);

        $clothingItem->save();

        return redirect()->route('closet.index')
            ->with('success', 'Clothing item added successfully.');
    }
}
