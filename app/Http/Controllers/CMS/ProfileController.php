<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Interfaces\ICompanyRepository;
use App\Interfaces\IInformationRepository;
use App\Interfaces\IUserRepository;
use App\Trait\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @property IUserRepository $user_repo
 * @property ICompanyRepository $company_repo
 * @property IInformationRepository $information_repo
 */
class ProfileController extends Controller
{
    use Service;
    public function __construct
    (
        IUserRepository $userRepository,
        ICompanyRepository $companyRepository,
        IInformationRepository $informationRepository
    )
    {
        $this->user_repo = $userRepository;
        $this->company_repo = $companyRepository;
        $this->information_repo = $informationRepository;
    }

    public function profile($id, Request $request)
    {
        $user = $this->user_repo->find($id);
        $company = $this->company_repo->find($id);
        $information = $this->information_repo->find($id);
        return view('test')->with('user', $user)
                                ->with('company', $company)
                                ->with('information', $information);
    }

    public function handleUpdate(Request $request)
    {
        try {
            $input = $request->all();

            if ($this->checkExist($input, Constant::CHECK_USERNAME))
            {
                return redirect()->back()->with('Error','Tên đăng nhập đã tồn tại');
            }
            if ($this->checkExist($input,Constant::CHECK_EMAIL_EXIST))
            {
                return redirect()->back()->with('Error','Email đã tồn tại');
            }
            if($this->checkExist($input,Constant::CHECK_PHONE_EXIST))
            {
                return redirect()->back()->with('Error','Số điện thoại đã tồn tại');
            }

            DB::beginTransaction();

            $this->checkExist($input['email'], Constant::CHECK_EMAIL_EXIST);
            $input['image'] = $this->uploadImage($request);

            $this->user_repo->update($input['id'], $input);
            $this->information_repo->update($input['id'], $input);

            switch ($input['role_id']) {
                case Constant::ROLE_CANDIDATE:
                    return redirect()->route('home');

                case Constant::ROLE_COMPANY:
                    $this->company_repo->update($input['id'], $input);
                    DB::commit();
                    return redirect()->route('home');

                default:
                    return redirect()->route('home123');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
}
