<?php
namespace App\Controllers;

use App\Repositories\UserRepository;
use DDesrosiers\SilexAnnotations\Annotations as SLX;
use Doctrine\Common\Persistence\ObjectRepository;
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
     * @SLX\Route(
     * @SLX\Request(method="GET", uri="/api/user")
     * )
     */
    public function fetchAllAction()
    {
        $sortByColumn = $this->request->query->get('sort_by', 'user.uid');
        return $this->userRepository->findAllSorted($sortByColumn);
    }
}
