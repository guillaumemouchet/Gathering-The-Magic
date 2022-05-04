<?php

return [
  'database' => [
    'dbname' => 'gathering_the_magic',
    'username' => 'root',
    //Working with the VM:
    //'password' => 'vz151', //'root' in MAMP //'' (empty) in easyPHP
    //'connection' => 'mysql:host=localhost',
    //Local dev:
    'password' => '',
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
    //Guillaume:
    //'install_prefix' => 'Projets/1_Semestre_De_Printemps/awa-g1-gatheringthemagic/gathering_the_magic',
    //Benjamin:
    'install_prefix' => 'awa-g1-gatheringthemagic/gathering_the_magic',
];

/* autre solution: creer un config.php-TEMPLATE dans le GIT avec les
 * exemples mais pas de mots de passe, et chacun utilise un config.php
 * PAS dans le GIT pour sa config locale effective!
 */
