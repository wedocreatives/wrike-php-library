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

/**
 * Api Interface for immutable operations.
 */
interface ImmutableApiInterface extends ApiInterface
{
    /**
     * @param string $accessToken
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function recreateForNewAccessToken($accessToken);

    /**
     * @param ApiExceptionTransformerInterface $apiExceptionTransformer
     *
     * @return $this
     */
    public function recreateForNewApiExceptionTransformer(ApiExceptionTransformerInterface $apiExceptionTransformer);

    /**
     * @param ResponseTransformerInterface $responseTransformer
     *
     * @return $this
     */
    public function recreateForNewResponseTransformer(ResponseTransformerInterface $responseTransformer);
}
