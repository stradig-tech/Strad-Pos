<?php if(isset($errors) && $errors->any()): ?>
    <div style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"
        class="toast align-items-center bg-danger border-0 text-white" role="alert" aria-live="assertive"
        data-delay="2000">
        <div class="toast-body">
            <svg height="25" width="25" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                overflow="visible" enable-background="new 0 0 32 32">
                <circle cx="16" cy="16" r="16" fill="#ffffff" class="fill-d72828"></circle>
                <path d="M14.5 25h3v-3h-3v3zm0-19v13h3V6h-3z" fill="#DC3545" class="fill-e6e6e6"></path>
            </svg>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error); ?>

                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>

<?php if(session()->has('success')): ?>
    <div style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"
        class="toast align-items-center bg-success border-0 text-white" role="alert" aria-live="assertive"
        data-delay="2000">
        <div class="toast-body">
            <svg height="25" width="25" viewBox="0 0 128 128" xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 128 128">
                <circle cx="64" cy="64" r="64" fill="#ffffff" class="fill-31af91"></circle>
                <path
                    d="M54.3 97.2 24.8 67.7c-.4-.4-.4-1 0-1.4l8.5-8.5c.4-.4 1-.4 1.4 0L55 78.1l38.2-38.2c.4-.4 1-.4 1.4 0l8.5 8.5c.4.4.4 1 0 1.4L55.7 97.2c-.4.4-1 .4-1.4 0z"
                    fill="#28a745" class="fill-ffffff"></path>
            </svg>
            <?php echo e(session('success')); ?>

        </div>
    </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"
        class="toast align-items-center bg-danger border-0 text-white" role="alert" aria-live="assertive"
        aria-atomic="true" data-delay="2000">
        <div class="toast-body">
            <svg height="25" width="25" viewBox="0 0 32 32" xml:space="preserve"
                xmlns="http://www.w3.org/2000/svg" overflow="visible" enable-background="new 0 0 32 32">
                <circle cx="16" cy="16" r="16" fill="#ffffff" class="fill-d72828"></circle>
                <path d="M14.5 25h3v-3h-3v3zm0-19v13h3V6h-3z" fill="#DC3545" class="fill-e6e6e6"></path>
            </svg>
            <?php echo e(session('error')); ?>

        </div>
    </div>
<?php endif; ?>

<?php if(session()->has('warning')): ?>
    <div style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"
        class="toast align-items-center bg-warning border-0 text-white" role="alert" aria-live="assertive"
        data-delay="2000">
        <div class="toast-body">
            <svg height="25" width="25" data-name="Layer 1" viewBox="0 0 64 64"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M30.16 11.51 6.84 51.9a2.13 2.13 0 0 0 1.84 3.19h46.64a2.13 2.13 0 0 0 1.84-3.19L33.84 11.51a2.13 2.13 0 0 0-3.68 0Z"
                    fill="#ffffff" class="fill-efcc00"></path>
                <path d="M29 46a3 3 0 1 1 3 3 2.88 2.88 0 0 1-3-3Zm1.09-4.66-.76-15h5.26l-.73 15Z" fill="#ffc107"
                    class="fill-353535"></path>
            </svg>
            <?php echo e(session('warning')); ?>

        </div>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toast = document.querySelector('.toast');

        if (toast) {
            toast.addEventListener('hidden.bs.toast', function() {
                toast.parentNode.removeChild(toast);
            });

            var toastInstance = new bootstrap.Toast(toast);
            toastInstance.show();

            var toastCloseButton = toast.querySelector('.close');
            if (toastCloseButton) {
                toastCloseButton.addEventListener('click', function() {
                    toastInstance.hide();
                });
            }
        }
    });
</script>
<?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/components/simple-alert.blade.php ENDPATH**/ ?>