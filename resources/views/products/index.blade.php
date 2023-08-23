<x-layouts.master-layout title="Productos">

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Precio</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cantidad</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripción</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acciones</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $product->price }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $product->quantity }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $product->description }}</p>
                </td>
                <td class="align-middle">
                    <a href="{{ route('products.show', $product->id) }}" class="text-secondary font-weight-bold text-xs">
                        Ver
                    </a>
                    &nbsp; <!-- Espacio en blanco -->
                    <a href="{{ route('products.edit', $product->id) }}" class="text-secondary font-weight-bold text-xs">
                        Editar
                    </a>
                    &nbsp; <!-- Espacio en blanco -->
                </td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-primary font-weight-bold text-xs">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-layouts.master-layout>