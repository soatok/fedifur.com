<?php
declare(strict_types=1);
use Soatok\Fedifur\Collection;

$key = require_once __DIR__ . '/key.php';

/**
 * Currently supported:
 *
 *   ->addMastodon($domain)
 *   ->addOther($domain, $path)
 *
 * For example:
 *
 *   ->addOther('example.com', '/custom_register_uri_here')
 *
 */
return (new Collection($key))
    /* Add your instances here */
    ->addMastodon('furry.engineer')
    ->addMastodon('pawb.fun')

    /* Add your instances above this line */
;
