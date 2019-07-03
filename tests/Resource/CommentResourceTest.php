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
use wedocreatives\WrikePhpLibrary\Resource\CommentResource;

/**
 * Comment Resource Test.
 */
class CommentResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = CommentResource::class;

    /**
     * @return array
     */
    public function methodsProvider(): array
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceClass' => CommentResource::class,
            'propertyValue' => self::VALID_ID,
        ];

        return [
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_ALL,
                    'endpointPath' => 'comments',
                    'additionalParams' => [],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_ALL_FOR_FOLDER,
                    'endpointPath' => sprintf('folders/%s/comments', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_ALL_FOR_TASK,
                    'endpointPath' => sprintf('tasks/%s/comments', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                    'endpointPath' => sprintf('comments/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_IDS,
                    'endpointPath' => sprintf('comments/%s', implode(',', [self::UNIQUE_ID])),
                    'additionalParams' => [[self::UNIQUE_ID]],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::POST,
                    'methodName' => ResourceMethodEnum::CREATE_FOR_FOLDER,
                    'endpointPath' => sprintf('folders/%s/comments', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::POST,
                    'methodName' => ResourceMethodEnum::CREATE_FOR_TASK,
                    'endpointPath' => sprintf('tasks/%s/comments', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::PUT,
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf('comments/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::DELETE,
                    'methodName' => ResourceMethodEnum::DELETE,
                    'endpointPath' => sprintf('comments/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
        ];
    }
}
