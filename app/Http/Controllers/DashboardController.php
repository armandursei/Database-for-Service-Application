<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Afișează tabelele și datele în dashboard
    public function dashboard(Request $request)
    {
        // Preia pragul din cerere sau folosește valoarea implicită 100
        $loyaltyPointsThreshold = $request->input('loyaltyPointsThreshold', 100);
        $minRepairs = $request->input('minRepairs', 3); // Preia parametrul din cerere sau folosește valoarea implicită 3


        // Obține lista tabelelor
        $tables = DB::select("SHOW TABLES");
        $tableNames = [];
        foreach ($tables as $table) {
            $tableNames[] = array_values((array)$table)[0];
        }

        // Listează tabelele pe care dorești să le afișezi
        $allowedTables = [
            'Angajati',
            'Clienti',
            'Dispozitive',
            'Piese',
            'PieseReparatii',
            'Reparatii',
            'Unelte',
            'UnelteReparatii'
        ];

        // Filtrează doar tabelele dorite
        $tableNames = array_intersect($tableNames, $allowedTables);


        // Exclude tabelele inutile
        $relevantTables = array_diff($tableNames, ['migrations', 'jobs', 'sessions', 'cache', 'failed_jobs']);
        $selectedTable = $request->input('table');
        $tableData = [];
        $primaryKey = NULL;

        if ($selectedTable && in_array($selectedTable, $relevantTables)) {
            $primaryKey = $this->getPrimaryKey($selectedTable);
            // Construim interogarea SQL în funcție de tabelul selectat
            switch ($selectedTable) {
                case 'Reparatii':
                    $tableData = DB::select("
                    SELECT
                        IDReparatie as ID,
                           CONCAT(Dispozitive.DenumireProducator, ' ', Dispozitive.DenumireModel) AS Dispozitiv,
                           CONCAT(Clienti.Nume, ' ', Clienti.Prenume) AS Client,
                           CONCAT(Angajati.Nume, ' ', Angajati.Prenume) AS Angajat,
                           Reparatii.DescriereDefectiune,
                           Reparatii.Cost,
                           Reparatii.NrOreTotal,
                           Reparatii.Discount,
                           Reparatii.Status
                    FROM Reparatii
                    JOIN Dispozitive ON Reparatii.IDDispozitiv = Dispozitive.IDDispozitiv
                    JOIN Clienti ON Reparatii.IDClient = Clienti.IDClient
                    JOIN Angajati ON Reparatii.IDAngajat = Angajati.IDAngajat
                ");
                    break;

                case 'PieseReparatii':
                    //     $tableData = DB::select("
                    //     SELECT Piese.DenumireProducator AS Producator,
                    //            Piese.DenumireModel AS Model,
                    //            CONCAT('Reparatie ID: ', Reparatii.IDReparatie) AS Reparatie,
                    //            PieseReparatii.NumarBucati AS Cantitate
                    //     FROM PieseReparatii
                    //     JOIN Piese ON PieseReparatii.IDPiesa = Piese.IDPiesa
                    //     JOIN Reparatii ON PieseReparatii.IDReparatie = Reparatii.IDReparatie
                    // ");
                    $tableData = DB::select("
                    SELECT
                    Reparatii.IDReparatie as ID,
                        CONCAT(Piese.DenumireProducator, ' ',Piese.DenumireModel )AS Piesa,
                        CONCAT(Reparatii.DescriereDefectiune  , ' - ', 'Reparatie: ', Reparatii.IDReparatie) AS Reparatie,
                        PieseReparatii.NumarBucati AS Cantitate
                    FROM PieseReparatii
                    JOIN Piese ON PieseReparatii.IDPiesa = Piese.IDPiesa
                    JOIN Reparatii ON PieseReparatii.IDReparatie = Reparatii.IDReparatie
                    ");

                    break;

                case 'UnelteReparatii':
                    //     $tableData = DB::select("
                    //     SELECT CONCAT(Unelte.DenumireProducator, ' ', Unelte.DenumireModel) AS Unealta,
                    //            CONCAT('Reparatie ID: ', Reparatii.IDReparatie) AS Reparatie,
                    //            UnelteReparatii.NrOreProcedura AS NrOre
                    //     FROM UnelteReparatii
                    //     JOIN Unelte ON UnelteReparatii.IDUnealta = Unelte.IDUnealta
                    //     JOIN Reparatii ON UnelteReparatii.IDReparatie = Reparatii.IDReparatie
                    // ");
                    $tableData = DB::select("
                    SELECT
                    Reparatii.IDReparatie as ID,
                    CONCAT(Unelte.DenumireProducator, ' ',Unelte.DenumireModel ) AS Unealta,
                       CONCAT(Reparatii.DescriereDefectiune , ' - ', 'Reparatie: ', Reparatii.IDReparatie) AS Reparatie,
                       UnelteReparatii.NrOreProcedura AS NrOre
                    FROM UnelteReparatii
                    JOIN Unelte ON UnelteReparatii.IDUnealta = Unelte.IDUnealta
                    JOIN Reparatii ON UnelteReparatii.IDReparatie = Reparatii.IDReparatie
                    ");

                    break;

                case 'Angajati':
                    $tableData = DB::select("
                SELECT
                    IDAngajat as ID,
                    CONCAT(Nume, ' ', Prenume) AS Nume,
                    CNP,
                     Telefon,
                    Mail,
                    CONCAT(Strada, ' ', Numar, ', ', Oras, ', ', Judet) AS Adresa,
                    DataNasterii,
                    DataAngajarii,
                    Salariu
                FROM Angajati
                ");

                    break;

                case 'Clienti':
                    $tableData = DB::select("
                SELECT
                    IDClient as ID,
                    CONCAT(Nume, ' ', Prenume) AS Nume,
                    PersoanaJuridica AS Juridica,
                    CNP_CUI AS 'CNP/CUI',
                    Telefon,
                    Mail,
                    CONCAT(Strada, ' ', Numar, ', ', Oras, ', ', Judet) AS Adresa,
                    DataNasterii,
                    PuncteLoialitate
                FROM Clienti
                ");


                    break;

                    // case 'Clienti':
                    //     $tableData = DB::select("
                    // SELECT
                    //     CONCAT(Nume, ' ', Prenume) AS Nume,
                    //     PersoanaJuridica AS Juridica,
                    //     CNP_CUI AS 'CNP/CUI',
                    //     Telefon,
                    //     Mail,
                    //     CONCAT(Strada, ' ', Numar, ', ', Oras, ', ', Judet) AS Adresa,
                    //     DataNasterii,
                    //     PuncteLoialitate
                    // FROM Clienti
                    // ");


                    //     break;

                case 'Dispozitive':
                    $tableData = DB::select("
                    SELECT
                    IDDispozitiv as ID,
                    SerialNumber,
                        DenumireProducator,
                        DenumireModel,
                        GarantieValida
                    FROM Dispozitive
                    ");


                    break;
                case 'Piese':
                    $tableData = DB::select("
                        SELECT
                        IDPiesa as ID,
                            DenumireProducator,
                            DenumireModel,
                            Stoc,
                            PretPeBuc,
                            Lot
                        FROM Piese
                        ");


                    break;


                case 'Unelte':
                    $tableData = DB::select("
                        SELECT
                        IDUnealta as ID,
                            DenumireProducator,
                            DenumireModel,
                            Stoc

                        FROM Unelte
                        ");


                    break;

                default:
                    // Pentru alte tabele, afișăm toate datele fără JOIN-uri
                    $tableData = DB::select("SELECT * FROM $selectedTable");
            }
        }

        // Interogări simple
        $clientsWithExpiredWarranty = DB::select("
        SELECT DISTINCT Clienti.Nume, Clienti.Prenume, Clienti.Telefon, CONCAT(Dispozitive.DenumireProducator, ' - ', Dispozitive.DenumireModel) AS ProducatorModel
        FROM Clienti
        JOIN Reparatii ON Clienti.IDClient = Reparatii.IDClient
        JOIN Dispozitive ON Reparatii.IDDispozitiv = Dispozitive.IDDispozitiv
        WHERE Dispozitive.GarantieValida < NOW();
        ");

        // $toolsOver20Hours = DB::select("
        // SELECT Unelte.DenumireProducator, Unelte.DenumireModel, SUM(UnelteReparatii.NrOreProcedura) AS TotalOre
        // FROM Unelte
        // JOIN UnelteReparatii ON Unelte.IDUnealta = UnelteReparatii.IDUnealta
        // GROUP BY Unelte.DenumireProducator, Unelte.DenumireModel, Unelte.IDUnealta
        // HAVING TotalOre > 20;

        // ");

        $toolsOver20Hours = DB::select("
    SELECT DenumireProducator, DenumireModel, TotalOre
    FROM (
        SELECT Unelte.IDUnealta, Unelte.DenumireProducator, Unelte.DenumireModel, SUM(UnelteReparatii.NrOreProcedura) AS TotalOre
        FROM Unelte
        JOIN UnelteReparatii ON Unelte.IDUnealta = UnelteReparatii.IDUnealta
        GROUP BY Unelte.IDUnealta, Unelte.DenumireProducator, Unelte.DenumireModel
    ) AS UnelteOre
    WHERE TotalOre > 20;
");


        // $clientsWithLoyaltyPoints = DB::select("
        // SELECT Clienti.IDClient, Clienti.Nume, Clienti.Prenume, Clienti.PuncteLoialitate
        // FROM Reparatii
        // JOIN Clienti ON Reparatii.IDClient = Clienti.IDClient
        // WHERE Clienti.PuncteLoialitate > 100
        // GROUP BY Clienti.IDClient, Clienti.Nume, Clienti.Prenume, Clienti.PuncteLoialitate;

        // ");

        // Interogare cu pragul variabil
        $clientsWithLoyaltyPoints = DB::select("
    SELECT Clienti.IDClient, Clienti.Nume, Clienti.Prenume, Clienti.PuncteLoialitate
    FROM Reparatii
    JOIN Clienti ON Reparatii.IDClient = Clienti.IDClient
    WHERE Clienti.PuncteLoialitate > ?
    GROUP BY Clienti.IDClient, Clienti.Nume, Clienti.Prenume, Clienti.PuncteLoialitate
", [$loyaltyPointsThreshold]);

        // Interogări complexe
        // $clientsWithExpensiveRepairs = DB::select("
        // SELECT Clienti.Nume, Clienti.Prenume, Clienti.Telefon, SUM(Reparatii.Cost) AS TotalCostReparatii
        // FROM Clienti
        // JOIN Reparatii ON Clienti.IDClient = Reparatii.IDClient
        // GROUP BY Clienti.IDClient, Clienti.Nume, Clienti.Prenume, Clienti.Telefon
        // HAVING TotalCostReparatii > 1000;

        // ");

        //         $clientsWithExpensiveRepairs = DB::select("
        //     SELECT Nume, Prenume, Telefon, TotalCostReparatii
        //     FROM (
        //         SELECT Clienti.IDClient, Clienti.Nume, Clienti.Prenume, Clienti.Telefon, SUM(Reparatii.Cost) AS TotalCostReparatii
        //         FROM Clienti
        //         JOIN Reparatii ON Clienti.IDClient = Reparatii.IDClient
        //         GROUP BY Clienti.IDClient, Clienti.Nume, Clienti.Prenume, Clienti.Telefon
        //     ) AS ClientiReparatii
        //     WHERE TotalCostReparatii > 1000;
        // ");

        $clientsWithExpensiveRepairs = DB::select("
SELECT DISTINCT Clienti.Nume, Clienti.Prenume, Clienti.Telefon,
(SELECT SUM(Reparatii.Cost)
    FROM Reparatii
    WHERE Reparatii.IDClient = Clienti.IDClient
) AS TotalCostReparatii
FROM Clienti
WHERE (SELECT SUM(Reparatii.Cost)
    FROM Reparatii
    WHERE Reparatii.IDClient = Clienti.IDClient
) > 1000;
");


        //     $employeesWithPendingRepairs = DB::select("
        // SELECT Nume, Prenume
        // FROM Angajati
        // WHERE IDAngajat IN (
        //     SELECT IDAngajat
        //     FROM Reparatii
        //     WHERE Status IN (0, 1)
        //     GROUP BY IDAngajat
        //     HAVING COUNT(IDReparatie) > 3
        // )
        //     ");

        $employeesWithPendingRepairs = DB::select("
    SELECT Nume, Prenume
    FROM Angajati
    WHERE IDAngajat IN (
        SELECT IDAngajat
        FROM Reparatii
        WHERE Status IN (0, 1)
        GROUP BY IDAngajat
        HAVING COUNT(IDReparatie) > ?
    )
", [$minRepairs]);

        //     $partsToRestock = DB::select("
        // SELECT DenumireProducator, DenumireModel, Stoc
        // FROM Piese
        // WHERE IDPiesa IN (
        //     SELECT IDPiesa
        //     FROM PieseReparatii
        //     GROUP BY IDPiesa
        //     HAVING SUM(NumarBucati) > 3
        // ) AND Stoc < 5
        //     ");
        $partsToRestock = DB::select("
    SELECT Piese.DenumireProducator, Piese.DenumireModel, Piese.Stoc
    FROM Piese
    JOIN (
        SELECT IDPiesa
        FROM PieseReparatii
        GROUP BY IDPiesa
        HAVING SUM(NumarBucati) > 3
    ) AS PieseFolosite ON Piese.IDPiesa = PieseFolosite.IDPiesa
    WHERE Piese.Stoc < 5;
");


        $employeesWithExpensiveRepairs = DB::select("
    SELECT Nume, Prenume
    FROM Angajati
    WHERE IDAngajat IN (
        SELECT IDAngajat
        FROM Reparatii
        GROUP BY IDAngajat
        HAVING SUM(Cost) > 5000
    )
        ");

        $employeeRepairStats = DB::select("
        SELECT Angajati.Nume, Angajati.Prenume,
        SUM(CASE WHEN Reparatii.Status = 0 THEN 1 ELSE 0 END) AS Neincepute,
        SUM(CASE WHEN Reparatii.Status = 1 THEN 1 ELSE 0 END) AS InReparatie,
        SUM(CASE WHEN Reparatii.Status = 2 THEN 1 ELSE 0 END) AS Finalizate
 FROM Angajati
 LEFT JOIN Reparatii ON Angajati.IDAngajat = Reparatii.IDAngajat
 GROUP BY Angajati.IDAngajat, Angajati.Nume, Angajati.Prenume;

        ");

        // Returnăm datele către view
        return view('dashboard', [
            'tables' => $relevantTables,
            'selectedTable' => $selectedTable,
            'tableData' => $tableData,
            'primaryKey' => $primaryKey,

            'clientsWithExpiredWarranty' => $clientsWithExpiredWarranty,
            'toolsOver20Hours' => $toolsOver20Hours,
            'clientsWithLoyaltyPoints' => $clientsWithLoyaltyPoints,
            'clientsWithExpensiveRepairs' => $clientsWithExpensiveRepairs,
            'employeesWithPendingRepairs' => $employeesWithPendingRepairs,
            'partsToRestock' => $partsToRestock,
            'employeesWithExpensiveRepairs' => $employeesWithExpensiveRepairs,
            'employeeRepairStats' => $employeeRepairStats,

            'clientsWithLoyaltyPoints' => $clientsWithLoyaltyPoints,
            'loyaltyPointsThreshold' => $loyaltyPointsThreshold,

            'employeesWithPendingRepairs' => $employeesWithPendingRepairs,
            'minRepairs' => $minRepairs,

        ]);
    }

    private function getPrimaryKey($table)
    {
        $key = DB::select("
        SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = DATABASE()
          AND TABLE_NAME = ?
          AND COLUMN_KEY = 'PRI'
    ", [$table]);

        return $key[0]->COLUMN_NAME ?? 'ID';
    }

    public function deleteEntry($table, $id)
    {
        $primaryKey = $this->getPrimaryKey($table);
        DB::delete("DELETE FROM $table WHERE $primaryKey = ?", [$id]);

        //return redirect()->route('dashboard')->with('success', 'Intrarea a fost ștearsă.');
        return redirect('dashboard?table=' . $table)->with('success', 'Intrarea a fost ștearsă cu succes.');
    }

    // public function editEntry($table, $id)
    // {
    //     $primaryKey = $this->getPrimaryKey($table);
    //     $entry = DB::select("SELECT * FROM $table WHERE $primaryKey = ?", [$id]);

    //     return view('editEntry', ['entry' => $entry[0], 'table' => $table]);
    // }


    public function editEntry($table, $id)
    {
        // Determinăm cheia primară a tabelului
        $primaryKey = $this->getPrimaryKey($table);

        // Selectăm intrarea specifică
        $entry = DB::selectOne("SELECT * FROM $table WHERE $primaryKey = ?", [$id]);

        return view('editEntry', [
            'entry' => $entry,
            'table' => $table,
            'primaryKey' => $primaryKey // Transmitem cheia primară
        ]);
    }


    // Actualizează intrarea
    // public function updateEntry(Request $request, $table, $id)
    // {
    //     $data = $request->except(['_token', '_method']);

    //     $setClause = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
    //     $values = array_values($data);
    //     $values[] = $id;

    //     $query = "UPDATE $table SET $setClause WHERE ID = ?";
    //     DB::statement($query, $values);

    //     return redirect()->route('dashboard')->with('success', 'Intrarea a fost actualizată cu succes.');
    // }
    public function updateEntry(Request $request, $table, $id)
    {
        // Determinăm cheia primară a tabelului
        $primaryKey = $this->getPrimaryKey($table);

        // Preluăm toate datele trimise, excluzând _token și _method
        $data = $request->except(['_token', '_method']);

        // Construim setarea câmpurilor pentru actualizare
        $setClause = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
        $values = array_values($data);
        $values[] = $id;

        // Interogare SQL pentru actualizare
        $query = "UPDATE $table SET $setClause WHERE $primaryKey = ?";
        DB::statement($query, $values);

        return redirect('dashboard?table=' . $table)->with('success', 'Intrarea a fost actualizată cu succes.');
    }

    public function getEntry($table, $id)
    {
        $primaryKey = $this->getPrimaryKey($table);
        $entry = DB::selectOne("SELECT * FROM $table WHERE $primaryKey = ?", [$id]);

        return response()->json($entry);
    }

    public function createEntry($table)
    {
        // Determinăm numele coloanelor tabelului
        $columns = DB::select("
        SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = DATABASE()
          AND TABLE_NAME = ?
    ", [$table]);

        return view('partials.createForm', [
            'columns' => $columns,
            'table' => $table
        ]);
    }

    public function storeEntry(Request $request, $table)
    {
        // Construim query-ul pentru inserare
        $data = $request->except('_token');
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $values = array_values($data);

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        DB::statement($query, $values);

        return redirect('dashboard?table=' . $table)->with('success', 'Intrarea a fost adăugată cu succes.');
    }

    // public function simpleQueries()
    // {
    //     $clientsWithExpiredWarranty = DB::select("
    //     SELECT Clienti.Nume, Clienti.Prenume, Clienti.Telefon
    //     FROM Clienti
    //     JOIN Dispozitive ON Clienti.IDClient = Dispozitive.IDClient
    //     WHERE Dispozitive.GarantieValida < NOW()
    // ");

    //     $toolsOver20Hours = DB::select("
    //     SELECT Unelte.DenumireProducator, Unelte.DenumireModel, SUM(UnelteReparatii.NrOreProcedura) AS TotalOre
    //     FROM Unelte
    //     JOIN UnelteReparatii ON Unelte.IDUnealta = UnelteReparatii.IDUnealta
    //     GROUP BY Unelte.IDUnealta
    //     HAVING TotalOre > 20
    // ");

    //     $clientsWithLoyaltyPoints = DB::select("
    //     SELECT Reparatii.IDReparatie, Clienti.Nume, Clienti.Prenume, Clienti.PuncteLoialitate
    //     FROM Reparatii
    //     JOIN Clienti ON Reparatii.IDClient = Clienti.IDClient
    //     WHERE Clienti.PuncteLoialitate > 100
    // ");

    //     return view('dashboard', [
    //         'clientsWithExpiredWarranty' => $clientsWithExpiredWarranty,
    //         'toolsOver20Hours' => $toolsOver20Hours,
    //         'clientsWithLoyaltyPoints' => $clientsWithLoyaltyPoints,
    //     ]);
    // }

    // public function complexQueries()
    // {
    //     $clientsWithExpensiveRepairs = DB::select("
    //     SELECT Nume, Prenume, Telefon
    //     FROM Clienti
    //     WHERE IDClient IN (
    //         SELECT IDClient
    //         FROM Reparatii
    //         WHERE Cost > 1000
    //     )
    // ");

    //     $employeesWithPendingRepairs = DB::select("
    //     SELECT Nume, Prenume
    //     FROM Angajati
    //     WHERE IDAngajat IN (
    //         SELECT IDAngajat
    //         FROM Reparatii
    //         WHERE Status IN (0, 1)
    //         GROUP BY IDAngajat
    //         HAVING COUNT(IDReparatie) > 3
    //     )
    // ");

    //     $partsToRestock = DB::select("
    //     SELECT DenumireProducator, DenumireModel, Stoc
    //     FROM Piese
    //     WHERE IDPiesa IN (
    //         SELECT IDPiesa
    //         FROM PieseReparatii
    //         GROUP BY IDPiesa
    //         HAVING SUM(NumarBucati) > 3
    //     ) AND Stoc < 5
    // ");

    //     $employeesWithExpensiveRepairs = DB::select("
    //     SELECT Nume, Prenume
    //     FROM Angajati
    //     WHERE IDAngajat IN (
    //         SELECT IDAngajat
    //         FROM Reparatii
    //         GROUP BY IDAngajat
    //         HAVING SUM(Cost) > 5000
    //     )
    //     ");

    //     return view('dashboard', [
    //         'clientsWithExpensiveRepairs' => $clientsWithExpensiveRepairs,
    //         'employeesWithPendingRepairs' => $employeesWithPendingRepairs,
    //         'partsToRestock' => $partsToRestock,
    //         'employeesWithExpensiveRepairs' => $employeesWithExpensiveRepairs,
    //     ]);
    // }
}
