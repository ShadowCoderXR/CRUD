<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Product\{
    StoreRequest,
    UpdateRequest
};
use Illuminate\Support\Facades\{
    DB,
    Log
};



class ProductController extends Controller
{

    /**
     * Display a listing of the Product.
     *
     * @return View
     */
    public function index()
    {
        try {
            //Retrieve all Product records from the database and return the view with the data.
            $products = Product::all();

            return view('products.index' , compact('products'));

        } catch (\Exception $exception) {
            //Log error and return redirect with error message.
            Log::error('Error al obtener los productos' . $exception->getMessage());

            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Create new Product on Products table in database.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            //Create a new Product record in the database with the data from the request.
            $product = Product::create($request->all());

            //If the product does not exist, throw an exception.
            if(!$product->exists)
                throw new \Exception('Error al crear el producto');

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Producto creado correctamente');

        } catch (\Exception $exception) {
            DB::rollBack();

            //Log error and return redirect with error message.
            Log::error('Error al crear el producto' . $exception->getMessage());

            return redirect()->back()->with('error', 'Error al crear el producto');
        }
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        try {
            //Retrieve the specified Product by id and return the view with the data.
            $product = Product::findOrFail($id);

            return view('products.show', compact('product'));

        } catch (\Exception $exception) {
            //Log error and return redirect with error message.
            Log::error('Error al obtener los productos' . $exception->getMessage());

            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        try {
            //Retrieve the specified Product by id and return the view with the data.
            $product = Product::findOrFail($id);

            return view('products.edit', compact('product'));

        } catch (\Exception $exception) {
            //Log error and return redirect with error message.
            Log::error('Error al obtener los productos' . $exception->getMessage());

            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
    }

    /**
     * Update the specified Product in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            //Update the specified Product by id with the data from the request.
            Product::find($id)->update($request->all());

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');

        } catch (\Exception $exception) {
            DB::rollBack();

            //Log error and return redirect with error message.
            Log::error('Error al actualizar el producto' . $exception->getMessage());

            return redirect()->back()->with('error', 'Error al actualizar el producto');
        }
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        try {
            //Delete the specified Product by id from the database.
            Product::findOrFail($id)->delete();

            return redirect()->back()->with('success', 'Producto eliminado correctamente');

        } catch (\Exception $exception) {
            //Log error and return redirect with error message.
            Log::error('Error al eliminar el producto' . $exception->getMessage());

            return redirect()->back()->with('error', 'Error al eliminar el producto');
        }
    }
}
