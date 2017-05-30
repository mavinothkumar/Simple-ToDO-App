<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-lg-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add new Task</div>

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('tasks.store')); ?>">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                    <label for="title" class="col-md-4 control-label">Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>" requiredd autofocus>

                                        <?php if($errors->has('title')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                    <label for="description" class="col-md-4 control-label">Description</label>

                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" name="description" requiredd></textarea>

                                        <?php if($errors->has('description')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('deadline') ? ' has-error' : ''); ?>">
                                    <label for="deadline" class="col-md-4 control-label">Deadline</label>

                                    <div class="col-md-6">
                                        <input type="text" id="deadline" class="form-control datepicker" name="deadline" requiredd />

                                        <?php if($errors->has('deadline')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('deadline')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                                    <label for="type" class="col-md-4 control-label">Task Type</label>

                                    <div class="col-md-6">
                                        <select name="type" id="type" class="form-control">
                                            <option value="public">Public</option>
                                            <option value="private">Private</option>
                                        </select>
                                        <?php if($errors->has('type')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('type')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add New Task
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>