{{-- <form action="{{ route('storeEntry', ['table' => $table]) }}" method="POST">
    @csrf
    @foreach ($columns as $column)
        <div class="form-group mb-3">
            <label for="{{ $column->COLUMN_NAME }}">{{ ucfirst($column->COLUMN_NAME) }}</label>
            <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control">
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Adaugă</button>
    <button type="button" class="btn btn-secondary close-overlay">Anulează</button>
</form> --}}


{{--
<form action="{{ route('storeEntry', ['table' => $table]) }}" method="POST">
    @csrf
    @method('POST')
    @foreach ((array) $entry as $key => $value)
        <div class="form-group mb-3">
            <label for="{{ $key }}">{{ ucfirst($key) }}</label>
            <input type="text" name="{{ $key }}" value="{{ $value }}" class="form-control"
                {{ $key === $primaryKey ? 'readonly' : '' }}>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Adaugă</button>
    <button type="button" class="btn btn-secondary close-overlay">Anulează</button>
</form> --}}

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă Intrare</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Adaugă Intrare</h1>
        <form action="{{ route('storeEntry', ['table' => $table]) }}" method="POST">
            @csrf

            @foreach ($columns as $column)
                <div class="form-group">
                    <label for="{{ $column->COLUMN_NAME }}">{{ ucfirst($column->COLUMN_NAME) }}</label>
                    <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control">
                </div>
            @endforeach

            <button type="submit" class="btn btn-success mt-3">Adaugă</button>
        </form>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă Intrare</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- jQuery (necesar pentru datepicker) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>

<body>
    <div class="container mt-4">
        <h1>Adaugă Intrare</h1>
        <form action="{{ route('storeEntry', ['table' => $table]) }}" method="POST">
            @csrf

            @foreach ($columns as $column)
                <div class="form-group">
                    <label for="{{ $column->COLUMN_NAME }}">{{ ucfirst($column->COLUMN_NAME) }}</label>


                    @if (str_contains($column->COLUMN_NAME, 'Data') || str_contains($column->COLUMN_NAME, 'GarantieV'))
                        <!-- Câmpurile care conțin "Data" -->
                        <input type="date" name="{{ $column->COLUMN_NAME }}" class="form-control">
                    @elseif (str_contains($column->COLUMN_NAME, 'ID'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'Doar daca e necesar' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'CNP'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'ex: 123546453345' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'Nume'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'ex: Ionescu' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'Prenume'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'ex: Ion' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'Salariu'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'ex: 2500' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'Numar') || str_contains($column->COLUMN_NAME, 'NrOre'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'ex: 3' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'PersoanaJuridica'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'x(nu) / v(da)' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'Status'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ '0(neinceputa) / 1(in lucru) / 2(finalizata)' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'Discount'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'Procente - 20 adica 20%' }}">
                    @elseif (str_contains($column->COLUMN_NAME, 'PuncteLoialitate') ||
                            str_contains($column->COLUMN_NAME, 'Stoc') ||
                            str_contains($column->COLUMN_NAME, 'Lot') ||
                            str_contains($column->COLUMN_NAME, 'PretPeBuc') ||
                            str_contains($column->COLUMN_NAME, 'Cost'))
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ 'ex: 120' }}">
                    @else
                        <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control"
                            placeholder="{{ $column->COLUMN_NAME === 'Mail' ? 'ex: user@domain.com' : ($column->COLUMN_NAME === 'Telefon' ? 'ex: 0721234567' : 'Completează...') }}">
                    @endif
                </div>
            @endforeach

            <button type="submit" class="btn btn-success mt-3">Adaugă</button>
        </form>
    </div>
</body>

</html>
