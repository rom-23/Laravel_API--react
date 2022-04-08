<?php

namespace App\Http\Controllers;

use App\Http\Validation\PictureValidation;
use App\Models\Like;
use App\Models\Picture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class PictureController
 * @package App\Http\Controllers
 */
class PictureController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $param = $request->input('search');
        if ($param) {
            $pictures = Picture::where('title', 'like', '%' . $param . '%')->get();
        } else {
            $pictures = Picture::all();
        }
        return response()->json($pictures);
    }

    /**
     * @param Request $request
     * @param PictureValidation $validation
     * @return JsonResponse
     */
    public function store(Request $request, PictureValidation $validation): JsonResponse
    {
        $validator = Validator::make($request->all(), $validation->Rules(), $validation->Messages());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $fullFileName = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $file = $fileName . '_' . time() . '.' . $extension;
        $request->file('image')->storeAs('public/pictures', $file);
        $picture = Picture::create([
            'image' => $file,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->getAuthIdentifier()
        ]);
        return response()->json($picture);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $picture = Picture::find($id);
        if (!$picture) {
            return response()->json(['message' => 'Not found'], 403);
        }
        return response()->json($picture);

    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function checkLike($id): JsonResponse
    {
        $picture = Picture::find($id);
        if (Auth::user()) {
            $like = Like::where('picture_id', $picture->id)->where('user_id', Auth::user()->getAuthIdentifier())->first();
            if ($like) {
                return response()->json(true, 200);
            }
        }
        return response()->json(false, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function handleLike($id): JsonResponse
    {
        $picture = Picture::find($id);
        $like = Like::where('picture_id', $picture->id)->where('user_id', Auth::user()->getAuthIdentifier())->first();
        if ($like) {
            $like->delete();
            return response()->json(['success' => 'Picture unliked'], 200);
        }
        Like::create([
            'picture_id' => $picture->id,
            'user_id' => Auth::user()->getAuthIdentifier()
        ]);
        return response()->json(['success' => 'Picture liked'], 200);
    }

}
