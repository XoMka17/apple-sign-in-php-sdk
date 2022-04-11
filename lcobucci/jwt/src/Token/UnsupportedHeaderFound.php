<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Token;

use InvalidArgumentException;
use Lcobuccnzri\JWT\Exception;

final class UnsupportedHeaderFound extends InvalidArgumentException implements Exception
{
    public static function encryption(): self
    {
        return new self('Encryption is not supported yet');
    }
}
