<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation;

use Lcobuccnzri\JWT\Token;

interface Constraint
{
    /** @throws ConstraintViolation */
    public function assert(Token $token): void;
}
