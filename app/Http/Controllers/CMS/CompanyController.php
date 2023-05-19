<?php

namespace App\Http\Controllers;

use App\Constant;
use App\Interfaces\IAdminRepository;
use App\Interfaces\IPostRepository;
use Illuminate\Http\Request;

/**
 * @property IPostRepository $post_repo
 * @property IAdminRepository $admin_repo
 */
class CompanyController extends Controller
{
    public function __construct
    (
        IPostRepository $postRepository,
        IAdminRepository $adminRepository
    )
    {
        $this->post_repo = $postRepository;
        $this->admin_repo = $adminRepository;
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if (!$this->admin_repo->checkRole(Constant::ROLE_COMPANY, $input['company_id']))
        {
            abort(401);
        }

        try {
            $this->post_repo->update($input['id'], $input);

            $this->ActivityLog(  "Bạn đã cập nhật thông tin cá nhân", $input['user_id']);

            return response()->json([
                'result' => true
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
