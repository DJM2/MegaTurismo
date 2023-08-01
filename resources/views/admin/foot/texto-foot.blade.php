@extends('admin.admin')
@section('contenido')
    <h1>Editar texto del pie de página</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('update.footer.text') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="text">Texto del pie de página:</label>
            <textarea id="text" name="text" class="form-control">{{ $footerText->text ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
