<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

/**
 * Die Klasse PersonController
 */
class ProductController extends Controller
{
	/**
	 * Holt alle Product-Objekte
	 *
	 * return ProductList
	 */
    public function index()
    {
        return Product::all();
    }
 
 	/**
	 * Holt ein Product-Objekt Anhand des ID
	 *
	 * return Product
	 */
    public function show($id)
    {
        return Product::find($id);
    }

	/**
	 * Speichert ein Product-Objekt
	 *
	 * return json
	 */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        
        return response()->json($product, 201);
    }

	/**
	 * Bearbeitet ein Product-Objekt
	 *
	 * return json
	 */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

	/**
	 * Löscht ein Product-Objekt
	 *
	 * return 204
	 */
    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
