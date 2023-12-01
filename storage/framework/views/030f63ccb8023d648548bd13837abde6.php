<!-- resources/views/guestbook/index.blade.php -->

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="index-container">
            <h2 class="index-title">Comments</h2>
            <div class="index-sort">
                <p>Sort by:
                    <a class="index-sort-title" href="<?php echo e(route('guestbook.index', ['column' => 'created_at', 'direction' => $column === 'created_at' && $direction === 'asc' ? 'desc' : 'asc'])); ?>">Date</a>,
                    <a class="index-sort-title" href="<?php echo e(route('guestbook.index', ['column' => 'user_name', 'direction' => $column === 'user_name' && $direction === 'asc' ? 'desc' : 'asc'])); ?>">Username</a>,
                    <a class="index-sort-title" href="<?php echo e(route('guestbook.index', ['column' => 'email', 'direction' => $column === 'email' && $direction === 'asc' ? 'desc' : 'asc'])); ?>">E-mail</a>

                </p>
            </div>

            <table class="index-table" id="guestbook-table">
                <tbody>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="index-card-message-card">
                        <div class="index-card-body">
                            <div class="index-card-title">
                                <span class="index-card-nickname"><?php echo e($message->user_name); ?></span>: <?php echo e($message->text); ?>

                            </div>
                            <p class="index-card-text">
                                <small class="text-muted">Date: <?php echo e($message->created_at->format('Y-m-d H:i:s')); ?></small><br>
                                <small class="text-muted">E-mail: <?php echo e($message->email); ?></small>
                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($messages->appends(\Request::except('page'))->render()); ?>

        </div>

    </div>



    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('#guestbook-table th[data-sortable]').on('click', function () {
                const column = $(this).data('sortable');
                const direction = $(this).hasClass('asc') ? 'desc' : 'asc';

                window.location.href = "<?php echo e(route('guestbook.index')); ?>" +
                    "?column=" + column + "&direction=" + direction;
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/guestbook/index.blade.php ENDPATH**/ ?>