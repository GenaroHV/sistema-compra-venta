<?php

return [
    
    'pdf' => [
        'enabled' => true,
        #'binary'  => '/usr/local/bin/wkhtmltopdf',
        'binary'  => '"C:\Program Files\wkhtmltopdf\bin/wkhtmltopdf"',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],
    
    'image' => [
        'enabled' => true,
        #'binary'  => '/usr/local/bin/wkhtmltoimage',
        'binary'  => '"C:\Program Files\wkhtmltopdf\bin/wkhtmltoimage"',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

];
