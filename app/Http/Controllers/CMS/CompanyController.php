<?php

namespace App\Http\Controllers;

use App\Interfaces\IPostRepository;

/**
 * @property IPostRepository $post_repo
 */
class CompanyController extends Controller
{
    public function __construct
    (
        IPostRepository $postRepository,
    )
    {
        $this->post_repo = $postRepository;
    }
}
