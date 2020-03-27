<?php

return [
    
    'pdf' => [
        'enabled' => true,
        'binary'  => '"C:\Program Files\wkhtmltopdf\bin/wkhtmltopdf"',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],
    
    'image' => [
        'enabled' => true,
        'binary'  => '"C:\Program Files\wkhtmltopdf\bin/wkhtmltoimage"',
        'timeout' => false,
        'options' => [],
        'env'     => [],
    ],

];
