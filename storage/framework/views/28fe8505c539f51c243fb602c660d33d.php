







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
        <form action="<?php echo e(route('storeEntry', ['table' => $table])); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <label for="<?php echo e($column->COLUMN_NAME); ?>"><?php echo e(ucfirst($column->COLUMN_NAME)); ?></label>


                    <?php if(str_contains($column->COLUMN_NAME, 'Data') || str_contains($column->COLUMN_NAME, 'GarantieV')): ?>
                        <!-- Câmpurile care conțin "Data" -->
                        <input type="date" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'ID')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('Doar daca e necesar'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'CNP')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('ex: 123546453345'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'Nume')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('ex: Ionescu'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'Prenume')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('ex: Ion'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'Salariu')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('ex: 2500'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'Numar') || str_contains($column->COLUMN_NAME, 'NrOre')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('ex: 3'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'PersoanaJuridica')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('x(nu) / v(da)'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'Status')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('0(neinceputa) / 1(in lucru) / 2(finalizata)'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'Discount')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('Procente - 20 adica 20%'); ?>">
                    <?php elseif(str_contains($column->COLUMN_NAME, 'PuncteLoialitate') ||
                            str_contains($column->COLUMN_NAME, 'Stoc') ||
                            str_contains($column->COLUMN_NAME, 'Lot') ||
                            str_contains($column->COLUMN_NAME, 'PretPeBuc') ||
                            str_contains($column->COLUMN_NAME, 'Cost')): ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e('ex: 120'); ?>">
                    <?php else: ?>
                        <input type="text" name="<?php echo e($column->COLUMN_NAME); ?>" class="form-control"
                            placeholder="<?php echo e($column->COLUMN_NAME === 'Mail' ? 'ex: user@domain.com' : ($column->COLUMN_NAME === 'Telefon' ? 'ex: 0721234567' : 'Completează...')); ?>">
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <button type="submit" class="btn btn-success mt-3">Adaugă</button>
        </form>
    </div>
</body>

</html>
<?php /**PATH /Users/armandursei/Desktop/TemaBDLaravel/app/resources/views/partials/createForm.blade.php ENDPATH**/ ?>