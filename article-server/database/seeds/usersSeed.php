<?php

$users = [
    [
        'email' => 'abc@example.com',
        'password' => '123',
        'first_name' => 'Abc',
        'last_name' => ''
    ],
    [
        'email' => 'hassan_ali@example.com',
        'password' => '12345',
        'first_name' => 'Hassan',
        'last_name' => 'Ali'
    ],
    [
        'email' => 'layla_jou@example.com',
        'password' => 'pass1',
        'first_name' => 'Layla',
        'last_name' => 'Jou'
    ],
    [
        'email' => 'noura_haddad@example.com',
        'password' => 'abcd1',
        'first_name' => 'Noura',
        'last_name' => 'Haddad'
    ],
    [
        'email' => 'karim_mansour@example.com',
        'password' => 'admin1',
        'first_name' => 'Karim',
        'last_name' => 'Mansour'
    ],
    [
        'email' => 'zeinab_omar@example.com',
        'password' => 'qwert',
        'first_name' => 'Zeinab',
        'last_name' => 'Omar'
    ],
    [
        'email' => 'samir_zaki@example.com',
        'password' => 'xyz12',
        'first_name' => 'Samir',
        'last_name' => 'Zaki'
    ],
    [
        'email' => 'nadine_ghosn@example.com',
        'password' => 'hello',
        'first_name' => 'Nadine',
        'last_name' => 'Ghosn'
    ],
    [
        'email' => 'mahmoud_saber@example.com',
        'password' => '123qz',
        'first_name' => 'Mahmoud',
        'last_name' => 'Saber'
    ],
    [
        'email' => 'karim_abboud@example.com',
        'password' => 'qazws',
        'first_name' => 'Karim',
        'last_name' => 'Abboud'
    ],
    [
        'email' => 'fatima_raad@example.com',
        'password' => '1234a',
        'first_name' => 'Fatima',
        'last_name' => 'Raad'
    ]
];

foreach ($users as $user) {
    $_POST['email'] = $user['email'];
    $_POST['password'] = $user['password'];
    $_POST['first_name'] = $user['first_name'];
    $_POST['last_name'] = $user['last_name'];
    //require getPath('login.php');
}
