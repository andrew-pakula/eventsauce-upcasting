<?php

declare(strict_types=1);

namespace Tests\PayloadUpcastingWithEventGuessing;

use EventSauce\EventSourcing\Serialization\SerializablePayload;

final class EventStub implements SerializablePayload
{
    public function __construct(public readonly string $foo, public readonly string $bar)
    {
    }

    public function toPayload(): array
    {
        return ['foo' => $this->foo, 'bar' => $this->bar];
    }

    public static function fromPayload(array $payload): static
    {
        return new self($payload['foo'], $payload['bar'] ?? 'undefined');
    }
}
