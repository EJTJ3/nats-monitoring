<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules([
        'nullable_type_declaration' => false,
        'fully_qualified_strict_types' => true,
        'ordered_imports' => true,
        '@PSR12' => true,
        'no_unused_imports' => true,
        'concat_space' => ['spacing' => 'one'],
        'array_syntax' => ['syntax' => 'short'],
        'class_attributes_separation' => true,
        'no_extra_blank_lines' => true,
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'phpdoc_align' => false,
        'strict_param' => false,
        'yoda_style' => false,
        'phpdoc_separation' => true,
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
        ],
        'global_namespace_import' => [
            'import_classes' => true,
        ],
        'phpdoc_order' => true,
        'single_quote' => true,
    ])
    ->setFinder($finder);
