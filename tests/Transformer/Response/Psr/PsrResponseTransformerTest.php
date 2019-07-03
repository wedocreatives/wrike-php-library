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

namespace wedocreatives\WrikePhpLibrary\Tests\Transformer\Response\Psr;

use Psr\Http\Message\ResponseInterface;
use wedocreatives\WrikePhpLibrary\Transformer\Response\Psr\PsrResponseTransformer;

/**
 * Psr Response Transformer Test.
 */
class PsrResponseTransformerTest extends PsrResponseTransformerTestCase
{
    /**
     * @var PsrResponseTransformer
     */
    protected $object;

    public function setUp(): void
    {
        $this->object = new PsrResponseTransformer();
    }

    public function test_transform(): void
    {
        /** @var ResponseInterface $responseMock */
        $responseMock = $this->getMockForAbstractClass(ResponseInterface::class);
        $returnedResponse = $this->object->transform($responseMock, 'unimportant');

        $this->assertSame($responseMock, $returnedResponse);
    }
}
