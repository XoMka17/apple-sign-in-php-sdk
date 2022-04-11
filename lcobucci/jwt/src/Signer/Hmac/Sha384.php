<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Signer\Hmac;

use Lcobuccnzri\JWT\Signer\Hmac;

final class Sha384 extends Hmac
{
    public function algorithmId(): string
    {
        return 'HS384';
    }

    public function algorithm(): string
    {
        return 'sha384';
    }
}
