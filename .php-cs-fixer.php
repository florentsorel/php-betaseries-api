<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/src',
    ])
    ->name('*.php')
;

$config = new PhpCsFixer\Config();
$config->setRiskyAllowed(true);

return $config->setRules([
    '@PSR12' => true,
    '@Symfony' => true,
    'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
    'declare_strict_types' => true,
    'nullable_type_declaration_for_default_null_value' => true,
    'php_unit_data_provider_static' => true,
    'php_unit_method_casing' => [
        'case' => 'snake_case',
    ],
    'php_unit_strict' => true,
])->setFinder($finder);
