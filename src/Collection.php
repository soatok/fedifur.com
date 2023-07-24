<?php
declare(strict_types=1);
namespace Soatok\Fedifur;

use DateTime;
use SodiumException;

class Collection
{
    private array $instances = [];

    public function __construct(
        #[\SensitiveParameter]
        private string $key
    ) {}

    public function add(Instance $instance): static
    {
        $this->instances []= $instance;
        return $this;
    }

    public function addMastodon(string $domain, string $path = '/auth/sign_up'): static
    {
        return $this->add(
            new Instance($domain, $path)
        );
    }

    public function addOther(string $domain, string $path): static
    {
        return $this->add(
            new Instance($domain, $path)
        );
    }

    public function fetch(string $ip, DateTime $date): Instance
    {
        $seed = $this->calculateSeed($ip, $date->format('Y-m-d'));

        $count = count($this->instances);
        $index = static::getIndex($seed, $count);
        return $this->instances[$index];
    }

    public static function getIndex(string $seed, int $count): int
    {
        if ($count < 1) {
            throw new \RangeException('Cannot get index of empty set');
        }
        $lastBits = mb_substr($seed, 24, null, '8bit');
        $asInteger = unpack('J', $lastBits)[1];
        if ($asInteger < 0) {
            $asInteger *= -1;
        }
        return $asInteger % $count;
    }

    /**
     * @throws SodiumException
     */
    public function calculateSeed(string $ip, string $date): string
    {
        $state = sodium_crypto_generichash_init($this->key);
        sodium_crypto_generichash_update($state, "\0\0\0\0\0\0\0\x02");
        sodium_crypto_generichash_update($state, pack('J', mb_strlen($ip, '8bit')));
        sodium_crypto_generichash_update($state, $ip);
        sodium_crypto_generichash_update($state, pack('J', mb_strlen($date, '8bit')));
        sodium_crypto_generichash_update($state, $date);
        return sodium_crypto_generichash_final($state);
    }
}
