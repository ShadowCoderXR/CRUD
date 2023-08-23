<x-layouts.master-layout title="Editar producto">
    <x-form-product :item="$product" method="PUT" route="{{route('products.update', $product->id)}}" title="Editar producto" button="Actualizar"/>
</x-layouts.master-layout>