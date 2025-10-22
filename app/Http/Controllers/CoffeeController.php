<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;

class CoffeeController extends Controller
{
    // ☕ Get all coffee items
    public function index()
    {
        $coffees = Coffee::all();

        return response()->json([
            'success' => true,
            'data' => $coffees
        ]);
    }

    // ➕ Add a new coffee item
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|string',
        ]);

        $coffee = Coffee::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Coffee added successfully',
            'data' => $coffee
        ], 201);
    }

}
