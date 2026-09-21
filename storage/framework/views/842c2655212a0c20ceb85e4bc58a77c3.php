<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('backend.admin.profile.update')); ?>" method="post" class="accountForm" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter full name"
                            name="name" value="<?php echo e($user->name); ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                            value="<?php echo e($user->email); ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="thumbnail">Profile Image</label>
                        <!-- <input type="file" class="form-control" name="profile_image"
                            onchange="previewThumbnail(this)">
                        <img class="img-fluid thumbnail-preview" src="<?php echo e(nullImg()); ?>" alt="preview-image"> -->
                        <div class="image-upload-container" id="imageUploadContainer">
                            <input type="file" class="form-control" name="profile_image" id="thumbnailInput" accept="image/*" style="display: none;">
                            <div class="thumb-preview" id="thumbPreviewContainer">
                                <img src="<?php echo e(asset('storage/' . $user->profile_image)); ?>" alt="Thumbnail Preview"
                                    class="img-thumbnail" id="thumbnailPreview" onerror="this.onerror=null; this.src='<?php echo e(asset('assets/images/no-image.png')); ?>'">
                                <div class="upload-text d-none">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Upload Image</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="font-weight-bold">Password change</h4>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password" class="form-label">Current password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password"
                            name="current_password" autocomplete="new-password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="new_password" class="form-label">New password</label>
                        <input type="password" class="form-control" id="new_password" placeholder="New password"
                            name="new_password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="confirmPassword" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password"
                            name="new_password_confirmation">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block bg-gradient-primary">Update</button>
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
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/profile/index.blade.php ENDPATH**/ ?>