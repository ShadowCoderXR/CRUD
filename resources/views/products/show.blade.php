<x-layouts.master-layout>
<div class="card-header">{{ $product->name }}</div>

<div class="card-body">
    <h5 class="card-title">{{ __('Precio') }}: ${{ $product->price }}</h5>
    <p class="card-text">{{ __('Cantidad disponible') }}: {{ $product->quantity }}</p>
    <p class="card-text">{{ __('Descripción') }}: {{ $product->description }}</p>
</div>   
</x-layouts.master-layout>