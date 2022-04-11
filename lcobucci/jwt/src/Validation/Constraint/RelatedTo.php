<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation\Constraint;

use Lcobuccnzri\JWT\Token;
use Lcobuccnzri\JWT\Validation\Constraint;
use Lcobuccnzri\JWT\Validation\ConstraintViolation;

final class RelatedTo implements Constraint
{
    private string $subject;

    public function __construct(string $subject)
    {
        $this->subject = $subject;
    }

    public function assert(Token $token): void
    {
        if (! $token->isRelatedTo($this->subject)) {
            throw new ConstraintViolation(
                'The token is not related to the expected subject'
            );
        }
    }
}
