<?php

namespace App\Http\Controllers;

use App\Interfaces\IPostRepository;
use Illuminate\Http\Request;

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

    public function update(Request $request)
    {
        $input = $request->all();

        try {
            $this->post_repo->update($input['id'], $input);
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
