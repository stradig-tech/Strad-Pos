<?php $__env->startSection('title', 'Currency'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_create')): ?>
  <div class="mt-n5 mb-3 d-flex justify-content-end">
    <a href="<?php echo e(route('backend.admin.currencies.create')); ?>" class="btn bg-gradient-primary">
      <i class="fas fa-plus-circle"></i>
      Add New
    </a>
  </div>
  <?php endif; ?>
  <div class="card-body p-2 p-md-4 pt-0">
    <div class="row g-4">
      <div class="col-md-12">
        <div class="card-body p-0" id="table_data">
          <table id="datatables" class="table table-hover">
            <thead>
              <tr>
                <th data-orderable="false" style="width: 50px;">Sl No</th>
                <th>Name</th>
                <th>Code</th>
                <th>Symbol</th>
                <th data-orderable="false">Action</th>
              </tr>
            </thead>
          </table>
          <!-- Pagination Links -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script type="text/javascript">
  $(function() {
    let table = $('#datatables').DataTable({
      processing: true,
      serverSide: true,
      ordering: true,
      order: [
        [1, 'asc']
      ],
      ajax: {
        url: "<?php echo e(route('backend.admin.currencies.index')); ?>"
      },

      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'code',
          name: 'code'
        },
        {
          data: 'symbol',
          name: 'symbol'
        },
        {
          data: 'action',
          name: 'action'
        },
      ]
    });
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/settings/currencies/index.blade.php ENDPATH**/ ?>