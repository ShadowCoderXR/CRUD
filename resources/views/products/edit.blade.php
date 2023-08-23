<x-layouts.master-layout title="Editar producto">
    <x-input :item="$product" method="PUT" route="{{route('products.update', $product->id)}}" title="Editar producto" button="Actualizar"/>
</x-layouts.master-layout>