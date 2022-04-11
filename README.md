# Fork version of Sign-in with Apple SDK

#### Fork version. This version allow use apple-sign-in-php-sdk v2.2.0 with included lcobucci/jwt and phpseclib/phpseclib 

## Changed

Included next packages into this version

    "phpseclib/phpseclib": "3.0.14",
    "lcobucci/jwt": "4.1.5",

---
---


## Requirements

* PHP 7.4+
* OpenSSL Extension

## PHP support
|PHP version| Library version |
|---|-----------------|
| `> 8.0 & ^7.4`| `2.2.0`         |

Versioning follows [semver](https://semver.org/) standard.

## How it works

This description assumes that you already have
generated [identityToken](https://developer.apple.com/documentation/authenticationservices/asauthorizationsinglesignoncredential/3153080-identitytoken)
. Remember that token is valid ONLY for 10 minutes.

The first step to verify the identity token is to generate a public key. To generate public key `exponent` and `modulus`
values are required. Both information are exposed in [Apple API endpoint](https://appleid.apple.com/auth/keys). Those
values differ depending on the algorithm.

The second step is verification if provided `identityToken` is valid against generated public key. If so we are sure
that `identityToken` wasn't malformed.

The third step is validation if token is not expired. Additionally it is worth to check `issuer` and `audience`,
examples are shown below.

## Basic usage

Once you have cloned repository, make sure that composer dependencies are installed running `composer install -o`.

```php

$appleJwtFetchingService = new Auth\Service\AppleJwtFetchingService(
            new Auth\Jwt\JwtParser(new \Lcobuccnzri\JWT\Token\Parser(new \Lcobuccnzri\JWT\Encoding\JoseEncoder())),
            new Auth\Jwt\JwtVerifier(
                new Api\AppleApiClient(
                    new GuzzleHttp\Client(
                        [
                            'base_uri'        => 'https://appleid.apple.com',
                            'timeout'         => 5,
                            'connect_timeout' => 5,
                        ]
                    ),
                    new Api\Factory\ResponseFactory()
                ),
                new \Lcobuccnzri\JWT\Validation\Validator(),
                new \Lcobuccnzri\JWT\Signer\Rsa\Sha256()
            ),
            new Auth\Jwt\JwtValidator(
                new \Lcobuccnzri\JWT\Validation\Validator(),
                [
                    new \Lcobuccnzri\JWT\Validation\Constraint\IssuedBy('https://appleid.apple.com'),
                    new \Lcobuccnzri\JWT\Validation\Constraint\PermittedFor('com.c.azimo.stage'),
                ]
            ),
            new Auth\Factory\AppleJwtStructFactory()
        );

$appleJwtFetchingService->getJwtPayload('your.identity.token');
```

If you don't want to copy-paste above code you can paste freshly generated `identityToken`
in `tests/E2e/Auth/AppleJwtFetchingServiceTest.php:53`
and run tests with simple command `php vendor/bin/phpunit tests/E2e`.

```shell script
$ php vendor/bin/phpunit tests/E2e
PHPUnit 9.2.5 by Sebastian Bergmann and contributors.

Random seed:   1594414420

.                                                                   1 / 1 (100%)

Time: 00:00.962, Memory: 8.00 MB

OK (1 test, 1 assertion)
```

## Todo

It is welcome to open a pull request with a fix of any issue:

- [x] Upgrade `phpseclib/phpseclib` to version `3.0.7`
- [x] Upgrade `lcobucci/jwt` to version `4.x`. Reported
  in: [Implicit conversion of keys from strings is deprecated. #2](https://github.com/AzimoLabs/apple-sign-in-php-sdk/issues/2)
- [x] Make library compatible with PHP `7.4.3`. Reported
  in [Uncaught JsonException: Malformed UTF-8 characters](https://github.com/AzimoLabs/apple-sign-in-php-sdk/issues/4)
- [x] Make library compatible with PHP `8.0.0`
- [x] Refactor \Azimo\Apple\Api\Enum\CryptographicAlgorithmEnum, so algorithms are fetched dynamically from https://appleid.apple.com/auth/keys
- [ ] Create contribution guide

## Miscellaneous

* [JSON web token](https://jwt.io/)
* [Sign in with Apple overwiew](https://developer.apple.com/documentation/sign_in_with_apple/sign_in_with_apple_rest_api/authenticating_users_with_sign_in_with_apple)
* [How backend token verification works](https://sarunw.com/posts/sign-in-with-apple-3/)

# Towards financial services available to all

We’re working throughout the company to create faster, cheaper, and more available financial services all over the
world, and here are some of the techniques that we’re utilizing. There’s still a long way ahead of us, and if you’d like
to be part of that journey, check out our [careers page](https://bit.ly/3vajnu6).
