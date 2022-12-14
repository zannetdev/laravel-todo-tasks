@extends('app')
@section('content')
<div class="container w-25 border p-4">
    <form action="{{ route('todos') }}" method="POST">
        @csrf

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ session('success') }}</strong>
        </div>
        @endif
        @error('title')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="t rue">&times;</span>
            </button>
            <strong>{{ $message  }}</strong>
        </div>
        @enderror

        <div class="form-group">
            <label for="">Titulo de la Tarea</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Titulo" aria-describedby="helpId">
        </div>
        <button class="btn btn-secondary btn-rounded btn-block">Guardar</button>
    </form>
    <div class="">
        @foreach ($todos as $todo )
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                <a href="{{ route('todos-edit', ['id' => $todo->id]) }}">{{ $todo->title }}</a>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{ route('todos-destroy', ['id' => $todo->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection