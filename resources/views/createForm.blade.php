<form action="{{ route('storeEntry', ['table' => $table]) }}" method="POST">
    @csrf
    @foreach ($columns as $column)
        <div class="form-group mb-3">
            <label for="{{ $column->COLUMN_NAME }}">{{ ucfirst($column->COLUMN_NAME) }}</label>
            <input type="text" name="{{ $column->COLUMN_NAME }}" class="form-control">
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Adaugă</button>
    <button type="button" class="btn btn-secondary close-overlay">Anulează</button>
</form>
