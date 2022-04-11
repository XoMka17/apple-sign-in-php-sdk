<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Validation;

use Lcobuccnzri\JWT\Exception;
use RuntimeException;

final class ConstraintViolation extends RuntimeException implements Exception
{
}
