@extends('componets.layout')

@section('view')
    @if (Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif


    <div class="d-flex justify-content-between mb-5">
        <h4>PRODUCTOS</h4>
        <a class="btn btn-primary" href="{{ route('create.product', 'new') }}"> Crear</a>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <th>{{ $item->name }}</th>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td class="d-flex">
                            <a class="btn btn-success btn-sm" href="{{ route('create.product', $item->id) }}">Editar</a>
                            <form action="{{ route('delete.product', $item->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
