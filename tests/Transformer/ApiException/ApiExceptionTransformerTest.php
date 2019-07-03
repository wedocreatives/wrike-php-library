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

namespace wedocreatives\WrikePhpLibrary\Tests\Transformer\ApiException;

use wedocreatives\WrikePhpLibrary\Exception\Api\AccessForbiddenException;
use wedocreatives\WrikePhpLibrary\Exception\Api\ApiException;
use wedocreatives\WrikePhpLibrary\Exception\Api\InvalidParameterException;
use wedocreatives\WrikePhpLibrary\Exception\Api\InvalidRequestException;
use wedocreatives\WrikePhpLibrary\Exception\Api\MethodNotFoundException;
use wedocreatives\WrikePhpLibrary\Exception\Api\NotAllowedException;
use wedocreatives\WrikePhpLibrary\Exception\Api\NotAuthorizedException;
use wedocreatives\WrikePhpLibrary\Exception\Api\ParameterRequiredException;
use wedocreatives\WrikePhpLibrary\Exception\Api\ResourceNotFoundException;
use wedocreatives\WrikePhpLibrary\Exception\Api\ServerErrorException;
use wedocreatives\WrikePhpLibrary\Tests\TestCase;

/**
 * Api Exception Transformer Test.
 */
class ApiExceptionTransformerTest extends TestCase
{
    /**
     * @return array
     */
    public function responseExceptionsProvider(): array
    {
        return [
            // [errorStatusCode, errorStatusName, expectedExceptionClass]
            [444, 'something', ApiException::class],
            [555, 'something', ApiException::class],

            [401, 'wrong_error', ApiException::class],
            [402, 'wrong_error', ApiException::class],
            [403, 'wrong_error', ApiException::class],
            [404, 'wrong_error', ApiException::class],
            [500, 'wrong_error', ApiException::class],
            [501, 'wrong_error', ApiException::class],
            [502, 'wrong_error', ApiException::class],
            [503, 'wrong_error', ApiException::class],

            [403, 'access_forbidden', AccessForbiddenException::class],
            [400, 'invalid_parameter', InvalidParameterException::class],
            [400, 'invalid_request', InvalidRequestException::class],
            [404, 'method_not_found', MethodNotFoundException::class],
            [403, 'not_allowed', NotAllowedException::class],
            [401, 'not_authorized', NotAuthorizedException::class],
            [400, 'parameter_required', ParameterRequiredException::class],
            [404, 'resource_not_found', ResourceNotFoundException::class],
            [500, 'server_error', ServerErrorException::class],
        ];
    }

    /**
     * @param int    $errorStatusCode
     * @param string $errorStatusName
     * @param string $expectedExceptionClass
     *
     * @dataProvider responseExceptionsProvider
     */
    public function test_transformByStatusCodeAndName($errorStatusCode, $errorStatusName, $expectedExceptionClass): void
    {
        $exception = new \Exception();
        $transformer = new ApiExceptionTransformerStub();

        $normalizedException = $transformer->transformByStatusCodeAndName(
            $exception,
            $errorStatusCode,
            $errorStatusName
        );
        self::assertInstanceOf(
            $expectedExceptionClass,
            $normalizedException,
            sprintf('"%s expected, "%s" received"', $expectedExceptionClass, \get_class($normalizedException))
        );
        self::assertInstanceOf(
            ApiException::class,
            $normalizedException,
            sprintf('"%s expected, "%s" received"', ApiException::class, \get_class($normalizedException))
        );
    }
}
