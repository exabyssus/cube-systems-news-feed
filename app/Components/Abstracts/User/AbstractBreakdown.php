<?php

namespace App\Components\Abstracts\User;

abstract class AbstractBreakdown
{
    abstract public function getFullName(): string;

    abstract public function getFirstName(): string;

    abstract public function setFirstName(string $firstName): void;

    abstract public function getLastName(): string;

    abstract public function setLastName(string $lastName): void;
}
