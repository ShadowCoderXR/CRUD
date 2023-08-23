<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            return view('products.index' , compact('products'));
        } catch (\Exception $exception) {
            Log::error('Error al obtener los productos' . $exception->getMessage());
            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
    }

    public function create()
    {
        return view('products.create');
    }
    
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($request->all());
            if(!$product->exists){
                throw new \Exception('Error al crear el producto');
            }
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error al crear el producto' . $exception->getMessage());
            return redirect()->back()->with('error', 'Error al crear el producto');
        }
    }

    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('products.show', compact('product'));
        } catch (\Exception $exception) {
            Log::error('Error al obtener los productos' . $exception->getMessage());
            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
    }

    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('products.edit', compact('product'));
        } catch (\Exception $exception) {
            Log::error('Error al obtener los productos' . $exception->getMessage());
            return redirect()->back()->with('error', 'Error al obtener los productos');
        }
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($id)->update($request->all());
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error al actualizar el producto' . $exception->getMessage());
            return redirect()->back()->with('error', 'Error al actualizar el producto');
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Producto eliminado correctamente');
        } catch (\Exception $exception) {
            Log::error('Error al eliminar el producto' . $exception->getMessage());
            return redirect()->back()->with('error', 'Error al eliminar el producto');
        }
    }
}
