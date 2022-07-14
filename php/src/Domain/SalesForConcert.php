<?php

namespace Aardling\Concerts\Domain;

use Aardling\Concerts\Aggregate;

class SalesForConcert extends Aggregate
{
    private string $concertId;
    private string $capacity;
    private int $numberOfTicketsSold = 0;

    public function buyTickets(string $customerId, int $quantity): void
    {
        $this->raise(new TicketsSold($this->concertId, $customerId, $quantity));
    }

    protected function applyConcertPlanned(ConcertPlanned $event): void
    {
        $this->concertId = $event->getConcertId();
        $this->capacity = $event->getCapacity();
    }

    protected function applyTicketsSold(TicketsSold $event): void
    {
        if ($this->numberOfTicketsSold + $event->getQuantity() > $this->capacity) {
            throw new NoTicketsAvailableAnymore();
        }

        $this->numberOfTicketsSold += $event->getQuantity();
    }
}
