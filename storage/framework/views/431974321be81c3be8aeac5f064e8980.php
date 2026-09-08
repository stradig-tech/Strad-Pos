<nav class="main-header navbar navbar-expand navbar-white navbar-light ds-navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
        
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale_create')): ?>
        <li class="nav-item mr-3">
            <a class="nav-link btn bg-gradient-primary text-white font-weight-bold shadow-sm" 
               href="<?php echo e(route('backend.admin.cart.index')); ?>"
               style="border-radius: 8px; padding: 0.4rem 1.5rem; letter-spacing: 0.5px;">
                POS
            </a>
        </li>
        <?php endif; ?>

        <!-- Website Link -->
        <li class="nav-item mr-2">
            <a class="nav-link" href="<?php echo e(url('/')); ?>" target="_blank" title="View Website">
                <i class="fas fa-globe" style="font-size: 1.25rem; color: #64748b;"></i>
            </a>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown mr-3">
            <?php
                $unreadNotifications = auth()->user()->unreadNotifications;
            ?>
            <a class="nav-link position-relative" data-toggle="dropdown" href="#">
                <i class="far fa-bell" style="font-size: 1.25rem; color: #64748b;"></i>
                <?php if($unreadNotifications->count() > 0): ?>
                <span class="badge badge-primary navbar-badge" 
                      style="border-radius: 50%; padding: 4px 5px; font-size: 0.6rem; top: 2px; right: 0; min-width: 18px; border: 2px solid #fff;"><?php echo e($unreadNotifications->count()); ?></span>
                <?php endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ds-dropdown">
                <span class="dropdown-item dropdown-header"><?php echo e($unreadNotifications->count()); ?> Notification(s)</span>
                <div class="dropdown-divider"></div>
                
                <?php $__empty_1 = true; $__currentLoopData = $unreadNotifications->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('backend.admin.notifications.read', $notification->id)); ?>" class="dropdown-item" style="white-space: normal; min-width: 300px;">
                    <div class="d-flex w-100 justify-content-between align-items-start">
                        <span><i class="fas fa-shopping-cart mr-2 mt-1"></i> <?php echo e($notification->data['message'] ?? 'New Notification'); ?></span>
                        <span class="text-muted text-sm ml-3" style="white-space: nowrap;"><?php echo e($notification->created_at->diffForHumans()); ?></span>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <a href="#" class="dropdown-item text-center text-muted">
                    No new notifications
                </a>
                <div class="dropdown-divider"></div>
                <?php endif; ?>
                
                <a href="<?php echo e(route('backend.admin.notifications.index')); ?>" class="dropdown-item dropdown-footer text-center">See All Notifications</a>
                <a href="<?php echo e(route('backend.admin.notifications.markAllAsRead')); ?>" class="dropdown-item dropdown-footer text-primary font-weight-bold text-center border-top">Mark All as Read</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center p-0" data-toggle="dropdown" href="#" style="padding-right: 0.5rem !important;">
                <div class="d-flex align-items-center justify-content-center bg-light text-secondary rounded-circle elevation-1" style="width: 32px; height: 32px; border: 1px solid #e2e8f0;">
                    <i class="fas fa-user"></i>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right ds-dropdown">
                <a href="<?php echo e(route('backend.admin.profile')); ?>" class="dropdown-item">
                    <i class="fas fa-address-card mr-2 text-primary"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('logout')); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/layouts/navbar.blade.php ENDPATH**/ ?>