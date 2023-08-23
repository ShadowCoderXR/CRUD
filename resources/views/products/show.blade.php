<x-layouts.master-layout title="Ver producto">
<div class="card-header">{{ $product->name }}</div>

<div class="card-body">
    <h5 class="card-title">'Precio: ${{ $product->price }}</h5>
    <p class="card-text">'Cantidad disponible: {{ $product->quantity }}</p>
    <p class="card-text">'Descripción: {{ $product->description }}</p>
</div>   
</x-layouts.master-layout>