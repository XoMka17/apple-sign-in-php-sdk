<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Signer\Hmac;

use Lcobuccnzri\JWT\Signer\Hmac;

final class Sha256 extends Hmac
{
    public function algorithmId(): string
    {
        return 'HS256';
    }

    public function algorithm(): string
    {
        return 'sha256';
    }
}
