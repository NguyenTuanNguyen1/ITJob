<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
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
 */
class TypeController extends Controller
{
    use Service;
    public function __construct
    (
        ITypeRepository $typeRepository,
        TicketTypeRepository $ticketTypeRepository,
        InformationTypeRepository $informationTypeRepository,
        RoleRepostitory $roleRepostitory
    )
    {
        $this->type_repo = $typeRepository;
        $this->ticketType_repo = $ticketTypeRepository;
        $this->infomationType_repo = $informationTypeRepository;
        $this->role_repo = $roleRepostitory;
    }

    public function index()
    {
        $allRole = $this->role_repo->all();
        $informationType = $this->type_repo->all();
        $ticket = $this->ticketType_repo->all();
        return response()->json([
            'role' => $allRole,
            'information' => $informationType,
            'ticket' => $ticket
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        if (
            $this->checkExist($input, Constant::TYPE_INFORMATION) ||
            $this->checkExist($input,Constant::TYPE_TICKET) ||
            $this->checkExist($input,Constant::TYPE_ROLE)
        )
        {
            return response()->json([
                'result' => false,
                'message' => 'Nội dung đã tồn tại'
            ]);
        }

        switch ($input['type'])
        {
            case Constant::TYPE_ROLE:
                $this->role_repo->create($input);
                break;
            case Constant::TYPE_INFORMATION:
                $this->infomationType_repo->create($input);
                break;
            case Constant::TYPE_TICKET:
                $this->ticketType_repo->create($input);
                break;
        }
        return response()->json([
            'result' => true,
            'message' => 'Đã tạo thành công'
        ]);
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if (
            $this->checkExist($input, Constant::TYPE_INFORMATION) ||
            $this->checkExist($input,Constant::TYPE_TICKET) ||
            $this->checkExist($input,Constant::TYPE_ROLE)
        )
        {
            return response()->json([
                'result' => false,
                'message' => 'Nội dung đã tồn tại'
            ]);
        }

        switch ($input['type'])
        {
            case Constant::TYPE_ROLE:
                $this->role_repo->update($input['id'],$input);
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
    }

    public function delete(Request $request)
    {
        $input = $request->all();

        switch ($input['type'])
        {
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
    }

    public function trashed()
    {
        $allRole = $this->role_repo->trashed();
        $informationType = $this->type_repo->trashed();
        $ticket = $this->ticketType_repo->trashed();
        return response()->json([
            'role' => $allRole,
            'information' => $informationType,
            'ticket' => $ticket
        ]);
    }

    public function restore(Request $request)
    {
        $input = $request->all();

        switch ($input['type'])
        {
            case Constant::TYPE_ROLE:
                $role = $this->role_repo->restore($input['id']);
                if (!empty($role)) {
                    toast('Đã khôi phục thành công', 'success');
                    return redirect()->route('home');
                }
                return redirect()->route('home');

            case Constant::TYPE_INFORMATION:
                $information = $this->infomationType_repo->restore($input['id']);
                if (!empty($information)) {
                    toast('Đã xoá thành công', 'success');
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
