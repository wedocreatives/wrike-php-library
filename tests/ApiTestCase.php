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

use wedocreatives\WrikePhpLibrary\ApiInterface;
use wedocreatives\WrikePhpLibrary\Client\ClientInterface;
use wedocreatives\WrikePhpLibrary\Resource\AccountResource;
use wedocreatives\WrikePhpLibrary\Resource\AttachmentResource;
use wedocreatives\WrikePhpLibrary\Resource\ColorResource;
use wedocreatives\WrikePhpLibrary\Resource\CommentResource;
use wedocreatives\WrikePhpLibrary\Resource\ContactResource;
use wedocreatives\WrikePhpLibrary\Resource\CustomFieldResource;
use wedocreatives\WrikePhpLibrary\Resource\DependencyResource;
use wedocreatives\WrikePhpLibrary\Resource\FolderResource;
use wedocreatives\WrikePhpLibrary\Resource\GroupResource;
use wedocreatives\WrikePhpLibrary\Resource\IdResource;
use wedocreatives\WrikePhpLibrary\Resource\InvitationResource;
use wedocreatives\WrikePhpLibrary\Resource\TaskResource;
use wedocreatives\WrikePhpLibrary\Resource\TimelogCategoryResource;
use wedocreatives\WrikePhpLibrary\Resource\TimelogResource;
use wedocreatives\WrikePhpLibrary\Resource\UserResource;
use wedocreatives\WrikePhpLibrary\Resource\VersionResource;
use wedocreatives\WrikePhpLibrary\Resource\WorkflowResource;
use wedocreatives\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use wedocreatives\WrikePhpLibrary\Transformer\ResponseTransformerInterface;

/**
 * Api Test Case.
 */
abstract class ApiTestCase extends TestCase
{
    /**
     * @var ApiInterface
     */
    protected $object;

    public function setUp(): void
    {
        $accessTokenMock = 'token';
        $clientMock = $this->getMockBuilder(ClientInterface::class)->getMock();
        $responseTransformerMock = $this->getMockBuilder(ResponseTransformerInterface::class)->getMock();
        $apiExceptionTransformerMock = $this->getMockBuilder(ApiExceptionTransformerInterface::class)->getMock();

        $this->object = new $this->sourceClass(
            $clientMock,
            $responseTransformerMock,
            $apiExceptionTransformerMock,
            $accessTokenMock
        );
    }

    /**
     * @return array
     */
    public function constructorParamsProvider(): array
    {
        $accessTokenMock = 'token';
        $clientMock = $this->getMockBuilder(ClientInterface::class)->getMock();
        $responseTransformerMock = $this->getMockBuilder(ResponseTransformerInterface::class)->getMock();
        $apiExceptionTransformerMock = $this->getMockBuilder(ApiExceptionTransformerInterface::class)->getMock();
        $stdClass = new \stdClass();

        return [
            // [client, responseTransformer, apiExceptionTransformer, accessToken, isValid]
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, $accessTokenMock, true],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, '', true],

            // test client params
            [$stdClass, $responseTransformerMock, $apiExceptionTransformerMock, $accessTokenMock, false],
            [null, $responseTransformerMock, $apiExceptionTransformerMock, $accessTokenMock, false],

            // test apiExceptionTransformer params
            [$clientMock, $responseTransformerMock, $stdClass, $accessTokenMock, false],
            [$clientMock, $responseTransformerMock, null, $accessTokenMock, false],

            // test accessToken params
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, $stdClass, false],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, null, false],
            [$clientMock, $responseTransformerMock, $apiExceptionTransformerMock, 123, false],
        ];
    }

    /**
     * @param mixed $client
     * @param mixed $responseTransformer
     * @param mixed $apiExceptionTransformerMock
     * @param mixed $accessToken
     * @param bool  $isValid
     *
     * @internal     param mixed $transformer
     * @dataProvider constructorParamsProvider
     */
    public function test_constructorParams(
        $client,
        $responseTransformer,
        $apiExceptionTransformerMock,
        $accessToken,
        $isValid
    ): void {
        $exceptionOccurred = false;

        try {
            new $this->sourceClass($client, $responseTransformer, $apiExceptionTransformerMock, $accessToken);
        } catch (\Throwable $t) {
            $exceptionOccurred = true;
        }

        if (false === $isValid) {
            self::assertTrue($exceptionOccurred);
        }
        if (true === $isValid) {
            self::assertFalse($exceptionOccurred);
        }
    }

    /**
     * @return array
     */
    public function resourceProvider(): array
    {
        $this->setUp();

        return [
            // [api, getResourceMethod, expectedResourceClass]
            [$this->object, 'contacts', ContactResource::class],
            [$this->object, 'getContactResource', ContactResource::class],
            [$this->object, 'users', UserResource::class],
            [$this->object, 'getUserResource', UserResource::class],
            [$this->object, 'groups', GroupResource::class],
            [$this->object, 'getGroupResource', GroupResource::class],
            [$this->object, 'invitations', InvitationResource::class],
            [$this->object, 'getInvitationResource', InvitationResource::class],
            [$this->object, 'account', AccountResource::class],
            [$this->object, 'getAccountResource', AccountResource::class],
            [$this->object, 'workflows', WorkflowResource::class],
            [$this->object, 'getWorkflowResource', WorkflowResource::class],
            [$this->object, 'customFields', CustomFieldResource::class],
            [$this->object, 'getCustomFieldResource', CustomFieldResource::class],
            [$this->object, 'folders', FolderResource::class],
            [$this->object, 'getFolderResource', FolderResource::class],
            [$this->object, 'tasks', TaskResource::class],
            [$this->object, 'getTaskResource', TaskResource::class],
            [$this->object, 'comments', CommentResource::class],
            [$this->object, 'getCommentResource', CommentResource::class],
            [$this->object, 'dependencies', DependencyResource::class],
            [$this->object, 'getDependencyResource', DependencyResource::class],
            [$this->object, 'timelogs', TimelogResource::class],
            [$this->object, 'getTimelogResource', TimelogResource::class],
            [$this->object, 'timelogCategories', TimelogCategoryResource::class],
            [$this->object, 'getTimelogCategoryResource', TimelogCategoryResource::class],
            [$this->object, 'attachments', AttachmentResource::class],
            [$this->object, 'getAttachmentResource', AttachmentResource::class],
            [$this->object, 'version', VersionResource::class],
            [$this->object, 'getVersionResource', VersionResource::class],
            [$this->object, 'ids', IdResource::class],
            [$this->object, 'getIdResource', IdResource::class],
            [$this->object, 'colors', ColorResource::class],
            [$this->object, 'getColorResource', ColorResource::class],
        ];
    }

    /**
     * @param ApiInterface $api
     * @param string       $getResourceMethod
     * @param string       $expectedResourceClass
     *
     * @dataProvider resourceProvider
     */
    public function test_getResource($api, $getResourceMethod, $expectedResourceClass): void
    {
        $resourceOriginal = $api->{$getResourceMethod}();
        self::assertInstanceOf($expectedResourceClass, $resourceOriginal);
        self::assertNotSame($resourceOriginal, $api->{$getResourceMethod}());
    }

    public function test_testGetResourceProviderCoverAllMethods(): void
    {
        $class = new \ReflectionClass($this->sourceClass);
        $expectedMethodNames = $class->getMethods(\ReflectionMethod::IS_PUBLIC);
        $resourceProviderArray = $this->resourceProvider();
        $coveredMethodNames = [];
        foreach ($resourceProviderArray as $resourceProviderRow) {
            $coveredMethodName = $resourceProviderRow[1];
            $coveredMethodNames[$coveredMethodName] = $coveredMethodName;
        }

        $excludedMethods = [
            '__construct',
            'recreateForNewAccessToken',
            'recreateForNewApiExceptionTransformer',
            'recreateForNewResponseTransformer',
            'normalizeParams',
        ];

        foreach ($expectedMethodNames as $expectedMethodName) {
            if (\in_array($expectedMethodName->getName(), $excludedMethods, true)) {
                continue;
            }
            self::assertArrayHasKey(
                $expectedMethodName->getName(),
                $coveredMethodNames,
                sprintf('%s not covered by tests', $expectedMethodName->getName())
            );
        }
    }

    public function test_normalizeParams(): void
    {
        $resource = fopen(__FILE__, 'rb');
        $inputParams = [
            'one' => 'one',
            'two' => 2,
            'three' => true,
            'four' => null,
            'five' => ['one' => 'one', 'two' => 2],
            'six' => $resource,
        ];

        $outputParams = [
            'one' => 'one',
            'two' => '2',
            'three' => 'true',
            'four' => 'null',
            'five' => '{"one":"one","two":2}',
            'six' => $resource,
        ];

        self::assertSame($outputParams, $this->object->normalizeParams($inputParams));
    }
}
