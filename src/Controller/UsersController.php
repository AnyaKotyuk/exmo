<?php

namespace App\Controller;

use App\Communication\JsonResponse;
use App\Communication\ResponseBodyInterface;
use App\Repository\UserRepository;

class UsersController extends AbstractController
{
    /**
     * @param int|null $id
     * @return ResponseBodyInterface
     * @throws \App\Exception\SourceNotFoundException
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
        $response->setBody(json_encode($result));

        return $response;
    }
}