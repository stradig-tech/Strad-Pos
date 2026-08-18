<?php $__env->startSection('title', 'Permissions'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_view')): ?>
    <div class="mt-n5 mb-3 d-flex justify-content-end">
        <a href="<?php echo e(route('backend.admin.roles')); ?>" class="btn bg-gradient-primary">
            <i class="fas fa-ruler-vertical"></i>
            Roles
        </a>
    </div>
    <?php endif; ?>
    <div class="card-body">
        <div class="row">
            <!-- <?php if(env('APP_ENV') == 'local'): ?>
                    <div class="col-md-12">
                        <fieldset>
                            <form action="<?php echo e(route('backend.admin.permissions.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="Enter permission name" name="name"
                                                value="<?php echo e(old('name')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <select class="form-control" id="floatingSelectGrid" name="type" required>
                                                <option value="">-- Select a type --</option>
                                                <option value="1">Normal</option>
                                                <option value="2">Resource</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn bg-gradient-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                        <hr>
                    </div>
                <?php endif; ?> -->

            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>

                            <!-- <?php if(env('APP_ENV') == 'local'): ?>
                                    <th class="text-center">Actions</th>
                                <?php endif; ?> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(snakeToTitle($data->name)); ?></td>
                            <td><?php echo e($data->name); ?></td>

                            <!-- <?php if(env('APP_ENV') == 'local'): ?>
                                        <td>
                                            <div class="text-center">
                                                <button title="Edit permission" type="button" class="btn bg-gradient-primary btn-xs"
                                                    data-toggle="modal" data-target="#editpermission-<?php echo e($data->id); ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <a title="Delete permission"
                                                    href="<?php echo e(route('backend.admin.permissions.delete', $data->id)); ?>"
                                                    type="button" class="btn btn-danger btn-xs"
                                                    onclick="return confirm('Are you sure ?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                            <div class="modal fade" id="editpermission-<?php echo e($data->id); ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <?php echo Form::open(['method' => 'put', 'route' => ['backend.admin.permissions.update', $data->id]]); ?>

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fs-5" id="exampleModalLabel">
                                                                <i class="fas fa-pencil-alt"></i>
                                                                Edit permission
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label class="control-label">Name:</label>
                                                                <?php echo Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'permission Name']); ?>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-secondary"
                                                                data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn bg-gradient-primary">
                                                                Save changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </div>
                                        </td>
                                    <?php endif; ?> -->
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/settings/permission/index.blade.php ENDPATH**/ ?>