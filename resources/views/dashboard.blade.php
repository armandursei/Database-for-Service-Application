<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .edit-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            max-height: 80%;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5rem;
            color: black;
            border: none;
            background: none;
            cursor: pointer;
        }

        .but {
            background-color: red;
            margin-bottom: 1px;
            border-color: red;
            width: 90px;
        }

        .but2 {
            background-color: grey;
            border-color: grey;
            width: 90px;

        }

        .but3 {

            width: 90px;

        }

        .acasa {
            margin-bottom: 15px;
            background-color: white !important;

        }

        tr {
            background-coloror: rgb(116, 115, 115);
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 150px;
            background-color: #f4f4f4;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            min-height: 840px;
            height: auto;
            overflow-y: auto;
        }

        .modal-lg {
            max-width: 80%;
            /* Mărime mai mare pentru modal */
        }


        .sidebar h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-weight: bold;
            font-size: 1.2em;
        }

        .table {
            margin-bottom: 0;
        }



        .table-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            /* Aliniere pe centru */
        }

        .table-card {
            background-color: #e3f2fd;
            padding: 10px 20px;
            width: 140px;
            /* Lățime fixă */
            border: 1px solid #90caf9;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
            color: #1565c0;
            text-decoration: none;
            transition: transform 0.2s, background-color 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-card:hover {
            background-color: #bbdefb;
            transform: translateY(-3px);
            cursor: pointer;
        }

        .content {
            width: 75%;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            font-size: 0.9em;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #9fcfed;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .card-body table thead {
            background-color: #007bff;
            /* Fundal albastru */
            color: white;
            /* Text alb */
            /* text-transform: uppercase; Text cu litere mari */
            font-size: 1rem;
            /* Mărimea fontului */
        }

        .card-body table thead th {
            padding: 12px;
            /* Spațiu în interiorul celulelor */
            border-bottom: 2px solid #ddd;
            /* Linie sub antet */
            text-align: left;
            /* Text aliniat la stânga */
        }

        .card-body table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Fundal pentru rândurile pare */
        }

        .card-body table tbody tr:hover {
            background-color: #f1f1f1;
            /* Fundal ușor gri pentru hover */
            cursor: pointer;
            /* Cursor pointer */
        }
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
</head>




<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

    <div class="sidebar">
        <!-- Buton pentru Dashboard simplu -->
        <div class="table-list">
            <a href="/dashboard" class="acasa table-card">Dashboard</a>
        </div>

        <h3>Tabele:</h3>
        <div class="table-list">
            @if (count($tables) > 0)
                @foreach ($tables as $table)
                    <a href="{{ url('dashboard?table=' . $table) }}" class="table-card">{{ $table }}</a>
                @endforeach
            @else
                <p>Nu există tabele relevante de afișat.</p>
            @endif
        </div>
    </div>

    {{-- <div class="content">
        @if ($selectedTable)
            <h1>Date din tabelul: {{ $selectedTable }}</h1>
            @if ($tableData && count($tableData) > 0)
                <table>
                    <thead>
                        <tr>
                            @foreach (array_keys((array) $tableData[0]) as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tableData as $row)
                            <tr>
                                @foreach ((array) $row as $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Nu există date în acest tabel.</p>
            @endif
        @else
            <h1>Vă rugăm să selectați un tabel din lista din stânga.</h1>
        @endif
    </div> --}}

    {{-- <div class="content">
        @if ($selectedTable)
            <h1>Date din tabelul: {{ $selectedTable }}</h1>
            @if ($tableData && count($tableData) > 0)
                <table>
                    <thead>
                        <tr>
                            @foreach (array_keys((array) $tableData[0]) as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tableData as $row)
                            <tr>
                                @foreach ((array) $row as $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Nu există date în acest tabel.</p>
            @endif
        @else
            <h1>Vă rugăm să selectați un tabel din lista din stânga.</h1>
        @endif
    </div> --}}

    <div class="content">
        @if ($selectedTable)
            <h1>Date din tabelul: <strong>{{ $selectedTable }}</strong></h1>
            <!-- Buton Adaugă -->
            {{-- <div class="d-flex justify-content-end mb-3">
                <button id="addButton" class="but3 btn btn-success">Adaugă</button>
            </div> --}}

            <!-- Butoane pentru acțiuni -->
            <div class="d-flex justify-content-end mb-3">
                <button id="addButton" class="but3 btn btn-success">Adaugă</button>
                <button id="toggleStatisticsButton" class="but3 btn btn-info ms-2">Statistici</button>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div id="statisticsSection" style="display: none;">
                @if ($selectedTable === 'Angajati')

                    <div class="row">


                        <!-- Card pentru Statistica Reparațiilor Angajaților -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Statistica Reparațiilor Angajaților - pentru a le fi acordate bonusuri
                                </div>
                                <div class="card-body">
                                    <canvas id="employeeRepairStatsChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Card pentru Angajați cu mai mult de 3 reparații neîncepute sau în progres -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-danger text-white">
                                    Angajați cu mai mult de {{ $minRepairs }} reparații în status neînceput sau in
                                    reparație - pentru a fi
                                    stimulați să le
                                    termine
                                </div>

                                <div class="container mt-4">
                                    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                                        <input type="hidden" name="table" value="{{ $selectedTable }}">
                                        <!-- Adaugă tabelul selectat -->
                                        <input type="hidden" name="showStatistics" value="1">
                                        <!-- Indică faptul că statisticile trebuie afișate -->
                                        <label for="minRepairs">Introduceți numărul minim de reparații:</label>
                                        <input type="number" name="minRepairs" id="minRepairs"
                                            value="{{ request('minRepairs', 3) }}" class="form-control w-25"
                                            placeholder="Ex: 3">
                                        <button type="submit" class="btn btn-primary mt-2">Filtrează</button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employeesWithPendingRepairs as $employee)
                                                <tr>
                                                    <td>{{ $employee->Nume }}</td>
                                                    <td>{{ $employee->Prenume }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif


                @if ($selectedTable === 'Dispozitive')
                    <div class="row">

                        <!-- Card pentru Clienți cu garanție expirată -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Clienți cu garanție expirată - pentru a fi sunați
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                                <th>Telefon</th>
                                                <th>Producător și Model</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientsWithExpiredWarranty as $client)
                                                <tr>
                                                    <td>{{ $client->Nume }}</td>
                                                    <td>{{ $client->Prenume }}</td>
                                                    <td>{{ $client->Telefon }}</td>
                                                    <td>{{ $client->ProducatorModel }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($selectedTable === 'Clienti')
                    <div class="row">

                        <!-- Card pentru Clienți cu garanție expirată -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Clienți cu garanție expirată - pentru a fi sunați
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                                <th>Telefon</th>
                                                <th>Producător și Model</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientsWithExpiredWarranty as $client)
                                                <tr>
                                                    <td>{{ $client->Nume }}</td>
                                                    <td>{{ $client->Prenume }}</td>
                                                    <td>{{ $client->Telefon }}</td>
                                                    <td>{{ $client->ProducatorModel }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Card pentru Clienți cu peste 100 puncte de loialitate -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-info text-white">
                                    Clienți cu mai mult de {{ $loyaltyPointsThreshold }} puncte de loialitate și care
                                    au
                                    reparații - pentru a beneficia de un discount
                                </div>
                                <div class="container mt-4">
                                    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                                        <input type="hidden" name="table" value="{{ $selectedTable }}">
                                        <input type="hidden" name="showStatistics" value="1">
                                        <!-- Indică faptul că statisticile trebuie afișate -->

                                        <label for="loyaltyPointsThreshold">Introduceți pragul punctelor de
                                            loialitate:</label>
                                        <input type="number" name="loyaltyPointsThreshold" id="loyaltyPointsThreshold"
                                            value="{{ request('loyaltyPointsThreshold', 100) }}"
                                            class="form-control w-25" placeholder="Ex: 100">
                                        <button type="submit" class="btn btn-primary mt-2">Filtrează</button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                                <th>Puncte Loialitate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientsWithLoyaltyPoints as $client)
                                                <tr>
                                                    <td>{{ $client->Nume }}</td>
                                                    <td>{{ $client->Prenume }}</td>
                                                    <td>{{ $client->PuncteLoialitate }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Card pentru Clienți cu reparații ce totalizează peste 1000 -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-warning text-white">
                                    Clienți cu reparații mai scumpe de 1000 Lei - pentru a fi informați ca beneficiază
                                    de o
                                    reparație gratis
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                                <th>Telefon</th>
                                                <th>Total Cost Reparații</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientsWithExpensiveRepairs as $client)
                                                <tr>
                                                    <td>{{ $client->Nume }}</td>
                                                    <td>{{ $client->Prenume }}</td>
                                                    <td>{{ $client->Telefon }}</td>
                                                    <td>{{ $client->TotalCostReparatii }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                @endif

                @if ($selectedTable === 'Reparatii')
                    <div class="row">
                        <!-- Card pentru Clienți cu peste 100 puncte de loialitate -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-info text-white">
                                    Clienți cu mai mult de {{ $loyaltyPointsThreshold }} puncte de loialitate și care
                                    au
                                    reparații - pentru a beneficia de un discount
                                </div>
                                <div class="container mt-4">
                                    <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                                        <input type="hidden" name="table" value="{{ $selectedTable }}">
                                        <input type="hidden" name="showStatistics" value="1">
                                        <!-- Indică faptul că statisticile trebuie afișate -->

                                        <label for="loyaltyPointsThreshold">Introduceți pragul punctelor de
                                            loialitate:</label>
                                        <input type="number" name="loyaltyPointsThreshold"
                                            id="loyaltyPointsThreshold"
                                            value="{{ request('loyaltyPointsThreshold', 100) }}"
                                            class="form-control w-25" placeholder="Ex: 100">
                                        <button type="submit" class="btn btn-primary mt-2">Filtrează</button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                                <th>Puncte Loialitate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientsWithLoyaltyPoints as $client)
                                                <tr>
                                                    <td>{{ $client->Nume }}</td>
                                                    <td>{{ $client->Prenume }}</td>
                                                    <td>{{ $client->PuncteLoialitate }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Card pentru Clienți cu garanție expirată -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Clienți cu garanție expirată - pentru a fi sunați
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                                <th>Telefon</th>
                                                <th>Producător și Model</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientsWithExpiredWarranty as $client)
                                                <tr>
                                                    <td>{{ $client->Nume }}</td>
                                                    <td>{{ $client->Prenume }}</td>
                                                    <td>{{ $client->Telefon }}</td>
                                                    <td>{{ $client->ProducatorModel }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($selectedTable === 'Piese')
                    <div class="row">
                        <!-- Card pentru Piese cu stoc mic și utilizare mare -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-secondary text-white">
                                    Piese cu stoc mic și utilizare mare - pentru a fi comandate din nou
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Producător</th>
                                                <th>Model</th>
                                                <th>Stoc</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($partsToRestock as $part)
                                                <tr>
                                                    <td>{{ $part->DenumireProducator }}</td>
                                                    <td>{{ $part->DenumireModel }}</td>
                                                    <td>{{ $part->Stoc }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif

                @if ($selectedTable === 'Unelte')
                    <div class="row">
                        <!-- Card pentru Unelte folosite peste 20 ore -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    Unelte folosite mai mult de 20 ore - pentru a fi trimise la revizie
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Producător</th>
                                                <th>Model</th>
                                                <th>Total Ore</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($toolsOver20Hours as $tool)
                                                <tr>
                                                    <td>{{ $tool->DenumireProducator }}</td>
                                                    <td>{{ $tool->DenumireModel }}</td>
                                                    <td>{{ $tool->TotalOre }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if ($tableData && count($tableData) > 0)
                <table class="styled-table">
                    <thead>
                        <tr>
                            @foreach (array_keys((array) $tableData[0]) as $column)
                                @if ($column !== 'ID')
                                    <!-- Excludem coloana cheii primare -->
                                    <th>{{ $column }}</th>
                                @endif
                            @endforeach
                            <th>Acțiuni</th> <!-- Coloană pentru butoane -->
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($tableData as $row)
                            <tr>
                                @foreach ((array) $row as $value)
                                    <td>{{ $value !== null ? e($value) : 'N/A' }}</td>
                                @endforeach
                            </tr>
                        @endforeach --}}
                        @foreach ($tableData as $row)
                            <tr>
                                @foreach ((array) $row as $key => $value)
                                    @if ($key !== 'ID')
                                        <!-- Excludem coloana cheii primare -->
                                        <td>{{ $value }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <!-- Buton Șterge -->
                                    <form
                                        action="{{ route('deleteEntry', ['table' => $selectedTable, 'id' => $row->ID]) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn but btn-primary btn-delete">Șterge</button>
                                    </form>

                                    <!-- Buton Editează -->

                                    {{-- <a href="{{ route('editEntry', ['table' => $selectedTable, 'id' => $row->ID]) }}"
                                        class="btn-edit">
                                        Editează
                                    </a> --}}
                                    <!-- Buton Editează în tabel -->
                                    {{-- <button href="#" class="btn btn-primary btn-edit"
                                        data-id="{{ $row->ID }}" data-toggle="modal" data-target="#editModal">
                                        Editează
                                    </button> --}}
                                    {{-- <a href="{{ route('editEntry', ['table' => $selectedTable, 'id' => $row->ID]) }}"
                                        class="btn btn-primary">
                                        Editează
                                    </a> --}}

                                    <button class="btn but2 btn-primary btn-edit" data-id="{{ $row->ID }}">
                                        Editează
                                    </button>


                                    <!-- Modal pentru Editare -->
                                    {{-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                     <h5 class="modal-title" id="editModalLabel">Editează Intrarea
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editForm" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <div id="editFormContent">
                                                            <!-- Conținutul formularului va fi încărcat dinamic -->
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Salvează</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Overlay pentru editare -->
                <div id="editOverlay" class="overlay" style="display: none;">
                    <div class="edit-container">
                        <button class="close-overlay btn-close"></button>
                        <div id="editFormContainer"></div>
                    </div>
                </div>

                <!-- Overlay pentru Adăugare -->
                <div id="addOverlay" class="overlay" style="display: none;">
                    <div class="edit-container">
                        <button class="close-overlay btn-close"></button>
                        <div id="addFormContainer">
                            <!-- Formularul va fi încărcat aici -->
                        </div>
                    </div>
                </div>
            @else
                <p class="no-data">Nu există date în acest tabel.</p>
            @endif
        @else
            <div class="container mt-4">
                <h1>Puteți selecta un tabel din lista din stânga.</h1>
                <h1 class="mb-4">Informații:</h1>
                <div class="row">


                    <!-- Card pentru Statistica Reparațiilor Angajaților -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                Statistica Reparațiilor Angajaților - pentru a le fi acordate bonusuri
                            </div>
                            <div class="card-body">
                                <canvas id="employeeRepairStatsChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Card pentru Angajați cu mai mult de 3 reparații neîncepute sau în progres -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                                Angajați cu mai mult de {{ $minRepairs }} reparații în status neînceput sau in
                                reparație - pentru a fi
                                stimulați să le
                                termine
                            </div>

                            <div class="container mt-4">
                                <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                                    <label for="minRepairs">Introduceți numărul minim de reparații:</label>
                                    <input type="number" name="minRepairs" id="minRepairs"
                                        value="{{ request('minRepairs', 3) }}" class="form-control w-25"
                                        placeholder="Ex: 3">
                                    <button type="submit" class="btn btn-primary mt-2">Filtrează</button>
                                </form>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nume</th>
                                            <th>Prenume</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employeesWithPendingRepairs as $employee)
                                            <tr>
                                                <td>{{ $employee->Nume }}</td>
                                                <td>{{ $employee->Prenume }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Card pentru Clienți cu garanție expirată -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Clienți cu garanție expirată - pentru a fi sunați
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nume</th>
                                            <th>Prenume</th>
                                            <th>Telefon</th>
                                            <th>Producător și Model</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientsWithExpiredWarranty as $client)
                                            <tr>
                                                <td>{{ $client->Nume }}</td>
                                                <td>{{ $client->Prenume }}</td>
                                                <td>{{ $client->Telefon }}</td>
                                                <td>{{ $client->ProducatorModel }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Card pentru Unelte folosite peste 20 ore -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                Unelte folosite mai mult de 20 ore - pentru a fi trimise la revizie
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producător</th>
                                            <th>Model</th>
                                            <th>Total Ore</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($toolsOver20Hours as $tool)
                                            <tr>
                                                <td>{{ $tool->DenumireProducator }}</td>
                                                <td>{{ $tool->DenumireModel }}</td>
                                                <td>{{ $tool->TotalOre }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Card pentru Clienți cu peste 100 puncte de loialitate -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                Clienți cu mai mult de {{ $loyaltyPointsThreshold }} puncte de loialitate și care au
                                reparații - pentru a beneficia de un discount
                            </div>
                            <div class="container mt-4">
                                <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                                    <label for="loyaltyPointsThreshold">Introduceți pragul punctelor de
                                        loialitate:</label>
                                    <input type="number" name="loyaltyPointsThreshold" id="loyaltyPointsThreshold"
                                        value="{{ request('loyaltyPointsThreshold', 100) }}"
                                        class="form-control w-25" placeholder="Ex: 100">
                                    <button type="submit" class="btn btn-primary mt-2">Filtrează</button>
                                </form>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nume</th>
                                            <th>Prenume</th>
                                            <th>Puncte Loialitate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientsWithLoyaltyPoints as $client)
                                            <tr>
                                                <td>{{ $client->Nume }}</td>
                                                <td>{{ $client->Prenume }}</td>
                                                <td>{{ $client->PuncteLoialitate }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Card pentru Clienți cu reparații ce totalizează peste 1000 -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                Clienți cu reparații mai scumpe de 1000 Lei - pentru a fi informați ca beneficiază de o
                                reparație gratis
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nume</th>
                                            <th>Prenume</th>
                                            <th>Telefon</th>
                                            <th>Total Cost Reparații</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientsWithExpensiveRepairs as $client)
                                            <tr>
                                                <td>{{ $client->Nume }}</td>
                                                <td>{{ $client->Prenume }}</td>
                                                <td>{{ $client->Telefon }}</td>
                                                <td>{{ $client->TotalCostReparatii }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                    <!-- Card pentru Piese cu stoc mic și utilizare mare -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                Piese cu stoc mic și utilizare mare - pentru a fi comandate din nou
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producător</th>
                                            <th>Model</th>
                                            <th>Stoc</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partsToRestock as $part)
                                            <tr>
                                                <td>{{ $part->DenumireProducator }}</td>
                                                <td>{{ $part->DenumireModel }}</td>
                                                <td>{{ $part->Stoc }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                </div>

                <!-- Interogări Simple -->
                {{-- <h2>Interogări Simple</h2> --}}

                {{-- <h3>Clienți cu garanție expirată - pentru a fi sunați</h3>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Telefon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientsWithExpiredWarranty as $client)
                        <tr>
                            <td>{{ $client->Nume }}</td>
                            <td>{{ $client->Prenume }}</td>
                            <td>{{ $client->Telefon }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Unelte folosite mai mult de 20 ore - pentru a fi trimise la revizie</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producător</th>
                        <th>Model</th>
                        <th>Total Ore</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($toolsOver20Hours as $tool)
                        <tr>
                            <td>{{ $tool->DenumireProducator }}</td>
                            <td>{{ $tool->DenumireModel }}</td>
                            <td>{{ $tool->TotalOre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Clienți cu mai mult de 100 puncte de loialitate și care au reparații - pentru a beneficia de un discount
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Puncte Loialitate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientsWithLoyaltyPoints as $client)
                        <tr>
                            <td>{{ $client->Nume }}</td>
                            <td>{{ $client->Prenume }}</td>
                            <td>{{ $client->PuncteLoialitate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



            <h3>Clienți cu reparații mai scumpe de 1000 Lei - pentru a fi informați ca beneficiază de o reparație gratis
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Telefon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientsWithExpensiveRepairs as $client)
                        <tr>
                            <td>{{ $client->Nume }}</td>
                            <td>{{ $client->Prenume }}</td>
                            <td>{{ $client->Telefon }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Angajați cu mai mult de 3 reparații în status neînceput sau in reparație - pentru a fi stimulați să le
                termine</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employeesWithPendingRepairs as $employee)
                        <tr>
                            <td>{{ $employee->Nume }}</td>
                            <td>{{ $employee->Prenume }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Piese cu stoc mic și utilizare mare - pentru a fi comandate din nou</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producător</th>
                        <th>Model</th>
                        <th>Stoc</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partsToRestock as $part)
                        <tr>
                            <td>{{ $part->DenumireProducator }}</td>
                            <td>{{ $part->DenumireModel }}</td>
                            <td>{{ $part->Stoc }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Angajați cu reparații peste 5000</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employeesWithExpensiveRepairs as $employee)
                        <tr>
                            <td>{{ $employee->Nume }}</td>
                            <td>{{ $employee->Prenume }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Statistica Reparațiilor Angajaților - pentru bonusuri</h2>
            <canvas id="employeeRepairStatsChart" width="400" height="200"></canvas> --}}
            </div>

            {{-- <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const ctx = document.getElementById('employeeRepairStatsChart').getContext('2d');

                    // Datele din backend
                    const chartData = @json($employeeRepairStats);

                    // Construim etichetele și seturile de date
                    const labels = chartData.map(item => `${item.Nume} ${item.Prenume}`);
                    const dataNeincepute = chartData.map(item => item.Neincepute);
                    const dataInReparatie = chartData.map(item => item.InReparatie);
                    const dataFinalizate = chartData.map(item => item.Finalizate);

                    // Creăm diagrama
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Neîncepute',
                                    data: dataNeincepute,
                                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'În Reparatie',
                                    data: dataInReparatie,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Finalizate',
                                    data: dataFinalizate,
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script> --}}

            {{-- <script>
        const ctx = document.getElementById('employeeRepairStatsChart').getContext('2d');
        const chartData = @json($employeeRepairStats);
        const labels = chartData.map(item => item.Nume + ' ' + item.Prenume);
        const dataNeincepute = chartData.map(item => item.Neincepute);
        const dataInReparatie = chartData.map(item => item.InReparatie);
        const dataFinalizate = chartData.map(item => item.Finalizate);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Neîncepute',
                        data: dataNeincepute,
                        backgroundColor: 'red'
                    },
                    {
                        label: 'În Reparatie',
                        data: dataInReparatie,
                        backgroundColor: 'yellow'
                    },
                    {
                        label: 'Finalizate',
                        data: dataFinalizate,
                        backgroundColor: 'green'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}

            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
        @endif
    </div>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".btn-edit");
            const editFormContent = document.getElementById("editFormContent");
            const editForm = document.getElementById("editForm");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    const table = "{{ $selectedTable }}";

                    // Configurăm ruta pentru încărcarea datelor
                    const url = `/dashboard/${table}/${id}/entry`;

                    // Setăm ruta pentru formularul de salvare
                    editForm.setAttribute("action", `/dashboard/update/${table}/${id}`);

                    // Preluăm datele intrării
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            // Populăm formularul cu datele primite
                            editFormContent.innerHTML = "";
                            for (const key in data) {
                                const readonly = key === "{{ $primaryKey }}" ? "readonly" :
                                    "";
                                editFormContent.innerHTML += `
                                    <div class="form-group">
                                        <label for="${key}">${key}</label>
                                        <input type="text" name="${key}" value="${data[key] || ''}" class="form-control" ${readonly}>
                                    </div>`;
                            }
                        })
                        .catch(error => console.error("Eroare la preluarea datelor:", error));
                });
            });
        });
    </script> --}}

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statisticsSection = document.getElementById('statisticsSection');
            const toggleStatisticsButton = document.getElementById('toggleStatisticsButton');

            // Ascunde/Afișează secțiunea statistici la apăsare
            toggleStatisticsButton.addEventListener('click', function() {
                if (statisticsSection.style.display === 'none' || statisticsSection.style.display === '') {
                    statisticsSection.style.display = 'block'; // Afișează secțiunea
                    toggleStatisticsButton.textContent = 'Ascunde Statistici'; // Schimbă textul butonului
                } else {
                    statisticsSection.style.display = 'none'; // Ascunde secțiunea
                    toggleStatisticsButton.textContent = 'Statistici'; // Revine la textul inițial
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statisticsSection = document.getElementById('statisticsSection');
            const toggleStatisticsButton = document.getElementById('toggleStatisticsButton');

            // Verifică dacă parametrul `showStatistics` este prezent în URL
            const urlParams = new URLSearchParams(window.location.search);
            const showStatistics = urlParams.get('showStatistics');

            // Afișează secțiunea dacă parametrul este setat
            if (showStatistics === '1') {
                statisticsSection.style.display = 'block';
                toggleStatisticsButton.textContent = 'Ascunde Statistici';
            }

            // Ascunde/Afișează secțiunea statisticilor la apăsarea butonului
            toggleStatisticsButton.addEventListener('click', function() {
                if (statisticsSection.style.display === 'none' || statisticsSection.style.display === '') {
                    statisticsSection.style.display = 'block';
                    toggleStatisticsButton.textContent = 'Ascunde Statistici';
                } else {
                    statisticsSection.style.display = 'none';
                    toggleStatisticsButton.textContent = 'Statistici';
                }
            });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statisticsSection = document.getElementById('statisticsSection');
            const toggleStatisticsButton = document.getElementById('toggleStatisticsButton');

            // Verifică dacă parametrul `showStatistics` este prezent în URL
            const urlParams = new URLSearchParams(window.location.search);
            const showStatistics = urlParams.get('showStatistics');

            // Afișează secțiunea dacă parametrul este setat
            if (showStatistics === '1') {
                statisticsSection.style.display = 'block';
                toggleStatisticsButton.textContent = 'Ascunde Statistici';
            } else {
                statisticsSection.style.display = 'none';
                toggleStatisticsButton.textContent = 'Statistici';
            }

            // Ascunde/Afișează secțiunea statisticilor la apăsarea butonului
            toggleStatisticsButton.addEventListener('click', function() {
                if (statisticsSection.style.display === 'none' || statisticsSection.style.display === '') {
                    statisticsSection.style.display = 'block';
                    toggleStatisticsButton.textContent = 'Ascunde Statistici';

                    // Adaugă `showStatistics=1` în URL
                    urlParams.set('showStatistics', '1');
                } else {
                    statisticsSection.style.display = 'none';
                    toggleStatisticsButton.textContent = 'Statistici';

                    // Elimină `showStatistics` din URL
                    urlParams.delete('showStatistics');
                }

                // Actualizează URL-ul fără a reîncărca pagina
                window.history.replaceState({}, '', `${window.location.pathname}?${urlParams}`);
            });
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('employeeRepairStatsChart').getContext('2d');

            // Datele din backend
            const chartData = @json($employeeRepairStats);

            // Construim etichetele și seturile de date
            const labels = chartData.map(item => `${item.Nume} ${item.Prenume}`);
            const dataNeincepute = chartData.map(item => item.Neincepute);
            const dataInReparatie = chartData.map(item => item.InReparatie);
            const dataFinalizate = chartData.map(item => item.Finalizate);

            // Creăm diagrama
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Neîncepute',
                            data: dataNeincepute,
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'În Reparatie',
                            data: dataInReparatie,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Finalizate',
                            data: dataFinalizate,
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".btn-edit");
            const overlay = document.getElementById("editOverlay");
            const editFormContainer = document.getElementById("editFormContainer");
            const closeOverlay = document.querySelector(".close-overlay");

            // Eveniment pentru fiecare buton "Editează"
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    const table = "{{ $selectedTable }}";

                    // Încărcăm conținutul formularului prin AJAX
                    fetch(`/dashboard/${table}/${id}/edit`)
                        .then(response => response.text())
                        .then(html => {
                            editFormContainer.innerHTML = html; // Populăm overlay-ul
                            overlay.style.display = "flex"; // Afișăm overlay-ul
                        })
                        .catch(error => console.error("Eroare la încărcarea formularului:", error));
                });
            });

            // Închidem overlay-ul
            closeOverlay.addEventListener("click", function() {
                overlay.style.display = "none";
                editFormContainer.innerHTML = ""; // Golim conținutul pentru reutilizare
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addButton = document.getElementById("addButton");
            const addOverlay = document.getElementById("addOverlay");
            const addFormContainer = document.getElementById("addFormContainer");
            const closeOverlay = document.querySelectorAll(".close-overlay");

            // Deschidem overlay-ul pentru Adăugare
            addButton.addEventListener("click", function() {
                const table = "{{ $selectedTable }}";

                // Încărcăm formularul gol prin AJAX
                fetch(`/dashboard/${table}/create`)
                    .then(response => response.text())
                    .then(html => {
                        addFormContainer.innerHTML = html; // Populăm overlay-ul
                        addOverlay.style.display = "flex"; // Afișăm overlay-ul
                    })
                    .catch(error => console.error("Eroare la încărcarea formularului:", error));
            });

            // Închidem overlay-ul
            closeOverlay.forEach(button => {
                button.addEventListener("click", function() {
                    addOverlay.style.display = "none";
                    addFormContainer.innerHTML = ""; // Golim conținutul pentru reutilizare
                });
            });
        });
    </script>


</body>

</html>
