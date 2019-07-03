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

namespace wedocreatives\WrikePhpLibrary\Tests;

use wedocreatives\WrikePhpLibrary\Api;
use wedocreatives\WrikePhpLibrary\Transformer\ApiException\RawExceptionTransformer;
use wedocreatives\WrikePhpLibrary\Transformer\Response\Psr\PsrResponseTransformer;

/**
 * Api Test.
 */
class ApiTest extends ApiTestCase
{
    /**
     * @var Api
     */
    protected $object;

    /**
     * @var string
     */
    protected $sourceClass = Api::class;

    public function test_immutableMethods(): void
    {
        $response = $this->object->recreateForNewAccessToken('test');
        self::assertNotSame($this->object, $response);
        self::assertInstanceOf($this->sourceClass, $response);

        $response = $this->object->recreateForNewResponseTransformer(new PsrResponseTransformer());
        self::assertNotSame($this->object, $response);
        self::assertInstanceOf($this->sourceClass, $response);

        $response = $this->object->recreateForNewApiExceptionTransformer(new RawExceptionTransformer());
        self::assertNotSame($this->object, $response);
        self::assertInstanceOf($this->sourceClass, $response);
    }
}
