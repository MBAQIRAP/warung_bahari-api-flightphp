<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => null,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => null,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'flightphp/core' => array(
            'pretty_version' => 'v3.12.0',
            'version' => '3.12.0.0',
            'reference' => '63fbf9b0316969e8aa6c318f8479d1ed0578f9b4',
            'type' => 'library',
            'install_path' => __DIR__ . '/../flightphp/core',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'mikecao/flight' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '2.0.2',
            ),
        ),
    ),
);
