<?php

namespace App\Contracts;

interface GuruFormatValidatorApiRepositoryInterface
{
    public function getAllLists(): array;
    public function postList(array $numbers): array;
}
