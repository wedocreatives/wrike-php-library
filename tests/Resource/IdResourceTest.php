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

namespace wedocreatives\WrikePhpLibrary\Tests\Resource;

use wedocreatives\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use wedocreatives\WrikePhpLibrary\Resource\IdResource;

/**
 * Id Resource Test.
 */
class IdResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = IdResource::class;

    /**
     * @return array
     */
    public function methodsProvider(): array
    {
        $baseData = [
            'requestMethod' => RequestMethodEnum::GET,
            'endpointPath' => 'ids',
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceClass' => IdResource::class,
            'propertyValue' => self::VALID_ID,
            'additionalParams' => [],
            'methodName' => ResourceMethodEnum::GET_ALL,
        ];

        return [
            [
                $baseData,
            ],
        ];
    }
}
