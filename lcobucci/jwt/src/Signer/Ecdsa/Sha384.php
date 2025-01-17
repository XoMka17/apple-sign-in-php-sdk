<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Signer\Ecdsa;

use Lcobuccnzri\JWT\Signer\Ecdsa;

use const OPENSSL_ALGO_SHA384;

final class Sha384 extends Ecdsa
{
    public function algorithmId(): string
    {
        return 'ES384';
    }

    public function algorithm(): int
    {
        return OPENSSL_ALGO_SHA384;
    }

    public function keyLength(): int
    {
        return 96;
    }
}
