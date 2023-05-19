<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
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
        dd('theel');
        $user = $this->user_repo->find($id);
        $company = $this->company_repo->find($id);
        $information = $this->information_repo->find($id);
        return view('test')->with('user', $user)
                                ->with('company', $company)
                                ->with('information', $information);
    }

    public function handleUpdate(UpdateRequest $request)
    {
        try {
            $input = $request->all();

            DB::beginTransaction();

            $input['image'] = $this->uploadImage($request);

            $this->user_repo->update($input['id'], $input);
            $this->information_repo->update($input['id'], $input);
            DB::commit();

            return response()->json([
                'result' => true
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'result' => false,
                'message'=> $e->getMessage()
            ]);
        }
    }
}
