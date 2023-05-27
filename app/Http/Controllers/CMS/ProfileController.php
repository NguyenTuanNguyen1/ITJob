<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IReviewRepository;
use App\Interfaces\ITypeRepository;
use App\Interfaces\IUserRepository;
use App\Repositories\InformationTypeRepository;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @property IUserRepository $user_repo
 * @property ICompanyRepository $company_repo
 * @property IInformationRepository $information_repo
 * @property ITypeRepository $type_repo
 * @property IReviewRepository $review_repo
 */
class ProfileController extends Controller
{
    use Service;
    public function __construct
    (
        IUserRepository $userRepository,
        ICompanyRepository $companyRepository,
        IInformationRepository $informationRepository,
        InformationTypeRepository $typeRepository,
        IReviewRepository $reviewRepository
    )
    {
        $this->user_repo = $userRepository;
        $this->company_repo = $companyRepository;
        $this->information_repo = $informationRepository;
        $this->type_repo = $typeRepository;
        $this->review_repo = $reviewRepository;
    }

    public function profile($id, Request $request)
    {
        $user = $this->user_repo->find($id);
        $company = $this->company_repo->find($id);
        $information = $this->information_repo->find($id);
        $type = $this->type_repo->all();
        $review = $this->review_repo->getReviewByUser($id);

        if ($request->ajax()) {
            return response()->json([
                'information' => $information,
                'user' => $user,
                'company' => $company,
                'reviews' => $review,
                'type_infor' => $type,
                'count_review' => count($review)
            ]);
        }

        return view('user.personal.update-infor')
            ->with([
                'user' => $user,
                'company' => $company,
                'information' => $information,
                'type_infor' => $type,
                'reviews' => $review,
                'count_review' => count($review)
            ]);
    }

    public function handleUpdate(UpdateRequest $request)
    {
        $input = $request->all();

        $profile = $this->user_repo->update($input['id'], $input);
        $this->ActivityLog("Bạn đã cập nhật thông tin cá nhân", $input['id']);

        if ($request->ajax())
        {
            return response()->json([
                'profile' => $profile
            ]);
        }
        alert('Chỉnh sửa tài khoản thành công', null, 'success');
        return redirect()->route('user.profile', $input['id']);
    }

    public function handleUpdateBasic(Request $request)
    {
        $input = $request->all();

        $input['img_avatar'] = $this->uploadImage($input['img_avatar']);
        $this->user_repo->updateAvatarAndName($input['id'], $input);

        alert('Chỉnh sửa tài khoản thành công', null, 'success');
        return redirect()->route('user.profile', $input['id']);
    }

    public function handleUpdateInfor(Request $request)
    {
        $input = $request->all();

        $input['ticket_reply'] = $input['post_id'] = null;
        $infor = $this->information_repo->create($input['id'], $input);

        $this->ActivityLog("Bạn đã cập nhật thông tin cá nhân", $input['id']);
        if ($request->ajax())
        {
            return response()->json([
                'infor' => $infor
            ]);
        }
        alert('Cập nhật thông tin thành công', null, 'success');
        return redirect()->route('user.profile', $input['id']);
    }
}
