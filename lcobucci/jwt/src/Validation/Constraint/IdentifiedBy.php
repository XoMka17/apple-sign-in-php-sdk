<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation\Constraint;

use Lcobuccnzri\JWT\Token;
use Lcobuccnzri\JWT\Validation\Constraint;
use Lcobuccnzri\JWT\Validation\ConstraintViolation;

final class IdentifiedBy implements Constraint
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function assert(Token $token): void
    {
        if (! $token->isIdentifiedBy($this->id)) {
            throw new ConstraintViolation(
                'The token is not identified with the expected ID'
            );
        }
    }
}
