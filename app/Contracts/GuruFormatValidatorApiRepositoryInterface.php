<?php

namespace App\Contracts;

use App\Models\User;

interface GuruFormatValidatorApiRepositoryInterface
{
    public function getAllLists(): array;
    public function postList(User $user, array $numbers): array;
    public function postUser(User $user): array;
    function getUserToken(User $user): string;
}
