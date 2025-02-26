<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
// use DB;

class LoginController extends Controller
{
    public function login()
    {
        // $angajati = DB::table('Angajat')->get();
        //$angajati = DB::select("SELECT * FROM Angajat");
        $angajati = DB::select("SELECT * FROM Angajati");
        //dd($angajati[0]->nume);
        //dd($angajati);

        return view('login');
        //return view('login')->with(compact('angajati'));
    }



    // public function authenticate(Request $request)
    // {
    //     $username = $request->input('uname');
    //     $password = $request->input('psw');

    //     if ($username === 'admin' && $password === 'admin') {
    //         return redirect('pagina1');
    //     } else {
    //         return redirect('login')->with('error', 'Invalid credentials');
    //     }
    // }

    public function authenticate(Request $request)
    {
        $username = $request->input('uname');
        $password = $request->input('psw');

        if ($username === 'admin' && $password === 'admin') {
            return redirect('dashboard');
        } else {
            return redirect('login')->with('error', 'Invalid credentials');
        }
    }

    public function pagina1()
    {
        // Interogare SQL pentru a aduce detalii despre angajați
        //$angajati = DB::select("SELECT id_angajat, nume, prenume, email, telefon FROM Angajat");
        $angajati = DB::select("SELECT IDAngajat, Nume, Prenume, Mail, Telefon, DataAngajarii FROM Angajati");
        // Transmiterea datelor către view
        return view('pagina1', ['angajati' => $angajati]);
    }

    // public function dashboard(Request $request)
    // {
    //     // Obține lista tuturor tabelelor din baza de date
    //     $tables = DB::select("SHOW TABLES");

    //     // Convertim răspunsul în array simplu pentru ușurință
    //     $tableList = array_map(function ($table) {
    //         return array_values((array) $table)[0];
    //     }, $tables);

    //     // Listează doar tabelele relevante (tabelele aplicației)
    //     $allowedTables = [
    //         'Angajati',
    //         'Clienti',
    //         'Dispozitive',
    //         'Piese',
    //         'PieseReparatii',
    //         'Reparatii',
    //         'Unelte',
    //         'UnelteReparatii'
    //     ];

    //     $filteredTables = array_filter($tableList, function ($table) use ($allowedTables) {
    //         return in_array($table, $allowedTables);
    //     });

    //     // Obține numele tabelului selectat (dacă există)
    //     $selectedTable = $request->query('table');
    //     $tableData = null;

    //     if ($selectedTable && in_array($selectedTable, $allowedTables)) {
    //         // Obține datele din tabelul selectat
    //         $tableData = DB::select("SELECT * FROM `$selectedTable`");
    //     }

    //     return view('dashboard', [
    //         'tables' => $filteredTables,
    //         'selectedTable' => $selectedTable,
    //         'tableData' => $tableData
    //     ]);
    // }


}
