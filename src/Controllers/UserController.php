<?php
namespace App\Controllers;

use App\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var Request
     */
    protected $request;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     * @param Request $request
     */
    public function __construct(UserRepository $userRepository, Request $request)
    {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function fetchAllAction()
    {
        $sortByColumn = $this->request->query->get('sort_by', 'user.id');
        $sortByDirection = $this->request->query->get('sort_dir', 'asc');
        return $this->userRepository->findAllSorted($sortByColumn, $sortByDirection);
    }
}
