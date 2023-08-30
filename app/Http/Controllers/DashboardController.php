<?php

namespace App\Http\Controllers;

use App\Interfaces\MovementRepositoryInterface;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @var MovementRepositoryInterface
     */
    private MovementRepositoryInterface $movementRepository;

    /**
     * @param MovementRepositoryInterface $movementRepository
     */
    public function __construct(MovementRepositoryInterface $movementRepository)
    {
        $this->movementRepository = $movementRepository;
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $movementDetails = $request->only([
            'client',
            'details',
        ]);

        return response()->json(
            [
                'data' => $this->movementRepository->createMovement($movementDetails),
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $movementId = $request->route('id');

        return response()->json([
            'data' => $this->movementRepository->getMovementById($movementId),
        ]);
    }

    /**
     * @param Request $request
     *
     *
     */
    public function update(Request $request)
    {
        $movementId      = $request->route('id');
        $movementDetails = $request->only([
            'client',
            'details',
        ]);

        response()->json([
            'data' => $this->movementRepository->updateMovement($movementId, $movementDetails),
        ]);

        return view('home', [
            'movements' => $this->index(),
        ]);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        //Todo: Review this part of code | error deploy when user as no movement
        $movements = DB::table('movements')->where('created_by', '=', Auth::id())->get();
        return view('home', [
            'movements'       => $movements,
            'total_movements' => $movements->sum('value'),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $movementId = $request->route('id');
        $this->movementRepository->deleteMovement($movementId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
