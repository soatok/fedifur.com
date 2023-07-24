<?php
declare(strict_types=1);

define('FEDIFUR_ROOT', dirname(__DIR__));
if (file_exists(FEDIFUR_ROOT . '/data/key.php')) {
    echo 'File already exists: ', FEDIFUR_ROOT, '/data/key.php', PHP_EOL;
    exit(1);
}

file_put_contents(
    FEDIFUR_ROOT . '/data/key.php',
    '<?php' . "\n" .
        'return sodium_hex2bin("' . bin2hex(random_bytes(32)) . '");' . "\n"
);

echo 'Created successfully:', PHP_EOL;
echo FEDIFUR_ROOT . '/data/key.php', PHP_EOL;
