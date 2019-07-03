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

namespace wedocreatives\WrikePhpLibrary;

use wedocreatives\WrikePhpLibrary\Transformer\ApiExceptionTransformerInterface;
use wedocreatives\WrikePhpLibrary\Transformer\ResponseTransformerInterface;
use wedocreatives\WrikePhpLibrary\Validator\AccessTokenValidator;

/**
 * General Wrike Api.
 *
 * Entry point for all Wrike API operations. Immutable.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class Api extends AbstractApi implements ImmutableApiInterface
{
    /**
     * @param string $accessToken
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewAccessToken($accessToken): self
    {
        AccessTokenValidator::assertIsValid($accessToken);

        return new self($this->client, $this->responseTransformer, $this->apiExceptionTransformer, $accessToken);
    }

    /**
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewApiExceptionTransformer(ApiExceptionTransformerInterface $apiExceptionTransformer): self
    {
        return new self($this->client, $this->responseTransformer, $apiExceptionTransformer, $this->accessToken);
    }

    /**
     * @param ResponseTransformerInterface $responseTransformer
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewResponseTransformer(ResponseTransformerInterface $responseTransformer): self
    {
        return new self($this->client, $responseTransformer, $this->apiExceptionTransformer, $this->accessToken);
    }
}
