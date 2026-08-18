<?php $__env->startSection('title', 'Import Product'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <form action="<?php echo e(route('backend.admin.products.import')); ?>" method="post" class="accountForm"
      enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="card-body">
        <div class="row">
          <div class="mb-3 col-md-6">
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="file" id="exampleInputFile" required>
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <a class="input-group-text" href="<?php echo e(route('backend.admin.products.import',['download-demo' => true])); ?>"><i class="fas fa-download"></i> Demo</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-md-6">
            <button type="submit" class="btn btn-block bg-gradient-primary">Save</button>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
  .select2-container--default .select2-selection--single {
    height: calc(1.5em + 0.75rem + 2px) !important;
  }
</style>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('js/image-field.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/products/import.blade.php ENDPATH**/ ?>