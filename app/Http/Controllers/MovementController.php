<?php

namespace App\Http\Controllers;

use App\Enum\RecurrenceEnum;
use App\Interfaces\MovementRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules\Enum;

class MovementController extends Controller
{
    private MovementRepositoryInterface $movementRepository;

    /**
     * @param MovementRepositoryInterface $movementRepository
     */
    public function __construct(MovementRepositoryInterface $movementRepository)
    {
        $this->movementRepository = $movementRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->movementRepository->getAllMovements()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $movementDetails = $request->validate([
            'value' => 'required',
            'description' => 'required',
            'recurrence' => [new Enum(RecurrenceEnum::class)],
        ]);

        return redirect()->route('home', $this->movementRepository->createMovement($movementDetails))->with('status', 'movement-store');

    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function show(Request $request): Application|Factory|View
    {
        $movementId = $request->route('id');

        return view('movement', ['movement' => $this->movementRepository->getMovementById($movementId)]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $movementId = $request->route('id');
        $movementDetails = $request->validate([
            'value' => 'required',
            'description' => 'required',
            'recurrence' => [new Enum(RecurrenceEnum::class)],
        ]);

        return redirect()->route('home', $this->movementRepository->updateMovement($movementId, $movementDetails))->with('status', 'movement-updated');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $movementId = $request->route('id');

        return redirect()->route('home', $this->movementRepository->deleteMovement($movementId))->with('status', 'movement-destroy');
    }
}
