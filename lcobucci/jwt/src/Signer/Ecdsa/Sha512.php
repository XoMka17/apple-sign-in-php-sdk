<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Signer\Ecdsa;

use Lcobuccnzri\JWT\Signer\Ecdsa;

use const OPENSSL_ALGO_SHA512;

final class Sha512 extends Ecdsa
{
    public function algorithmId(): string
    {
        return 'ES512';
    }

    public function algorithm(): int
    {
        return OPENSSL_ALGO_SHA512;
    }

    public function keyLength(): int
    {
        return 132;
    }
}
