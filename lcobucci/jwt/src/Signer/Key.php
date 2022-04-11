<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT\Signer;

interface Key
{
    public function contents(): string;

    public function passphrase(): string;
}
