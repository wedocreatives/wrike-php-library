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

namespace wedocreatives\WrikePhpLibrary\Tests\Exception\Api;

use wedocreatives\WrikePhpLibrary\Exception\Api\ParameterRequiredException;

/**
 * Parameter Required Exception Test.
 */
class ParameterRequiredExceptionTest extends ApiExceptionTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ParameterRequiredException::class;
}
