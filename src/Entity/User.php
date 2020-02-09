<?php

namespace App\Entity;

use App\Enum\GenderEnum;
use DateTimeInterface;

class User
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    public $name;

    /** @var GenderEnum|null $gender */
    public $gender;

    /** @var DateTimeInterface|null $birthdate */
    public $birthdate;

    /** @var string|null $address */
    public $address;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getGender(): ?GenderEnum
    {
        return $this->gender;
    }

    public function setGender(GenderEnum $gender): void
    {
        $this->gender = $gender;
    }

    public function getBirthdate(): ?DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(DateTimeInterface $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function __set($name, $value)
    {
        return;
    }

    public function __get($name)
    {
        return;
    }
}