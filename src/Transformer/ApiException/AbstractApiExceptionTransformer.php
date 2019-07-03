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

namespace wedocreatives\WrikePhpLibrary\Transformer\ApiException;

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
use wedocreatives\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;

/**
 * Abstract Api Exception Transformer.
 */
abstract class AbstractApiExceptionTransformer implements ApiExceptionTransformerInterface
{
    /**
     * @var array
     */
    protected $supportedApiExceptions = [
        AccessForbiddenException::class,
        InvalidParameterException::class,
        InvalidRequestException::class,
        MethodNotFoundException::class,
        NotAllowedException::class,
        NotAuthorizedException::class,
        ParameterRequiredException::class,
        ResourceNotFoundException::class,
        ServerErrorException::class,
    ];

    /**
     * @param \Throwable $exception
     * @param int        $errorStatusCode
     * @param string     $errorStatusName
     *
     * @return ApiException
     */
    protected function transformByStatusCodeAndName(
        \Throwable $exception,
        $errorStatusCode,
        $errorStatusName
    ): ApiException {
        foreach ($this->supportedApiExceptions as $apiExceptionClass) {
            $statusCode = \constant($apiExceptionClass . '::STATUS_CODE');
            $statusName = \constant($apiExceptionClass . '::STATUS_NAME');
            if ($errorStatusCode === $statusCode && $errorStatusName === $statusName) {
                return new $apiExceptionClass($exception);
            }
        }

        return new ApiException($exception);
    }
}
