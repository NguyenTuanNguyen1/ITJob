<?php

namespace App\Http\Controllers\CMS;

use App\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Interfaces\IAdminRepository;
use App\Interfaces\ITypeRepository;
use App\Repositories\InformationTypeRepository;
use App\Repositories\RoleRepository;
use App\Repositories\TicketTypeRepository;
use App\Trait\Service;
use Illuminate\Http\Request;

/**
 * @property InformationTypeRepository $type_repo
 */
class TypeController extends Controller
{
    use Service;

    public function __construct
    (
        InformationTypeRepository $typeRepository,
    ) {
        $this->type_repo = $typeRepository;
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $this->type_repo->create($input);
        return response()->json([
            'result' => true,
            'message' => 'Đã tạo thành công'
        ]);


    }

    public function update(Request $request)
    {
        $input = $request->all();

        $this->type_repo->update($input['id'], $input);
        return redirect()->route('dashboard.information');

    }

    public function delete(Request $request)
    {
        $input = $request->all();

        $this->type_repo->delete($input['id']);
        return response()->json([
            'result' => true,
            'message' => 'Đã xoá thành công'
        ]);

    }
}
