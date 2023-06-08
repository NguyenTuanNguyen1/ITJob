<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Interfaces\IAdminRepository;
use App\Interfaces\ITypeRepository;
use App\Repositories\InformationTypeRepository;
use App\Repositories\RoleRepostitory;
use App\Repositories\TicketTypeRepository;
use App\Trait\Service;
use Illuminate\Http\Request;

/**
 * @property ITypeRepository $type_repo
 * @property TicketTypeRepository $ticketType_repo
 * @property InformationTypeRepository $infomationType_repo
 * @property RoleRepostitory $role_repo
 * @property IAdminRepository $admin_repo
 */
class TypeController extends Controller
{
    use Service;

    public function __construct
    (
        ITypeRepository $typeRepository,
        TicketTypeRepository $ticketTypeRepository,
        InformationTypeRepository $informationTypeRepository,
        RoleRepostitory $roleRepostitory,
        IAdminRepository $adminRepository
    ) {
        $this->type_repo = $typeRepository;
        $this->ticketType_repo = $ticketTypeRepository;
        $this->infomationType_repo = $informationTypeRepository;
        $this->role_repo = $roleRepostitory;
        $this->admin_repo = $adminRepository;
    }

    public function index(Request $request)
    {
        $input = $request->all();

        $allRole = $this->role_repo->all();
        $informationType = $this->type_repo->all();
        $ticket = $this->ticketType_repo->all();

        return response()->json([
            'role' => $allRole,
            'information' => $informationType,
            'ticket' => $ticket
        ]);
    }

    public function store(AdminRequest $request)
    {
        $input = $request->all();
        if (!$this->admin_repo->checkAdmin($input['user_id']))
        {
            abort(401);
        }
        if (
            $this->checkExist($input, Constant::TYPE_INFORMATION) ||
            $this->checkExist($input, Constant::TYPE_TICKET) ||
            $this->checkExist($input, Constant::TYPE_ROLE)
        ) {
            return response()->json([
                'result' => false,
                'message' => 'Nội dung đã tồn tại'
            ]);
        }

        try {
            switch ($input['type']) {
                case Constant::TYPE_ROLE:
                    $role = $this->role_repo->create($input);
                    break;
                case Constant::TYPE_INFORMATION:
                    $infor = $this->infomationType_repo->create($input);
                    break;
                case Constant::TYPE_TICKET:
                    $ticket = $this->ticketType_repo->create($input);
                    break;
            }
            if (empty($role) || empty($infor) || empty($ticket)) {
                return response()->json([
                    'result' => false,
                    'message' => 'Lỗi tạo nội dung'
                ]);
            }

            return response()->json([
                'result' => true,
                'message' => 'Đã tạo thành công'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(AdminRequest $request)
    {
        $input = $request->all();

        if (
            $this->checkExist($input, Constant::TYPE_INFORMATION) ||
            $this->checkExist($input, Constant::TYPE_TICKET) ||
            $this->checkExist($input, Constant::TYPE_ROLE)
        ) {
            return response()->json([
                'result' => false,
                'message' => 'Nội dung đã tồn tại'
            ]);
        }

        try {
            switch ($input['type']) {
                case Constant::TYPE_ROLE:
                    $this->role_repo->update($input['id'], $input);
                    break;
                case Constant::TYPE_INFORMATION:
                    $this->infomationType_repo->update($input['id'], $input);
                    break;
                case Constant::TYPE_TICKET:
                    $this->ticketType_repo->update($input['id'], $input);
                    break;
            }
            return response()->json([
                'result' => true,
                'message' => 'Đã chỉnh sửa thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function delete(AdminRequest $request)
    {
        $input = $request->all();

        try {
            switch ($input['type']) {
                case Constant::TYPE_ROLE:
                    $this->role_repo->delete($input['id']);
                    break;
                case Constant::TYPE_INFORMATION:
                    $this->infomationType_repo->delete($input['id']);
                    break;

                case Constant::TYPE_TICKET:
                    $this->ticketType_repo->delete($input['id']);
                    break;
            }
            return response()->json([
                'result' => true,
                'message' => 'Đã xoá thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function trashed(AdminRequest $request)
    {
        try {
            $allRole = $this->role_repo->trashed();
            $informationType = $this->type_repo->trashed();
            $ticket = $this->ticketType_repo->trashed();
            return response()->json([
                'role' => $allRole,
                'information' => $informationType,
                'ticket' => $ticket
            ]);
        }catch (\Exception $e)
        {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function restore(AdminRequest $request)
    {
        $input = $request->all();

        switch ($input['type']) {
            case Constant::TYPE_ROLE:
                $role = $this->role_repo->restore($input['id']);
                if (!empty($role)) {
                    return redirect()->route('home');
                }
                return redirect()->route('home');

            case Constant::TYPE_INFORMATION:
                $information = $this->infomationType_repo->restore($input['id']);
                if (!empty($information)) {
                    return redirect()->route('home');
                }
                return redirect()->route('home');

            case Constant::TYPE_TICKET:
                $ticket = $this->ticketType_repo->restore($input['id']);
                break;
        }
        return response()->json([
            'result' => true,
            'message' => 'Đã khôi phục thành công'
        ]);
    }
}
