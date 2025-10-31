<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'href' => '#',
    'variant' => 'primary', // default
    'textColor' => 'text-white', // default text color
]));

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

foreach (array_filter(([
    'href' => '#',
    'variant' => 'primary', // default
    'textColor' => 'text-white', // default text color
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $baseClass = 'inline-block rounded border px-5 py-3 font-medium shadow-sm transition-colors';

    $variants = [
        'primary' => 'border-indigo-400 bg-primary hover:bg-indigo-700',
        'secondary' => 'border-gray-400 bg-gray-500 hover:bg-gray-600',
        'danger' => 'border-red-400 bg-red-500 hover:bg-red-600',
        'success' => 'border-green-400 bg-green-500 hover:bg-green-600',
    ];

    $variantClass = $variants[$variant] ?? $variants['primary'];
?>

<a href="<?php echo e($href); ?>" <?php echo e($attributes->merge(['class' => "$baseClass $variantClass $textColor"])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/final-project-cloud-computing-b-cc-kelompok-8-boboiboy-kuasa-bug-gaib/Nusatarawisata-kaltim/resources/views/components/button.blade.php ENDPATH**/ ?>