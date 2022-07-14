<?php

namespace Aardling\Concerts\Domain;

use Aardling\Concerts\DomainEvent;

class ConcertPlanned implements DomainEvent
{
    private string $concertId;
    private int $capacity;

    public function getType(): string
    {
        return 'ConcertPlanned';
    }

    /**
     * @param string $concertId
     * @param int $capacity
     */
    public function __construct(string $concertId, int $capacity)
    {
        $this->concertId = $concertId;
        $this->capacity = $capacity;
    }

    /**
     * @return string
     */
    public function getConcertId(): string
    {
        return $this->concertId;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @return string
     */
    public function getStreamId(): string
    {
        return $this->concertId;
    }
}
