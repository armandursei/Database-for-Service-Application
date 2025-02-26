<!DOCTYPE html>
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
            <?php $__currentLoopData = $angajati; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $angajat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($angajat->IDAngajat); ?></td>
                    <td><?php echo e($angajat->Nume); ?></td>
                    <td><?php echo e($angajat->Prenume); ?></td>
                    <td><?php echo e($angajat->Mail); ?></td>
                    <td><?php echo e($angajat->Telefon); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($angajat->DataAngajarii)->format('Y-m-d')); ?></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH /Users/armandursei/Desktop/TemaBDLaravel/app/resources/views/pagina1.blade.php ENDPATH**/ ?>