<?php $__env->startSection('content'); ?>
    <div class="container mx-auto">
        <div class="">
            <div class="flex justify-between items-center p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Manajemen Destinasi</h2>
                <?php if (isset($component)) { $__componentOriginale67687e3e4e61f963b25a6bcf3983629 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale67687e3e4e61f963b25a6bcf3983629 = $attributes; } ?>
<?php $component = App\View\Components\Button::resolve(['href' => ''.e(route('admin.destinations.create')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Button::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'primary']); ?>
                    Tambah
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
        </div>

        <div class="p-6">
            
            <form method="GET" action="<?php echo e(route('admin.destinations.index')); ?>" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    
                    <div class="relative">
                        <input type="text" name="search" placeholder="Cari nama tempat atau kota"
                            value="<?php echo e(request('search')); ?>"
                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    
                    <select name="category_id"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"
                                <?php echo e(request('category_id') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                    
                    <select name="sort_by"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onchange="this.form.submit()">
                        <option value="newest" <?php echo e(request('sort_by', 'newest') == 'newest' ? 'selected' : ''); ?>>Terbaru
                        </option>
                        <option value="rating_desc" <?php echo e(request('sort_by') == 'rating_desc' ? 'selected' : ''); ?>>Rating
                            Tertinggi</option>
                        <option value="rating_asc" <?php echo e(request('sort_by') == 'rating_asc' ? 'selected' : ''); ?>>Rating
                            Terendah</option>
                    </select>

                    
                    <select name="per_page"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onchange="this.form.submit()">
                        <option value="10" <?php echo e(request('per_page', 10) == 10 ? 'selected' : ''); ?>>10 Destinasi</option>
                        <option value="25" <?php echo e(request('per_page') == 25 ? 'selected' : ''); ?>>25 Destinasi</option>
                        <option value="50" <?php echo e(request('per_page') == 50 ? 'selected' : ''); ?>>50 Destinasi</option>
                        <option value="100" <?php echo e(request('per_page') == 100 ? 'selected' : ''); ?>>100 Destinasi</option>
                    </select>

                    
                    <?php if(request('search') || request('category_id') || request('sort_by')): ?>
                        <div class="md:col-span-5">
                            <a href="<?php echo e(route('admin.destinations.index')); ?>"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                            <th class="p-3 text-left">Gambar</th>
                            <th class="p-3 text-left">Nama Tempat</th>
                            <th class="p-3 text-left">Kategori</th>
                            <th class="p-3 text-left">Kota</th>
                            <th class="p-3 text-left">Rating</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo e($loop->iteration + ($destinations->currentPage() - 1) * $destinations->perPage()); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if($destination->images->isNotEmpty()): ?>
                                        <img src="<?php echo e(asset('storage/' . $destination->primaryImage['url'])); ?>"
                                            alt="<?php echo e($destination->place_name); ?>" class="h-12 w-16 object-cover rounded">
                                    <?php else: ?>
                                        <div class="h-12 w-16 bg-gray-200 rounded flex items-center justify-center">
                                            <span class="text-gray-400 text-xs">No image</span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?php echo e($destination->place_name); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo e($destination->category->name ?? 'N/A'); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo e($destination->city); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php if($destination->rating_count > 0): ?>
                                        <div class="flex items-center">
                                            <span><?php echo e(number_format($destination->rating, 1)); ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400 ml-1"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <span
                                                class="text-xs text-gray-400 ml-1">(<?php echo e($destination->rating_count); ?>)</span>
                                        </div>
                                    <?php else: ?>
                                        <span>No ratings</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="<?php echo e(route('admin.destinations.edit', $destination)); ?>"
                                            class="text-indigo-600 hover:text-indigo-800">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('admin.destinations.destroy', $destination)); ?>"
                                            method="POST" class="inline-block">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:text-red-800"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($destinations->isEmpty()): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                    No destinations found.
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

            
            <div class="flex justify-between items-center mt-6 gap-3">
                <div class="text-sm text-gray-600">
                    Menampilkan <?php echo e($destinations->firstItem()); ?> - <?php echo e($destinations->lastItem()); ?>

                    dari total <?php echo e($destinations->total()); ?> destinasi
                </div>
                <div>
                    <?php echo e($destinations->appends(request()->input())->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/final-project-cloud-computing-b-cc-kelompok-8-boboiboy-kuasa-bug-gaib/Nusatarawisata-kaltim/resources/views/admin/destinations/index.blade.php ENDPATH**/ ?>