@extends('theme.base')

@section('content')

<div class="container py-5 text-center">

    @if (isset($client))
      <h1>Editar cliente</h1>
      {{-- <form action="{{ route('client.update', ['client' => $client->id])}}" method="post"> --}}
           {{-- <form action="{{ url('edit/'.$client->id) }}" method="post">   --}}
               {{-- <form action="{{ route('client.update', $client)}}" method="post">
        @method('PUT') --}}
    @else
      <h1>Crear cliente</h1>
        {{-- <form action="{{ route('client.store') }}" method="POST"> --}}
    @endif

    @if (isset($client))
      {{-- <form action="{{ route('client.update',$clienteLaravel->id) }}" method="post"> --}}
        {{-- <form action="{{ route('client.update', ['client' => $client->id]) }}" method="post"> --}}
          {{-- <form action="{{ route('client.update', ['client' => $client->id]) }}" method="POST"> --}}
            {{-- <form action="{{ url('edit/'.$client->id) }}" method="post"> --}}
              {{-- <form action="{{ route('client.update', ['client' => $client->id]) }}" method="POST"> --}}
            <form action="{{ route('client.update', $client)}}" method="POST">
            @csrf
            {{-- <form action="{{ route('client.update', ['client' => $client]) }}" method="POST"> --}}
            @method('PUT')
            <h1>Estamos  editando</h1>

            {{-- <form action="{{ route('client.update', ['client' => $client]) }}" method="POST"> --}}
            {{-- @method('PUT') --}}
    @else 
      <form action="{{ route('client.store') }}" method="POST">
        @csrf
    @endif
 
{{-- <h1 class="">Crear clientes</h1> --}}

{{-- <form action="{{route('client.store') }}" method="POST"> --}}
  
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control" placeholder="Nombre del cliente" value="{{old('name') ?? @$client->name}}">
    <p class="form-text">Escriba el nombre</p>
    @error('name')
    <p class="form-text text-danger">{{ $message }}</p>     
    @enderror
  </div>

  <div class="mb-3">
    <label for="due" class="form-label">Saldo</label>
    <input type="number" name="due" class="form-control" placeholder="Saldo" step="0.01" value="{{old('due') ?? @$client->due}}"> 
    <p class="form-text">Escriba el saldo</p>
    @error('due')
    <p class="form-text text-danger">{{ $message }}</p>     
    @enderror
  </div>

  <div class="mb-3">
    <label for="comments" class="form-label">comentarios</label>
    <textarea name="comments" id="" cols="30" rows="4" class="form-control" >{{old('comments') ?? @$client->comments}}</textarea>
    <p class="form-text">Escriba un comentario</p>
    @error('comments')
    <p class="form-text text-danger">{{ $message }}</p>     
    @enderror
  </div>

  @if (isset($client))
  <button type="submit" class="btn btn-primary">Editar</button>
  @else
  <button type="submit" class="btn btn-primary">Guardar</button>
  
  @endif
</form>


</div>
@endsection