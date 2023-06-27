<?php

declare(strict_types=1);

ini_set("display_errors", '1');
ini_set('display_startup_errors', '1');

error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting' , 'E_ALL');

ini_set('memory_limit', '1');

// echo ini_get('display_errors');

// echo  ini_get('display_startup_errors');


error_reporting(E_ALL, E_WARNING , E_NOTICE);


// echo <<<EOT
// Mon nom est "$name". J'affiche quelques $foo->foo.
// Maintenant, j'affiche quelques {$foo->bar[1]}.
// Et ceci devrait afficher un 'A' majuscule : \x41
// EOT;
 echo <<<EOT
 Metus carnel@gmail.com est "ini_get('display_errors')"
 EOT
?>