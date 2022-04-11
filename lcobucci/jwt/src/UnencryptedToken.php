<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT;

use Lcobuccnzri\JWT\Token\DataSet;
use Lcobuccnzri\JWT\Token\Signature;

interface UnencryptedToken extends Token
{
    /**
     * Returns the token claims
     */
    public function claims(): DataSet;

    /**
     * Returns the token signature
     */
    public function signature(): Signature;

    /**
     * Returns the token payload
     */
    public function payload(): string;
}
