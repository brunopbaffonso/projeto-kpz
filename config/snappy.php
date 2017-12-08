<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'), // Vagrant steps
        // 'binary'  => '/usr/local/bin/wkhtmltopdf-amd64', // Loaded with Composer
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'), // Vagrant steps
        // 'binary'  => '/usr/local/bin/wkhtmltopdf-amd64', // Loaded with Composer
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
