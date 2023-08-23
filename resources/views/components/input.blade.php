@props([
    'item' => [],
    'method' => '',
    'route' => '',
    'title' => '',
    'button' => '',       
    ])

<div class="card-header">{{$title}}</div>

<div class="card-body">
    <form method="POST" action="{{$route}}">
        @method('{{action}}')
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $item['name'] ?? ' ')}}" autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $item['price'] ?? ' ')}}">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $item['quantity'] ?? ' ')}}">
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción'</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $item['description'] ?? ' ')}}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{$button}}</button>
    </form>
</div>