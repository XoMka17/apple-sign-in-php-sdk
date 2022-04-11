<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation\Constraint;

use Lcobuccnzri\JWT\Token;
use Lcobuccnzri\JWT\Validation\Constraint;
use Lcobuccnzri\JWT\Validation\ConstraintViolation;

final class PermittedFor implements Constraint
{
    private string $audience;

    public function __construct(string $audience)
    {
        $this->audience = $audience;
    }

    public function assert(Token $token): void
    {
        if (! $token->isPermittedFor($this->audience)) {
            throw new ConstraintViolation(
                'The token is not allowed to be used by this audience'
            );
        }
    }
}
