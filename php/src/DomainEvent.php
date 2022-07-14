<?php

namespace Aardling\Concerts;

interface DomainEvent
{
    public function getStreamId(): string;

    public function getType(): string;
}
