<?php $__env->startSection('content'); ?>
    <div class="container mx-auto">
        <div class="">
            <div class="flex justify-between items-center p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Manajemen Kategori</h2>
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve(['href' => ''.e(route('admin.categories.create')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary']); ?>
                    Tambah Kategori
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $attributes = $__attributesOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__attributesOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale67687e3e4e61f963b25a6bcf3983629)): ?>
<?php $component = $__componentOriginale67687e3e4e61f963b25a6bcf3983629; ?>
<?php unset($__componentOriginale67687e3e4e61f963b25a6bcf3983629); ?>
<?php endif; ?>
            </div>

            
            <?php if(session('success')): ?>
                <?php if (isset($component)) { $__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3 = $attributes; } ?>
<?php $component = App\View\Components\Ui\Alert::resolve(['type' => 'success','message' => session('success')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Ui\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3)): ?>
<?php $attributes = $__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3; ?>
<?php unset($__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3)): ?>
<?php $component = $__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3; ?>
<?php unset($__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3); ?>
<?php endif; ?>
            <?php elseif(session('error')): ?>
                <?php if (isset($component)) { $__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3 = $attributes; } ?>
<?php $component = App\View\Components\Ui\Alert::resolve(['type' => 'error','message' => session('error')] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Ui\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3)): ?>
<?php $attributes = $__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3; ?>
<?php unset($__attributesOriginal024700bb3b1afbadbf97b6cf5efa18f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3)): ?>
<?php $component = $__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3; ?>
<?php unset($__componentOriginal024700bb3b1afbadbf97b6cf5efa18f3); ?>
<?php endif; ?>
            <?php endif; ?>

            <div class="p-6">
                
                <form method="GET" action="<?php echo e(route('admin.categories.index')); ?>" class="mb-6">
                    <?php
                        $hasFilters = request()->has('search') || request()->has('per_page');
                    ?>

                    <div class="grid grid-cols-1 md:grid-cols-<?php echo e($hasFilters ? '3' : '2'); ?> gap-4 items-start">
                        
                        <div class="relative">
                            <input type="text" name="search" placeholder="Cari nama kategori"
                                value="<?php echo e(request('search')); ?>"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        
                        <select name="per_page"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onchange="this.form.submit()">
                            <option value="10" <?php echo e(request('per_page', 10) == 10 ? 'selected' : ''); ?>>10 Kategori
                            </option>
                            <option value="25" <?php echo e(request('per_page') == 25 ? 'selected' : ''); ?>>25 Kategori</option>
                            <option value="50" <?php echo e(request('per_page') == 50 ? 'selected' : ''); ?>>50 Kategori</option>
                            <option value="100" <?php echo e(request('per_page') == 100 ? 'selected' : ''); ?>>100 Kategori</option>
                        </select>

                        
                        <?php if($hasFilters): ?>
                            <div class="text-center">
                                <a href="<?php echo e(route('admin.categories.index')); ?>"
                                    class="inline-flex items-center gap-2 rounded-lg bg-gray-500 px-4 py-2 text-white text-sm hover:bg-gray-600 transition">
                                    Reset Filter
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>

                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="p-3 text-left">No</th>
                                <th class="p-3 text-left">Nama</th>
                                <th class="p-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b hover:bg-gray-50 transition-colors">
                                    <td class="p-3"><?php echo e($loop->iteration); ?></td>
                                    <td class="p-3"><?php echo e($category->name); ?></td>
                                    <td class="p-3">
                                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>"
                                            class="text-indigo-600 hover:text-indigo-800">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST"
                                            class="inline-block">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-800"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="flex justify-between items-center mt-6 gap-3">
                    
                    
                </div>
            </div>
        </div>

        
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl p-6 w-96">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-lg font-semibold">Konfirmasi Hapus Kategori</h5>
                    <button id="closeDeleteModal" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="mb-4">
                    Apakah Anda yakin ingin menghapus kategori
                    <strong id="deleteUserName" class="text-red-600"></strong>?
                </div>

                <div class="flex justify-end space-x-2">
                    <form id="deleteForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" id="cancelDelete"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/final-project-cloud-computing-b-cc-kelompok-8-boboiboy-kuasa-bug-gaib/Nusatarawisata-kaltim/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>