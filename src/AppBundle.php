<?php

namespace Curse89;

class AppBundle
{
    public function __construct(public int $systemId, public string $systemSecret)
    {
    }
}