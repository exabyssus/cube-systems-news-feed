<?php

namespace App\Components\Classes\User;

use App\Component\Interfaces\User\BreakdownInterface;
use App\Components\Abstracts\User\AbstractBreakdown;

class Breakdown extends AbstractBreakdown implements BreakdownInterface
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /**
     * Breakdown constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->firstName = $data['first_name'] ?? '';
        $this->lastName = $data['last_name'] ?? '';
    }

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set first name
     *
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set last name
     *
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return rtrim(
            sprintf('%s %s', $this->firstName, $this->lastName)
        );
    }
}
