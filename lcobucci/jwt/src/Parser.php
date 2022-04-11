<?php
declare(strict_types=1);

namespace Lcobuccnzri\JWT;

use Lcobuccnzri\JWT\Encoding\CannotDecodeContent;
use Lcobuccnzri\JWT\Token\InvalidTokenStructure;
use Lcobuccnzri\JWT\Token\UnsupportedHeaderFound;

interface Parser
{
    /**
     * Parses the JWT and returns a token
     *
     * @throws CannotDecodeContent      When something goes wrong while decoding.
     * @throws InvalidTokenStructure    When token string structure is invalid.
     * @throws UnsupportedHeaderFound   When parsed token has an unsupported header.
     */
    public function parse(string $jwt): Token;
}
