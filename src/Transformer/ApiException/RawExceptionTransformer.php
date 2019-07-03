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

use wedocreatives\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;

/**
 * Raw Exception Transformer.
 */
class RawExceptionTransformer implements ApiExceptionTransformerInterface
{
    /**
     * @param \Throwable $exception
     *
     * @return \Throwable
     */
    public function transform(\Throwable $exception): \Throwable
    {
        return $exception;
    }
}
