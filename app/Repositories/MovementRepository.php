<?php

namespace App\Repositories;

use App\Interfaces\MovementRepositoryInterface;
use App\Models\Movement;

class MovementRepository implements MovementRepositoryInterface
{
    public function getAllMovements()
    {
        Movement::all();
    }

    public function getMovementById($movementId)
    {
        return Movement::findOrFail($movementId);
    }

    public function deleteMovement($movementId)
    {
        $movement = Movement::find($movementId);
        $movement->delete();
    }

    public function createMovement(array $movementDetails)
    {
        $movement              = new Movement;
        $movement->value       = $movementDetails['value'];
        $movement->description = $movementDetails['description'];
        $movement->recurrence  = $movementDetails['recurrence'];
        $movement->created_by  = Auth()->user()->id;
        $movement->save();
    }

    public function updateMovement($movementId, array $movementDetails)
    {
        return Movement::whereId($movementId)->update($movementDetails);
    }

    public function getUserMovements()
    {
        return Movement::where('created_by', Auth()->user()->id);
    }
}
