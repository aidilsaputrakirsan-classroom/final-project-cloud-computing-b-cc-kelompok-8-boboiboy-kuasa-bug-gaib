<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Admin Aplikasi Wisata">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin - Wisata</title>

    <!-- Favicon and Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="/path/to/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/path/to/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/path/to/apple-touch-icon.png">
    <link rel="manifest" href="/path/to/site.webmanifest">
    <link rel="mask-icon" href="/path/to/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="bg-background text-dark">
    
    <?php if (isset($component)) { $__componentOriginalf818c67b6eb448edb731318e48f2e69b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf818c67b6eb448edb731318e48f2e69b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.navbar','data' => ['name' => 'joko','email' => 'joko@gmail.com','image' => 'https://cdn-icons-png.flaticon.com/512/149/149071.png']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'joko','email' => 'joko@gmail.com','image' => 'https://cdn-icons-png.flaticon.com/512/149/149071.png']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf818c67b6eb448edb731318e48f2e69b)): ?>
<?php $attributes = $__attributesOriginalf818c67b6eb448edb731318e48f2e69b; ?>
<?php unset($__attributesOriginalf818c67b6eb448edb731318e48f2e69b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf818c67b6eb448edb731318e48f2e69b)): ?>
<?php $component = $__componentOriginalf818c67b6eb448edb731318e48f2e69b; ?>
<?php unset($__componentOriginalf818c67b6eb448edb731318e48f2e69b); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginal037203d46cdd29a9086d6dc7fe8ee9b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal037203d46cdd29a9086d6dc7fe8ee9b2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.aside','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.aside'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal037203d46cdd29a9086d6dc7fe8ee9b2)): ?>
<?php $attributes = $__attributesOriginal037203d46cdd29a9086d6dc7fe8ee9b2; ?>
<?php unset($__attributesOriginal037203d46cdd29a9086d6dc7fe8ee9b2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal037203d46cdd29a9086d6dc7fe8ee9b2)): ?>
<?php $component = $__componentOriginal037203d46cdd29a9086d6dc7fe8ee9b2; ?>
<?php unset($__componentOriginal037203d46cdd29a9086d6dc7fe8ee9b2); ?>
<?php endif; ?>

    
    <main class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg mt-14 bg-white">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/final-project-cloud-computing-b-cc-kelompok-8-boboiboy-kuasa-bug-gaib/Nusatarawisata-kaltim/resources/views/layouts/admin.blade.php ENDPATH**/ ?>