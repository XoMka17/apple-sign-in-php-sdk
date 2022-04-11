<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation\Constraint;

use DateInterval;
use Lcobuccnzri\Clock\Clock;
use Lcobuccnzri\JWT\Token;
use Lcobuccnzri\JWT\Validation\Constraint;

/** @deprecated Use \Lcobuccnzri\JWT\Validation\Constraint\LooseValidAt */
final class ValidAt implements Constraint
{
    private LooseValidAt $constraint;

    public function __construct(Clock $clock, ?DateInterval $leeway = null)
    {
        $this->constraint = new LooseValidAt($clock, $leeway);
    }

    public function assert(Token $token): void
    {
        $this->constraint->assert($token);
    }
}
