<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation\Constraint;

use InvalidArgumentException;
use Lcobuccnzri\JWT\Exception;

final class LeewayCannotBeNegative extends InvalidArgumentException implements Exception
{
    public static function create(): self
    {
        return new self('Leeway cannot be negative');
    }
}
