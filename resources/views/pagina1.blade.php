{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista Angajați</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
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
    </style>
</head>

<body>
    <h1>Detalii Angajați</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Data Angajarii</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($angajati as $angajat)
                <tr>
                    <td>{{ $angajat->IDAngajat }}</td>
                    <td>{{ $angajat->Nume }}</td>
                    <td>{{ $angajat->Prenume }}</td>
                    <td>{{ $angajat->Mail }}</td>
                    <td>{{ $angajat->Telefon }}</td>
                    <td>{{ \Carbon\Carbon::parse($angajat->DataAngajarii)->format('Y-m-d') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> --}}
