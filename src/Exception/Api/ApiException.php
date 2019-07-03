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

namespace wedocreatives\WrikePhpLibrary\Exception\Api;

use Exception;

/**
 * General Wrike Api Exception.
 *
 * Thrown when the Client returns an HTTP error that isn't handled by other dedicated exceptions.
 * Wrike API usually returns a specific error code and specific error value to identify error.
 */
class ApiException extends Exception
{
    public const STATUS_CODE = null;
    public const STATUS_NAME = null;

    /**
     * ApiException constructor.
     *
     * @param \Throwable $e
     */
    public function __construct(\Throwable $e)
    {
        parent::__construct($e->getMessage(), $e->getCode(), $e);
    }
}
