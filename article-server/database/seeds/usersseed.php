<?php
require_once getPath("User");

$users = [
    [
        'email' => 'a@a.com',
        'password' => '123',
        'firstname' => 'Abc',
        'lastname' => 'ABC'
    ],
    [
        'email' => 'hassanali@example.com',
        'password' => '12345',
        'firstname' => 'Hassan',
        'lastname' => 'Ali'
    ],
    [
        'email' => 'laylajou@example.com',
        'password' => 'pass1',
        'firstname' => 'Layla',
        'lastname' => 'Jou'
    ],
    [
        'email' => 'nourahaddad@example.com',
        'password' => 'abcd1',
        'firstname' => 'Noura',
        'lastname' => 'Haddad'
    ],
    [
        'email' => 'karimmansour@example.com',
        'password' => 'admin1',
        'firstname' => 'Karim',
        'lastname' => 'Mansour'
    ],
    [
        'email' => 'zeinabomar@example.com',
        'password' => 'qwert',
        'firstname' => 'Zeinab',
        'lastname' => 'Omar'
    ],
    [
        'email' => 'samirzaki@example.com',
        'password' => 'xyz12',
        'firstname' => 'Samir',
        'lastname' => 'Zaki'
    ],
    [
        'email' => 'nadineghosn@example.com',
        'password' => 'hello',
        'firstname' => 'Nadine',
        'lastname' => 'Ghosn'
    ],
    [
        'email' => 'mahmoudsaber@example.com',
        'password' => '123qz',
        'firstname' => 'Mahmoud',
        'lastname' => 'Saber'
    ],
    [
        'email' => 'karimabboud@example.com',
        'password' => 'qazws',
        'firstname' => 'Karim',
        'lastname' => 'Abboud'
    ],
    [
        'email' => 'fatimaraad@example.com',
        'password' => '1234a',
        'firstname' => 'Fatima',
        'lastname' => 'Raad'
    ]
];

foreach ($users as $user) {
    $email = $user["email"];
    $password = $user["password"];
    $firstname = $user["firstname"];
    $lastname = $user["lastname"];

    // create a userSkelton
    $userSkeleton = new UserSkeleton($email, $password, $firstname, $lastname);

    $respose = User::addUser($userSkeleton);
    echo json_encode($respose) . "\n";

}
