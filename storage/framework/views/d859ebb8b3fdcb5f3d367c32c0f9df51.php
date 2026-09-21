<?php $__env->startSection('title', 'Transactions Sale #'.$order->id); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body p-2 p-md-4 pt-0">
    <div class="row g-4">
      <div class="col-md-12">
        <div class="card-body table-responsive p-0" id="table_data">
          <table id="datatables" class="table table-hover">
            <thead>
              <tr>
                <th data-orderable="false" style="width: 50px;">Sl No</th>
                <th>TransactionId</th>
                <th>Amount <?php echo e(currency()->symbol??''); ?></th>
                <th>Paid By</th>
                <th>Created</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $order->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr>
                <td><?php echo e($index + 1); ?></td>
                <td>#<?php echo e($transaction->id); ?></td>
                <td><?php echo e(number_format($transaction->amount,2,'.',',')); ?></td>
                <td><?php echo e($transaction->paid_by); ?></td>
                <td><?php echo e($transaction->created_at->format('M-d Y, h:i A')); ?></td>
                <td>
                  <a class="btn btn-success btn-sm" href="<?php echo e(route('backend.admin.collectionInvoice',$transaction->id)); ?>">Invoice</a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                <td colspan="5" class="text-center">No transaction found.</td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/orders/collection/index.blade.php ENDPATH**/ ?>