<?php

namespace App\Interfaces;

interface MovementRepositoryInterface
{
    public function getAllMovements();

    public function getMovementById($movementId);

    public function deleteMovement($movementId);

    public function createMovement(array $movementDetails);

    public function updateMovement($movementId, array $movementDetails);

    public function getUserMovements();
}
