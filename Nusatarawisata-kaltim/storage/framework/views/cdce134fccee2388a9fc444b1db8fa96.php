<?php $__env->startSection('content'); ?>
    <div class="dashboard">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['title' => 'Total Pengguna','value' => $totalUsers,'color' => 'blue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Total Pengguna','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalUsers),'color' => 'blue']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['title' => 'Total Destinasi','value' => $totalDestinations,'color' => 'green']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Total Destinasi','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalDestinations),'color' => 'green']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['title' => 'Total Kategori','value' => $totalCategories,'color' => 'purple']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Total Kategori','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalCategories),'color' => 'purple']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['title' => 'Total Ulasan','value' => $totalReviews,'color' => 'red']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Total Ulasan','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalReviews),'color' => 'red']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
        </div>

        
        <div class="mt-8 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Notifikasi Sistem</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                <div class="bg-yellow-100 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-yellow-800">Pengajuan Destinasi</h3>
                            <p class="text-2xl font-bold text-yellow-900">
                                <?php echo e($systemNotifications['pendingDestinations']); ?>

                            </p>
                        </div>
                        <a href="<?php echo e(route('admin.destination-submission.index', ['status' => 'pending'])); ?>"
                            class="text-yellow-700 hover:underline">
                            Tinjau
                        </a>
                    </div>
                </div>

                
                <div class="bg-blue-100 p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-blue-800">Akun Tidak Aktif</h3>
                            <p class="text-2xl font-bold text-blue-900"><?php echo e($systemNotifications['inactiveUsers']); ?></p>
                        </div>
                        <a href="<?php echo e(route('admin.users.index', ['status' => 'inactive'])); ?>"
                            class="text-blue-700 hover:underline">
                            Kelola
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12"></div>

        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4">Pertumbuhan Pengguna</h2>
                <canvas id="userGrowthChart"></canvas>
            </div>

            
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4">Destinasi per Kategori</h2>
                <canvas id="destinationCategoryChart"></canvas>
            </div>
        </div>

        
        <div class="mt-8 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Destinasi Terpopuler</h2>
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left p-2">Nama Destinasi</th>
                        <th class="text-left p-2">Jumlah Ulasan</th>
                        <th class="text-left p-2">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $popularDestinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-2"><?php echo e($destination->place_name); ?></td>
                            <td class="p-2"><?php echo e($destination->reviews_count); ?></td>
                            <td class="p-2"><?php echo e($destination->category->name); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Grafik Pertumbuhan Pengguna
            const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
            new Chart(userGrowthCtx, {
                type: 'line',
                data: {
                    labels: <?php echo $userGrowth->pluck('full_month_label'); ?>,
                    datasets: [{
                        label: 'Pertumbuhan Pengguna',
                        data: <?php echo $userGrowth->pluck('count'); ?>,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Pertumbuhan Pengguna per Bulan'
                        }
                    }
                }
            });

            // Grafik Distribusi Destinasi per Kategori
            const destinationCategoryCtx = document.getElementById('destinationCategoryChart').getContext('2d');
            new Chart(destinationCategoryCtx, {
                type: 'pie',
                data: {
                    labels: <?php echo $destinationByCategory->pluck('name'); ?>,
                    datasets: [{
                        data: <?php echo $destinationByCategory->pluck('destinations_count'); ?>,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 206, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(153, 102, 255)',
                            // Tambahkan warna lain sesuai kebutuhan
                        ]
                    }]
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/final-project-cloud-computing-b-cc-kelompok-8-boboiboy-kuasa-bug-gaib/Nusatarawisata-kaltim/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>