<?php

namespace App\Http\Controllers;

use App\Interfaces\MovementRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private MovementRepositoryInterface $movementRepository;

    public function __construct(MovementRepositoryInterface $movementRepository)
    {
        $this->movementRepository = $movementRepository;
    }

    public function index(): View
    {
        $movements = DB::table('movements')->where('created_by', '=', Auth::id())->get();
        return view('home', [
            'movements' => $movements,
            'total_movements' => $movements->sum('value'),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $movementDetails = $request->only([
            'client',
            'details'
        ]);

        return response()->json(
            [
                'data' => $this->movementRepository->createMovement($movementDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $movementId = $request->route('id');

        return response()->json([
            'data' => $this->movementRepository->getMovementById($movementId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $movementId = $request->route('id');
        $movementDetails = $request->only([
            'client',
            'details'
        ]);

         response()->json([
            'data' => $this->movementRepository->updateMovement($movementId, $movementDetails)
        ]);

        return view('home', [
            'movements' => $this->index(),
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $movementId = $request->route('id');
        $this->movementRepository->deleteMovement($movementId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
