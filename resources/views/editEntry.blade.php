{{-- @extends('layouts.app')

@section('content')
    <h1>Editează Intrarea</h1>
    <form action="{{ route('updateEntry', ['table' => $table, 'id' => $entry->ID]) }}" method="POST">
        @csrf
        @method('POST')

        @foreach ($entry as $key => $value)
            <div class="form-group">
                <label for="{{ $key }}">{{ ucfirst($key) }}</label>
                <input type="text" name="{{ $key }}" value="{{ $value }}" class="form-control">
            </div>
        @endforeach

        <button type="submit" class="btn-save">Salvează</button>
    </form>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editează Intrarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Editează Intrarea</h1>
        <form action="{{ route('updateEntry', ['table' => $table, 'id' => $entry->$primaryKey]) }}" method="POST">
            @csrf
            @method('POST')

            @foreach ((array) $entry as $key => $value)
                <div class="form-group">
                    <label for="{{ $key }}">{{ ucfirst($key) }}</label>
                    <input type="text" name="{{ $key }}" value="{{ $value }}" class="form-control"
                        {{ $key === $primaryKey ? 'readonly' : '' }}>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary mt-3">Salvează</button>
        </form>
    </div>
</body>

</html>
