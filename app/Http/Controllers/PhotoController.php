<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class PhotoController
 * @package App\Http\Controllers
 */
class PhotoController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
       $photos = Photo::all();
       return response()->json($photos);
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:10',
            'description' => 'required|min:10'
        ], [
            'title.required' => 'title is needed',
            'description.required' => 'description is not valid'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        Photo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        return response()->json(['success'=>'Saved in DB']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        //
    }

    /**
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        //
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        //
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
