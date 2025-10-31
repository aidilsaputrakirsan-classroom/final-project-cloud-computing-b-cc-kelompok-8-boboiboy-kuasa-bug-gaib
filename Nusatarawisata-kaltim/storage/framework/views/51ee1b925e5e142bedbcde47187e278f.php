<?php $__env->startSection('content'); ?>
    <div class="container mx-auto">
        <div class="">
            <div class="flex justify-between items-center p-6 border-b">
                <h2 class="text-2xl font-semibold text-gray-800">Pengajuan Destinasi</h2>
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
            
            <form action="<?php echo e(route('admin.destination-submission.index')); ?>" method="GET"
                class="space-y-4 md:space-y-0 md:flex md:items-end md:space-x-4">
                <div class="w-full md:w-1/4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">Semua Status</option>
                        <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Disetujui</option>
                        <option value="rejected" <?php echo e(request('status') == 'rejected' ? 'selected' : ''); ?>>Ditolak</option>
                    </select>
                </div>

                <div class="w-full md:w-1/4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="category_id" name="category_id"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="">Semua Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"
                                <?php echo e(request('category_id') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="w-full md:w-1/4">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Nama Tempat</label>
                    <input type="text" name="search" id="search" value="<?php echo e(request('search')); ?>"
                        class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Cari...">
                </div>

                <div class="w-full md:w-auto flex space-x-2">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Filter
                    </button>
                    <a href="<?php echo e(route('admin.destination-submission.index')); ?>"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Reset
                    </a>
                </div>
            </form>

            
            <div class="overflow-x-auto mt-6">
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="p-3 ">No</th>
                            <th class="p-3 ">Gambar</th>
                            <th class="p-3 ">Nama Tempat</th>
                            <th class="p-3 ">Kategori</th>
                            <th class="p-3 ">Kota</th>
                            <th class="p-3 ">Status</th>
                            <th class="p-3 ">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <?php echo e($loop->iteration + ($submissions->currentPage() - 1) * $submissions->perPage()); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <?php if($submission->images): ?>
                                        <img src="<?php echo e(asset('storage/' . $submission->images[0]['url'])); ?>"
                                            alt="<?php echo e($submission->place_name); ?>" class="h-12 w-16 object-cover rounded">
                                    <?php else: ?>
                                        <div class="h-12 w-16 bg-gray-200 rounded flex items-center justify-center">
                                            <span class="text-gray-400 text-xs">No image</span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    <?php echo e($submission->place_name); ?>

                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <?php echo e($submission->category->name ?? 'N/A'); ?>

                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <?php echo e($submission->administrative_area); ?>, <?php echo e($submission->province); ?>

                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    <?php echo e($submission->status == 'approved'
                                        ? 'bg-green-100 text-green-800'
                                        : ($submission->status == 'rejected'
                                            ? 'bg-red-100 text-red-800'
                                            : 'bg-yellow-100 text-yellow-800')); ?>">
                                        <?php echo e(ucfirst($submission->status)); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <!-- View Button -->
                                        <a href="<?php echo e(route('admin.destination-submission.edit', $submission)); ?>"
                                            class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                                            View
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="<?php echo e(route('admin.destination-submission.destroy', $submission)); ?>"
                                            method="POST" class="inline-block"
                                            onsubmit="return confirm('Hapus pengajuan ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                class="inline-flex items-center text-red-600 hover:text-red-800 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Tidak ada pengajuan ditemukan.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <?php if($submissions->hasPages()): ?>
                <div class="flex justify-between items-center mt-6 gap-3">
                    <div class="text-sm text-gray-600">
                        Menampilkan <?php echo e($submissions->firstItem()); ?> - <?php echo e($submissions->lastItem()); ?>

                        dari total <?php echo e($submissions->total()); ?> pengajuan
                    </div>
                    <div>
                        <?php echo e($submissions->appends(request()->input())->links()); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/final-project-cloud-computing-b-cc-kelompok-8-boboiboy-kuasa-bug-gaib/Nusatarawisata-kaltim/resources/views/admin/destination-submissions/index.blade.php ENDPATH**/ ?>