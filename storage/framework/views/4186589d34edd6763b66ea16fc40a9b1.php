<!-- resources/views/guestbook/create.blade.php -->


<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/create.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="create-container">
            <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form class="create-form" action="<?php echo e(route('guestbook.create')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="create-card">
                    <label for="user_name" class="create-form-label">Name:</label>
                    <input type="text" class="create-form-control" id="user_name" name="user_name"
                           value="<?php echo e(auth()->user()->name); ?>" required>
                </div>

                <div class="create-card">
                    <label for="email" class="create-form-label">Email:</label>
                    <input type="email" class="create-form-control" id="email" name="email" value="<?php echo e(auth()->user()->email); ?>"
                           required>
                </div>

                <div class="create-card">
                    <label for="text" class="create-form-label">Text:</label>
                    <textarea class="create-form-control" id="text" name="text" required></textarea>
                </div>

                <div class="create-card">
                    <?php echo captcha_img(); ?>

                    <input type="text" id="captcha" name="captcha" required>
                </div>

                <button type="submit" class="btn btn-primary">Add comment</button>
            </form>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/guestbook/create.blade.php ENDPATH**/ ?>