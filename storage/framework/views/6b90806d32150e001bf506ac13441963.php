<?php $__env->startSection('title', 'Receipt_'.$order->id); ?>
<?php $__env->startSection('content'); ?>

<div class="card">
  <!-- Main content -->
  <div class="receipt-container mt-0" id="printable-section" style="max-width: <?php echo e($maxWidth); ?>; font-size: 12px; font-family: 'Courier New', Courier, monospace;">
    <div class="text-center">
      <?php if(readConfig('is_show_logo_invoice')): ?>
      <img src="<?php echo e(assetImage(readconfig('site_logo'))); ?>" height="30" width="70" alt="Logo">
      <?php endif; ?>
      <?php if(readConfig('is_show_site_invoice')): ?>
      <h3><?php echo e(readConfig('site_name')); ?></h3>
      <?php endif; ?>
      <?php if(readConfig('is_show_address_invoice')): ?><?php echo e(readConfig('contact_address')); ?><br><?php endif; ?>
      <?php if(readConfig('is_show_phone_invoice')): ?><?php echo e(readConfig('contact_phone')); ?><br><?php endif; ?>
      <?php if(readConfig('is_show_email_invoice')): ?><?php echo e(readConfig('contact_email')); ?><br><?php endif; ?>
    </div>
    <?php echo e('User: '.auth()->user()->name); ?><br>
    <?php echo e('Order: #'.$order->id); ?><br>
    <hr>
    <div class="row justify-content-between mx-auto">
      <div class="text-left">
        <?php if(readConfig('is_show_customer_invoice')): ?>
        <address>
          Name: <?php echo e($order->customer->name ?? 'N/A'); ?><br>
          Address: <?php echo e($order->customer->address ?? 'N/A'); ?><br>
          Phone: <?php echo e($order->customer->phone ?? 'N/A'); ?>

        </address>
        <?php endif; ?>
      </div>
      <div class="text-right">
        <address class="text-right">
          <p><?php echo e(date('d-M-Y')); ?></p>
          <p><?php echo e(date('h:i:s A')); ?></p>
        </address>
      </div>
    </div>
    <hr>
    <table style="width: 100%;">
      <thead>
        <tr>
          <th style="text-align: left;">Product</th>
          <th style="text-align: right;"></th>
          <!-- <th style="text-align: right;">Qty</th> -->
          <!-- <th style="text-align: right;">Price <?php echo e(currency()->symbol); ?></th> -->
          <th style="text-align: right;">Total <?php echo e(currency()->symbol); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($item->product->name); ?></td>
          <!-- <td class="text-right"><?php echo e($item->quantity); ?></td> -->
          <td class="text-right"><?php echo e($item->quantity); ?>*<?php echo e($item->discounted_price); ?></td>
          <td class="text-right"><?php echo e($item->total); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <hr>
    <div class="summary">
      <table style="width: 100%;">
        <tr>
          <td>Subtotal:</td>
          <td class="text-right"><?php echo e(number_format($order->sub_total, 2)); ?></td>
        </tr>
        <tr>
          <td>Discount:</td>
          <td class="text-right"><?php echo e(number_format($order->discount, 2)); ?></td>
        </tr>
        <tr>
          <td><strong>Total:</strong></td>
          <td class="text-right"><strong><?php echo e(number_format($order->total, 2)); ?></strong></td>
        </tr>
        <tr>
          <td>Paid:</td>
          <td class="text-right"><?php echo e(number_format($order->paid + $order->change_amount, 2)); ?></td>
        </tr>
        <?php if($order->change_amount > 0): ?>
        <tr>
          <td>Change:</td>
          <td class="text-right"><?php echo e(number_format($order->change_amount, 2)); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td>Due:</td>
          <td class="text-right"><?php echo e(number_format($order->due, 2)); ?></td>
        </tr>
      </table>
    </div>
    <hr>
    <div class="text-center">
      <p class="text-muted" style="font-size: 12px;"><?php if(readConfig('is_show_note_invoice')): ?><?php echo e(readConfig('note_to_customer_invoice')); ?><?php endif; ?></p>
    </div>
  </div>

  <!-- Print Button -->
  <div class="text-center mt-3 no-print pb-3">
    <button type="button" onclick="window.print()" class="btn bg-gradient-primary text-white"><i class="fas fa-print"></i> Print</button>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
  .receipt-container {
    border: 1px dotted #000;
    padding: 8px;
  }

  hr {
    border: none;
    border-top: 1px dashed #000;
    margin: 5px 0;
  }

  table {
    width: 100%;
  }

  td,
  th {
    padding: 2px 0;
  }

  .text-right {
    text-align: right;
  }

  @media print {
    @page {
      margin-top: 5px !important;
      margin-left: 0px !important;
      padding-left: 0px !important;
    }

    footer {
      display: none !important;
    }
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
  // Once the print dialog is closed (printed or cancelled), send the cashier
  // back to the POS page to start the next sale instead of leaving them on
  // the receipt. Guard so the redirect only fires once.
  var posUrl = "<?php echo e(route('backend.admin.cart.index')); ?>";
  var redirected = false;
  var goToPos = function () {
    if (redirected) return;
    redirected = true;
    window.location.href = posUrl;
  };
  window.addEventListener('afterprint', goToPos);
  window.print();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/orders/pos-invoice.blade.php ENDPATH**/ ?>