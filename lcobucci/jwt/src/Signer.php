<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT;

use Lcobuccnzri\JWT\Signer\CannotSignPayload;
use Lcobuccnzri\JWT\Signer\Ecdsa\ConversionFailed;
use Lcobuccnzri\JWT\Signer\InvalidKeyProvided;
use Lcobuccnzri\JWT\Signer\Key;

interface Signer
{
    /**
     * Returns the algorithm id
     */
    public function algorithmId(): string;

    /**
     * Creates a hash for the given payload
     *
     * @throws CannotSignPayload  When payload signing fails.
     * @throws InvalidKeyProvided When issue key is invalid/incompatible.
     * @throws ConversionFailed   When signature could not be converted.
     */
    public function sign(string $payload, Key $key): string;

    /**
     * Returns if the expected hash matches with the data and key
     *
     * @throws InvalidKeyProvided When issue key is invalid/incompatible.
     * @throws ConversionFailed   When signature could not be converted.
     */
    public function verify(string $expected, string $payload, Key $key): bool;
}
