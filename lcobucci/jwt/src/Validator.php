<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT;

use Lcobuccnzri\JWT\Validation\Constraint;
use Lcobuccnzri\JWT\Validation\NoConstraintsGiven;
use Lcobuccnzri\JWT\Validation\RequiredConstraintsViolated;

interface Validator
{
    /**
     * @throws RequiredConstraintsViolated
     * @throws NoConstraintsGiven
     */
    public function assert(Token $token, Constraint ...$constraints): void;

    /** @throws NoConstraintsGiven */
    public function validate(Token $token, Constraint ...$constraints): bool;
}
