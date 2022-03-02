<?php

namespace Aardling\Concerts;

interface DomainEvent
{
    public function getStreamId(): string;
}
