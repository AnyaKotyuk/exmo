<?php

namespace App\Repository;

use App\Entity\User;
use App\Enum\GenderEnum;
use App\Exception\RouteNotFoundException;
use App\Exception\SourceNotFoundException;
use DateTime;

class UserRepository
{
    /**
     * @return User[]
     */
    public function userList(): array
    {
        $firstUser = new User();
        $firstUser->setId(1);
        $firstUser->setName('John');
        $firstUser->setGender(new GenderEnum(GenderEnum::MALE));
        $firstUser->setBirthdate(new \DateTime('1967-02-04'));

        $secondUser = new User();
        $secondUser->setId(2);
        $secondUser->setName('Nick');
        $secondUser->setGender(new GenderEnum(GenderEnum::MALE));
        $secondUser->setBirthdate(new \DateTime('1969-09-07'));
        $secondUser->setAddress('Neuthorn street');

        $thirdUser = new User();
        $thirdUser->setId(3);
        $thirdUser->setName('Juli');
        $thirdUser->setGender(new GenderEnum(GenderEnum::FEMALE));
        $thirdUser->setAddress('Grouth street');

        return [
            $firstUser,
            $secondUser,
            $thirdUser
        ];
    }

    /**
     * @param int $id
     * @return User
     * @throws SourceNotFoundException
     */
    public function getOneByById(int $id): User
    {
        foreach ($this->userList() as $user) {
            if ($user->getId() == $id) {
                return $user;
            }
        }

        throw new SourceNotFoundException('User');
    }
}