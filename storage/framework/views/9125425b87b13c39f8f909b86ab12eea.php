

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
        <form action="<?php echo e(route('updateEntry', ['table' => $table, 'id' => $entry->$primaryKey])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>

            <?php $__currentLoopData = (array) $entry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group">
                    <label for="<?php echo e($key); ?>"><?php echo e(ucfirst($key)); ?></label>
                    <input type="text" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>" class="form-control"
                        <?php echo e($key === $primaryKey ? 'readonly' : ''); ?>>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <button type="submit" class="btn btn-primary mt-3">Salvează</button>
        </form>
    </div>
</body>

</html>
<?php /**PATH /Users/armandursei/Desktop/TemaBDLaravel/app/resources/views/editEntry.blade.php ENDPATH**/ ?>