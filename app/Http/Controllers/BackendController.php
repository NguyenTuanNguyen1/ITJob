<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IPostRepository;
use App\Interfaces\IReviewRepository;
use App\Interfaces\ITicketRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\RoleRepostitory;
use Illuminate\Http\Request;

/**
 * @property IPostRepository $post_repo
 * @property IUserRepository $user_repo
 * @property IAdminRepository $admin_repo
 * @property ITicketRepository $ticket_repo
 * @property IInformationRepository $information_repo
 * @property IReviewRepository $review_repo
 * @property RoleRepostitory $role_repo
 */
class BackendController extends Controller
{
    public function __construct
    (
        IUserRepository $userRepository,
        IPostRepository $postRepository,
        IAdminRepository $adminRepository,
        ITicketRepository $ticketRepository,
        IInformationRepository $informationRepository,
        IReviewRepository $reviewRepository,
        RoleRepostitory $roleRepostitory
    )
    {
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
        $this->admin_repo = $adminRepository;
        $this->ticket_repo = $ticketRepository;
        $this->information_repo = $informationRepository;
        $this->review_repo = $reviewRepository;
        $this->role_repo = $roleRepostitory;
    }

    public function getAllPost()
    {
        $posts = $this->post_repo->all();
        $admin = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_ADMIN);
        $company = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_COMPANY);
        $candidate = $this->user_repo->getUserByCondition('role_id',Constant::ROLE_CANDIDATE);
        $role = $this->role_repo->all();
        $information_type = $this->information_repo->all();
        $review = $this->review_repo->all();
    }
}
