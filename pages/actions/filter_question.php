<?php
require __DIR__."./vendor/autoload.php";

use \App\Entity\Pergunta;
print_r(Pergunta::filter("os inicio e/ou utensilios"));

