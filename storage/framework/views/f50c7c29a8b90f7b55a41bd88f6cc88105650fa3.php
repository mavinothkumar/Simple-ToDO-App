<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>All Task(s)</h2>
                </div>
            </div>
            <div class="col-md-8 col-lg-offset-2">
                <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="panel
<?php if($task->type === 'public'): ?> <?php echo e('panel-primary'); ?> <?php else: ?> <?php echo e('panel-danger'); ?> <?php endif; ?>
">
                        <div class="panel-heading">
                            <?php echo e($task->title); ?> [<?php echo e($task->type); ?>]
                            <div class="pull-right">
                                Posted by <?php echo e($task->user->name); ?> | Created at <?php echo e($task->created_at->diffForHumans()); ?>

                            </div>
                        </div>

                        <div class="panel-body">
                            <h5>Deadline: <?php echo e($task->deadline); ?></h5>
                            <h4><?php echo e($task->description); ?></h4>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h1 class="text-center">Sorry no task yet posted!</h1>
                <?php endif; ?>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>