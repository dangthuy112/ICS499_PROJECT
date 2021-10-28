<?php

return [

    'database'=>[
        'name'=>'ics499',
        'username'=>'admin',
        'password'=>'password',
        'connection'=>'mysql:host=localhost',
        'options'=>[
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
        ]
    ]

];