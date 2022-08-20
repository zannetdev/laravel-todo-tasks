@extends('app')
@section('content')
<div class="container w-25 border p-4">
    <form action="{{ route('todos-update', ['id' => $todo->id]) }}" method="POST">
        @csrf
        @method('PATCH')
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
            <input value="{{ $todo->title }}" type="text" id="title" name="title" class="form-control" placeholder="Titulo" aria-describedby="helpId">
        </div>
        <button class="btn btn-secondary btn-rounded btn-block">Actualizar</button>
    </form>
</div>
@endsection