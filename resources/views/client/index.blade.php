@extends('theme.base')

@section('content')
<div class="container py-5 text-center">
<h1 class="">Listado de clientes</h1>
<a href="{{ route('client.create') }}" class="btn btn-primary">Crear cliente</a>

@if (Session::has('mensaje')) 
<div class="alert alert-info my-5">
    {{Session::get('mensaje')}}
</div>
@endif

<table class="table">
    <thead>
        <th>Nombre</th>
        <th>Saldo</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        {{-- retorna los datos --}}
        @forelse ($clients as $detail) 
        <tr> 
            <td>{{$detail->name}} </td>
            <td>{{$detail->due}} </td>
            <td> 
                {{-- <a href="{{ route('client.edit', ['client' => $detail->id])}}" class="btn btn-warning"> Editar </a>  --}}
                    <a href="{{ route('client.edit', $detail) }}" class="btn btn-warning"> {{$detail->id}} Editar </a>
                  
                - <form action="{{ route('client.destroy', $detail) }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    {{-- onclick="return confirm('Estas seguro que deseas eliminar?')" --}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro que deseas eliminar?')">Eliminar</button>

                </form>
                
                {{-- <a href="{{ route('client.destroy', $detail->id) }}" class="btn btn-danger"> Eliminar</a> --}}
            </td>
        </tr> 
        @empty
        <tr>
            <td colspan="3">Aun no hay registros</td>
        </tr>
            
        @endforelse
        
    </tbody>

</table>
@if ($clients->count())
{{--Para la paginacion --}}
{{$clients->links()}}

    
@endif
</div>
@endsection