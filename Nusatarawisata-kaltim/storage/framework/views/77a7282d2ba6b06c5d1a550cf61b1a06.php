<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'value', 'color' => 'blue']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title', 'value', 'color' => 'blue']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="bg-white p-4 rounded-lg shadow">
    <h2 class="text-lg font-semibold"><?php echo e($title); ?></h2>
    <p class="text-3xl font-bold text-<?php echo e($color); ?>-500"><?php echo e($value); ?></p>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/final-project-cloud-computing-b-cc-kelompok-8-boboiboy-kuasa-bug-gaib/Nusatarawisata-kaltim/resources/views/components/admin/stat-card.blade.php ENDPATH**/ ?>