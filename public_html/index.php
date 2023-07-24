<?php
declare(strict_types=1);
use Soatok\Fedifur\Collection;

define('FEDIFUR_ROOT', dirname(__DIR__));
require_once FEDIFUR_ROOT . '/vendor/autoload.php';

/** @var Collection $instances */
$instances = require_once FEDIFUR_ROOT . '/data/instances.php';

$url = $instances->fetch($_SERVER['REMOTE_ADDR'], new DateTime('now'))->getUrl();

header('Location: ' . $url);
exit;
