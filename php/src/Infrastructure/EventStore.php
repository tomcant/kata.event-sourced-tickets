<?php

namespace Aardling\Concerts\Infrastructure;

use Aardling\Concerts\DomainEvent;

interface EventStore
{
    /**
     * @param string $streamId
     * @return DomainEvent[]
     */
    public function findEventsByStreamId(string $streamId): array;

    /**
     * @param string $streamId
     * @param DomainEvent[] $domainEvents
     */
    public function appendEventsToStream(string $streamId, array $domainEvents): void;
}