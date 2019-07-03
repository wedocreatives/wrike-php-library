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

namespace wedocreatives\WrikePhpLibrary\Resource;

use wedocreatives\WrikePhpLibrary\Client\ClientInterface;
use wedocreatives\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use wedocreatives\WrikePhpLibrary\Resource\Helpers\RequestPathProcessor;
use wedocreatives\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use wedocreatives\WrikePhpLibrary\Transformer\ResponseTransformerInterface;
use wedocreatives\WrikePhpLibrary\Validator\AccessTokenValidator;

/**
 * Resource Abstract.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractResource implements ResourceInterface
{
    /**
     * Concrete HTTP client.
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * Access Token.
     *
     * Access Token must be added to request Headers.
     * 'Authorization: Bearer Access-Token'
     *
     * @var string
     */
    protected $accessToken = '';

    /**
     * Response Transformer.
     *
     * Transform PSR Response or JSON string from HTTP Client to another format: Array, Object, ...
     *
     * @var ResponseTransformerInterface
     */
    protected $responseTransformer;

    /**
     * Api Exception transformer.
     *
     * Transform Exceptions throw by HTTP Client to another Exceptions.
     *
     * @see \wedocreatives\WrikePhpLibrary\Exception\Api\ApiException
     *
     * @var ApiExceptionTransformerInterface
     */
    protected $apiExceptionTransformer;

    /**
     * Helper for request path calculations.
     *
     * @var RequestPathProcessor
     */
    protected $requestPathProcessor;

    /**
     * Resource constructor.
     *
     * @param ClientInterface                  $client
     * @param ResponseTransformerInterface     $responseTransformer
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     * @param string                           $accessToken
     */
    public function __construct(
        ClientInterface $client,
        ResponseTransformerInterface $responseTransformer,
        ApiExceptionTransformerInterface $apiExceptionTransformer,
        string $accessToken
    ) {
        AccessTokenValidator::isValidOrEmpty($accessToken);

        $this->client = $client;
        $this->responseTransformer = $responseTransformer;
        $this->apiExceptionTransformer = $apiExceptionTransformer;
        $this->accessToken = $accessToken;

        $this->requestPathProcessor = new RequestPathProcessor();
    }

    /**
     * Return connection array ResourceMethod => RequestPathFormat.
     *
     * @see \wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum
     * @see \wedocreatives\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @return array
     */
    abstract protected function getResourceMethodConfiguration(): array;

    /**
     * @param string            $requestMethod
     * @param string            $resourceMethod
     * @param array             $params
     * @param string|array|null $id
     *
     * @throws \wedocreatives\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Throwable
     *
     * @return mixed
     */
    protected function executeRequest(string $requestMethod, string $resourceMethod, array $params, $id)
    {
        RequestMethodEnum::assertIsValidValue($requestMethod);
        ResourceMethodEnum::assertIsValidValue($resourceMethod);
        AccessTokenValidator::isValid($this->accessToken);

        $requestPathForResourceMethod = $this->requestPathProcessor
            ->prepareRequestPathForResourceMethod(
                $resourceMethod,
                $id,
                $this->getResourceMethodConfiguration()
            );

        try {
            $response = $this->client->executeRequestForParams(
                $requestMethod,
                $requestPathForResourceMethod,
                $params,
                $this->accessToken
            );
        } catch (\Throwable $e) {
            throw $this->apiExceptionTransformer->transform($e);
        }

        if (ResourceMethodEnum::DOWNLOAD === $resourceMethod ||
            ResourceMethodEnum::DOWNLOAD_PREVIEW === $resourceMethod) {
            return $response;
        }

        return $this->responseTransformer->transform($response, static::class);
    }
}
