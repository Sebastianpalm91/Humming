<?php
declare(strict_types=1);
require __DIR__.'/autoload.php';
unset($_SESSION['users']);
redirect('../index.php');
