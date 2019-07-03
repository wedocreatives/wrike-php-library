<?php

declare(strict_types=1);

/*
 * This file is part of the wedocreatives/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpLibrary\Tests\Validator;

use wedocreatives\WrikePhpLibrary\Tests\TestCase;
use wedocreatives\WrikePhpLibrary\Validator\AccessTokenValidator;

/**
 * Access Token Validator Test.
 */
class AccessTokenValidatorTest extends TestCase
{
    /**
     * @return array
     */
    public function validTokenProvider(): array
    {
        return [
            // value, isValid
            ['test', true],
            ['123456789012345', true],
            [null, false],
            [123, false],
            ['', false],
            [' ', false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider validTokenProvider
     */
    public function test_isValidMethods($value, $isValid): void
    {
        self::assertSame($isValid, AccessTokenValidator::isValid($value), sprintf('validation string "%s"', $value));

        $withoutException = true;

        try {
            AccessTokenValidator::assertIsValid($value);
        } catch (\Throwable $e) {
            $withoutException = false;
        }
        self::assertSame($isValid, $withoutException, sprintf('assert string "%s"', $value));
    }

    /**
     * @return array
     */
    public function validOrEmptyTokenProvider(): array
    {
        return [
            // value, isValid
            ['test', true],
            ['', true],
            ['123456789012345', true],
            [null, false],
            [123, false],
            [' ', false],
        ];
    }

    /**
     * @param mixed $value
     * @param bool  $isValid
     *
     * @dataProvider validOrEmptyTokenProvider
     */
    public function test_isValidOrEmptyMethods($value, $isValid): void
    {
        self::assertSame($isValid, AccessTokenValidator::isValidOrEmpty($value), sprintf('validation string "%s"', $value));

        $withoutException = true;

        try {
            AccessTokenValidator::assertIsValidOrEmpty($value);
        } catch (\Throwable $e) {
            $withoutException = false;
        }
        self::assertSame($isValid, $withoutException, sprintf('assert string "%s"', $value));
    }
}
