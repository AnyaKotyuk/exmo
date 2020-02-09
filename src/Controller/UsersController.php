<?php

namespace App\Controller;

use App\Communication\Response\JsonResponse;
use App\Communication\Response\ResponseBodyInterface;
use App\Repository\UserRepository;
use App\Exception\SourceNotFoundException;

class UsersController extends AbstractController
{
    /**
     * Get all users or user by {id}
     *
     * @param int|null $id
     * @return ResponseBodyInterface
     * @throws SourceNotFoundException
     */
    public function index(?int $id): ResponseBodyInterface
    {
        $userRepository = new UserRepository();

        if ($id) {
            $result = $userRepository->getOneByById($id);
        } else {
            $result = $userRepository->userList();
        }

        $response = new JsonResponse();
        $response->setBody(json_encode($result)); // TODO: create rest entity for correct resource representation

        return $response;
    }
}