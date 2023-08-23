@props([
    'item' => [],
    'parameter' => '',
    'route' => '',
    'title' => '',       
    ])

<div class="card-header">{{$title}}</div>

<div class="card-body">
    <form method="POST" action="{{ $parameter== 'id' ? route($route, ['product' => $item['id']]) : route($route)}}">
        @if ($parameter == 'id')
            @method('PUT')
        @endif
        @csrf

        <div class="form-group">
            <label for="name">{{ __('Nombre') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" @if($parameter== 'id') value="{{ old('name', $item['name'])}}" @endif autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">{{ __('Precio') }}</label>
            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" @if($parameter== 'id') value="{{ old('price', $item['price']) }}" @endif>
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">{{ __('Cantidad') }}</label>
            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" @if($parameter== 'id') value="{{ old('quantity', $item['quantity']) }}" @endif>
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">{{ __('Descripción') }}</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4">@if($parameter== 'id') {{ old('description', $item['description']) }} @endif</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{$title}}</button>
    </form>
</div>