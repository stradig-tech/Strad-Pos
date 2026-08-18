<?php $__env->startSection('title', 'Update Currency'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <form action="<?php echo e(route('backend.admin.currencies.update',$currency->id)); ?>" method="post" class="accountForm"
      enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="card-body">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="name" class="form-label">
              Name
              <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" placeholder="Enter name" name="name"
              value="<?php echo e(old('name',$currency->name)); ?>" required>
          </div>
          <div class="mb-3 col-md-6">
            <label for="code" class="form-label">
              Code
              <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" placeholder="Enter Short cod" name="code"
              value="<?php echo e(old('code',$currency->code)); ?>" required>
          </div>
          <div class="mb-3 col-md-6">
            <label for="symbol" class="form-label">
              Symbol
              <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" placeholder="Enter symbol" name="symbol"
              value="<?php echo e(old('symbol',$currency->symbol)); ?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn bg-gradient-primary">Update</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('js/image-field.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/settings/currencies/edit.blade.php ENDPATH**/ ?>