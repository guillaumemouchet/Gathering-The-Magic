<?php

return [
  'database' => [
    'dbname' => 'gathering_the_magic',
    'username' => 'root',
    //'password' => 'vz151', //'root' in MAMP //'' (empty) in easyPHP
    'password' => '',
    //'connection' => 'mysql:host=localhost',
    'connection' => 'mysql:host=127.0.0.1',
    'port' => ' 3306', // '8889' default port in MAMP //  '3306' in easyPHP
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  // if your app is not in the server's /, decomment and adapt
  // (then you MUST use relative URLs everywhere)
  //When using the VM:
  //'install_prefix' => 'php/gathering_the_magic',
  //Local dev:
    'install_prefix' => 'Projets/1_Semestre_De_Printemps/awa-g1-gatheringthemagic/gathering_the_magic', //'awa-g1-gatheringthemagic/gathering_the_magic',
];
