<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation\Constraint;

use Lcobuccnzri\JWT\Signer;
use Lcobuccnzri\JWT\Token;
use Lcobuccnzri\JWT\UnencryptedToken;
use Lcobuccnzri\JWT\Validation\Constraint;
use Lcobuccnzri\JWT\Validation\ConstraintViolation;

final class SignedWith implements Constraint
{
    private Signer $signer;
    private Signer\Key $key;

    public function __construct(Signer $signer, Signer\Key $key)
    {
        $this->signer = $signer;
        $this->key    = $key;
    }

    public function assert(Token $token): void
    {
        if (! $token instanceof UnencryptedToken) {
            throw new ConstraintViolation('You should pass a plain token');
        }

        if ($token->headers()->get('alg') !== $this->signer->algorithmId()) {
            throw new ConstraintViolation('Token signer mismatch');
        }

        if (! $this->signer->verify($token->signature()->hash(), $token->payload(), $this->key)) {
            throw new ConstraintViolation('Token signature mismatch');
        }
    }
}
