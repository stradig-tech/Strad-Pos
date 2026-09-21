<?php $__env->startSection('title', 'Invoice_'.$order->id); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-body">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row mb-4">
        <div class="col-4">
          <h2 class="page-header">
            <?php if(readConfig('is_show_logo_invoice')): ?>
            <img src="<?php echo e(assetImage(readconfig('site_logo'))); ?>" height="40" width="40" alt="Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
            <?php endif; ?>
            <?php if(readConfig('is_show_site_invoice')): ?><?php echo e(readConfig('site_name')); ?> <?php endif; ?>
          </h2>
        </div>
        <div class="col-4">
          <h4 class="page-header">Invoice</h4>
        </div>
        <div class="col-4">
          <small class="float-right text-small">Date: <?php echo e(date('d/m/Y')); ?></small>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-5 invoice-col">
          <?php if(readConfig('is_show_customer_invoice')): ?>
          To
          <address>
            <strong>Name: <?php echo e($order->customer->name??"N/A"); ?></strong><br>
            Address: <?php echo e($order->customer->address??"N/A"); ?><br>
            Phone: <?php echo e($order->customer->phone??"N/A"); ?><br>
          </address>
          <?php endif; ?>
        </div>
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <?php if(readConfig('is_show_site_invoice')): ?><strong>Name:<?php echo e(readConfig('site_name')); ?></strong><br> <?php endif; ?>
            <?php if(readConfig('is_show_address_invoice')): ?>Address: <?php echo e(readConfig('contact_address')); ?><br><?php endif; ?>
            <?php if(readConfig('is_show_phone_invoice')): ?>Phone: <?php echo e(readConfig('contact_phone')); ?><br><?php endif; ?>
            <?php if(readConfig('is_show_email_invoice')): ?>Email: <?php echo e(readConfig('contact_email')); ?><br><?php endif; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          Info <br>
          Sale ID #<?php echo e($order->id); ?><br>
          Sale Date: <?php echo e(date('d/m/Y', strtotime($order->created_at))); ?><br>
          <!-- <br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567 -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SN</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price <?php echo e(currency()->symbol??''); ?></th>
                <th>Subtotal <?php echo e(currency()->symbol??''); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->index + 1); ?></td>
                <td><?php echo e($item->product->name); ?></td>
                <td><?php echo e($item->quantity); ?> <?php echo e(optional($item->product->unit)->short_name); ?></td>
                <td>
                  <?php echo e($item->discounted_price); ?>

                  <?php if($item->price>$item->discounted_price): ?>
                  <br><del><?php echo e($item->price); ?></del>
                  <?php endif; ?>
                </td>
                <td><?php echo e($item->total); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <!-- <p class="lead">Payment:Cash Paid</p> -->
          <!-- <small class="lead text-small text-bold">Payment:Cash Paid</small> -->
          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            <?php if(readConfig('is_show_note_invoice')): ?><?php echo e(readConfig('note_to_customer_invoice')); ?><?php endif; ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <!-- <p class="lead">Amount Due 2/22/2014</p> -->

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td class="text-right"><?php echo e(currency()->symbol.' '.number_format($order->sub_total,2,'.',',')); ?></td>
              </tr>
              <tr>
                <th>Discount:</th>
                <td class="text-right"><?php echo e(currency()->symbol.' '.number_format($order->discount,2,'.',',')); ?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td class="text-right"><?php echo e(currency()->symbol.' '.number_format($order->total,2,'.',',')); ?></td>
              </tr>
              <tr>
                <th>Paid:</th>
                <td class="text-right"><?php echo e(currency()->symbol.' '.number_format($order->paid + $order->change_amount,2,'.',',')); ?></td>
              </tr>
              <?php if($order->change_amount > 0): ?>
              <tr>
                <th>Change:</th>
                <td class="text-right"><?php echo e(currency()->symbol.' '.number_format($order->change_amount,2,'.',',')); ?></td>
              </tr>
              <?php endif; ?>
              <tr>
                <th>Due:</th>
                <td class="text-right"><?php echo e(currency()->symbol.' '.number_format($order->due,2,'.',',')); ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row no-print">
        <div class="col-12">
          <button type="button" onclick="window.print()" class="btn btn-success float-right"><i class="fas fa-print"></i> Print</a>
          </button>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
  .invoice {
    border: none !important;
  }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
<script>
  window.addEventListener("load", window.print());
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/orders/print-invoice.blade.php ENDPATH**/ ?>