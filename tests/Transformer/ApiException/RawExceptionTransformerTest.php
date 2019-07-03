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

use wedocreatives\WrikePhpLibrary\Tests\TestCase;
use wedocreatives\WrikePhpLibrary\Transformer\ApiException\RawExceptionTransformer;

/**
 * Raw Exception Transformer Test.
 */
class RawExceptionTransformerTest extends TestCase
{
    public function test_transform(): void
    {
        $exception = new \Exception();
        $transformer = new RawExceptionTransformer();
        self::assertSame($exception, $transformer->transform($exception));
    }
}
