<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BoardController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $board = Board::query()->get();
        return BoardResource::collection($board);
    }

    /**
     * @param BoardRequest $request
     * @return BoardResource
     */
    public function store(BoardRequest $request): BoardResource
    {
        $board = Board::query()->create($request->validated());
        return BoardResource::make($board);
    }

    /**
     * @param Board $board
     * @param BoardRequest $request
     * @return BoardResource
     */
    public function update(Board $board, BoardRequest $request): BoardResource
    {
        $board->update($request->validated());
        return BoardResource::make($board);
    }

    /**
     * @param Board $board
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Board $board)
    {
        $board->delete();
        return response('board deleted successfully', 400);
    }
}
