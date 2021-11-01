<?php

namespace App\Repositories;

use App\Contracts\GuruFormatValidatorApiRepositoryInterface;
use Illuminate\Support\Facades\Http;

class GuruFormatValidatorApiRepository implements GuruFormatValidatorApiRepositoryInterface
{
    protected $guruFormatValidatorApiClient;
    protected $baseUrl;

    public function __construct()
    {
        $this->guruFormatValidatorApiClient = Http::withToken(config('services.guru_format_validator_api.key'));
        $this->baseUrl = config('services.guru_format_validator_api.url');
    }

    public function getAllLists(): array
    {
        $lists = $this->guruFormatValidatorApiClient->get("{$this->baseUrl}/api/lists");

        return $lists->json();
    }

    public function postList(array $numbers): array
    {
        $lists = $this->guruFormatValidatorApiClient->post("{$this->baseUrl}/api/lists", ["phoneNumbers" => $numbers]);

        return $lists->json();
    }
}
