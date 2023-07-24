<?php
declare(strict_types=1);
namespace Soatok\Fedifur;

class Instance
{
    public function __construct(public string $domain, public string $registerUri) {}

    public function getUrl(): string
    {
        return 'https://' . $this->domain . '/' . rtrim(trim($this->registerUri, '/'), '?');
    }
}
