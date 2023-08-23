<x-layouts.master-layout title="Productos">

<div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">price</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">quantity</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">description</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
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
                    <a href="{{route('products.show', $product->id)}}" class="text-secondary font-weight-bold text-xs">
                        ver
                    </a>
                </td>
                <td class="align-middle">
                    <a href="{{route('products.edit', $product->id)}}" class="text-secondary font-weight-bold text-xs">
                        Edit
                    </a>
                </td>
                <td class="align-middle">
                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-secondary font-weight-bold text-xs">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layouts.master-layout>