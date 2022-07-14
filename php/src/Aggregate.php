<?php declare(strict_types=1);

namespace Aardling\Concerts;

class Aggregate
{
    private array $events;

    /**
     * @param DomainEvent[] $events
     */
    public static function buildFromHistory(array $events): self
    {
        $aggregate = new static();

        foreach ($events as $event) {
            $aggregate->apply($event);
        }

        return $aggregate;
    }

    /**
     * @return DomainEvent[]
     */
    public function getRecordedChanges(): array
    {
        $events = $this->events;

        $this->events = [];

        return $events;
    }

    protected function raise(DomainEvent $event): void
    {
        $this->apply($event);

        $this->events[] = $event;
    }

    protected function apply(DomainEvent $event): void
    {
        $this->{'apply' . $event->getType()}($event);
    }
}
