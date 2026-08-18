<?php $__env->startSection('title', $role->name . ' Role Permission'); ?>

<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_view')): ?>
<div class="mt-n5 mb-3 d-flex justify-content-end">
    <a href="<?php echo e(route('backend.admin.roles')); ?>" class="btn bg-gradient-primary">
        <i class="fas fa-ruler-vertical"></i>
        Roles
    </a>
</div>
<?php endif; ?>
<div class="card">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('backend.admin.update.role-permissions', $role->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <table class="table">
                    <tbody>
                        <?php $__currentLoopData = $permissions->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td>
                                <?php
                                $per_found = null;

                                if (isset($role)) {
                                    $per_found = $role->hasPermissionTo($data->name) ?? null;
                                }

                                if (isset($user)) {
                                    $per_found = $user->hasDirectPermission($data->name);
                                }
                                ?>

                                <div
                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customSwitch<?php echo e($data->id); ?>" name="permissions[]"
                                        value="<?php echo e($data->name); ?>"
                                        <?php echo e($data->name == $per_found ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="customSwitch<?php echo e($data->id); ?>">
                                        <?php echo e(snakeToTitle($data->name)); ?>

                                    </label>
                                </div>

                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="text-center mb-3">
                    <button type="submit" class="btn bg-gradient-primary w-25"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/settings/role/permissions.blade.php ENDPATH**/ ?>