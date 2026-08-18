<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $__env->yieldContent('title', 'Dashboard'); ?> | <?php echo e(readConfig('site_name')); ?>

    </title>

    <!-- FAVICON ICON -->
    <link rel="shortcut icon" href="<?php echo e(assetImage(readconfig('favicon_icon'))); ?>" type="image/svg+xml">

    <!-- FAVICON ICON APPLE -->
    <link href="<?php echo e(assetImage(readconfig('favicon_icon_apple'))); ?>" rel="apple-touch-icon">
    <link href="<?php echo e(assetImage(readconfig('favicon_icon_apple'))); ?>" rel="apple-touch-icon" sizes="72x72">
    <link href="<?php echo e(assetImage(readconfig('favicon_icon_apple'))); ?>" rel="apple-touch-icon" sizes="114x114">
    <link href="<?php echo e(assetImage(readconfig('favicon_icon_apple'))); ?>" rel="apple-touch-icon" sizes="144x144">

    <!-- Google Font: Inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.min.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/dropzone/min/dropzone.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datatable/datatable.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datatable/buttons.dataTables.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/custom-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/design-system.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/datatable-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animations.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/responsive-overrides.css')); ?>">
    <style>
        .image-upload-container {
            border: 2px dashed #8b9ee9;
            /* Dashed border color */
            border-radius: 8px;
            background-color: #f8f9fa;
            /* Light background color */
            display: flex;
            justify-content: center;
            /* Center the content */
            align-items: center;
            /* Center the content vertically */
            width: 100%;
            /* Make the container full width of its parent */
            height: 200px;
            /* Fixed height */
            cursor: pointer;
            /* Indicate clickability */
        }

        .thumb-preview {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            /* Prevents overflow */
        }

        #thumbnailPreview {
            max-width: 100%;
            max-height: 100%;
            /* Ensure it fits within the container */
            object-fit: cover;
            /* Maintain aspect ratio while covering the box */
        }

        .upload-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #8b9ee9;
            /* Text color */
            text-align: center;
        }

        .upload-text i {
            font-size: 24px;
            /* Icon size */
            margin-bottom: 5px;
            /* Space between icon and text */
        }
    </style>
    <?php echo $__env->yieldPushContent('style'); ?>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.jsx'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-theme="light">

    <?php if (isset($component)) { $__componentOriginalb08aa4239620a6eb290863e19f345b5e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb08aa4239620a6eb290863e19f345b5e = $attributes; } ?>
<?php $component = App\View\Components\SimpleAlert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('simple-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SimpleAlert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb08aa4239620a6eb290863e19f345b5e)): ?>
<?php $attributes = $__attributesOriginalb08aa4239620a6eb290863e19f345b5e; ?>
<?php unset($__attributesOriginalb08aa4239620a6eb290863e19f345b5e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb08aa4239620a6eb290863e19f345b5e)): ?>
<?php $component = $__componentOriginalb08aa4239620a6eb290863e19f345b5e; ?>
<?php unset($__componentOriginalb08aa4239620a6eb290863e19f345b5e); ?>
<?php endif; ?>

    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo e(assetImage(readconfig('site_logo'))); ?>" alt="Logo" height="60"
                width="60">
        </div> -->

        <!-- Navbar -->
        <?php echo $__env->make('backend.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-lightblue ds-sidebar">
            <!-- Brand Logo -->
            <a href="<?php echo e(route('frontend.home')); ?>" class="brand-link">
                <img src="<?php echo e(assetImage(readconfig('site_logo'))); ?>" alt="Logo"
                    class="brand-image ds-brand-logo">
                <span class="brand-text font-weight-bold"><?php echo e(readConfig('site_name')); ?></span>
            </a>

            <!-- Sidebar -->
            <?php echo $__env->make('backend.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- /.sidebar -->

        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper fade-in-up">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?php echo $__env->yieldContent('title'); ?>
                            </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">

                    <!-- content -->
                    <?php echo $__env->yieldContent('content'); ?>
                    <!-- /.content -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.Main content -->
        </div>
        <!-- /.content-wrapper -->

        <?php echo $__env->make('backend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/custom-script.js')); ?>"></script>
    <!-- dropzonejs -->
    <script src="<?php echo e(asset('plugins/dropzone/min/dropzone.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('assets/js/datatable/datatable.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/dataTables.buttons.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html><?php /**PATH C:\Users\DELL\OneDrive\Desktop\Mansib\Laravel- Web-project\StradPos\resources\views/backend/master.blade.php ENDPATH**/ ?>