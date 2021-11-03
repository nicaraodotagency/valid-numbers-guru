<?php

namespace App\Repositories;

use App\Contracts\GuruFormatValidatorApiRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class GuruFormatValidatorApiRepository implements GuruFormatValidatorApiRepositoryInterface
{
    protected $guruFormatValidatorApiClient;
    protected $baseUrl;
    protected $baseWebhook;

    public function __construct()
    {
        $this->guruFormatValidatorApiClient = Http::withToken(config('services.guru_format_validator_api.key'));
        $this->baseUrl = config('services.guru_format_validator_api.url');
        $this->baseWebhook = config('services.guru_format_validator_api.webhook');
    }

    public function getAllLists(): array
    {
        $lists = $this->guruFormatValidatorApiClient->get("{$this->baseUrl}/api/lists");

        return $lists->json();
    }

    public function postList(User $user, array $numbers): array
    {
        $lists = Http::withToken($this->getUserToken($user))->post("{$this->baseUrl}/api/lists", ["phoneNumbers" => $numbers]);

        return $lists->json();
    }

    public function postUser(User $user): array
    {
        $user = $this->guruFormatValidatorApiClient->post("{$this->baseUrl}/api/users", ["name" => $user->name, "email" => $user->email, "password" => $user->password, "role" => 'USER_ROLE']);

        return $user->json();
    }

    function getUserToken(User $user): string {
        if(is_null($user->format_validator_user_token)){
            $guruFormatValidatorUser = $this->guruFormatValidatorApiClient->post("{$this->baseUrl}/api/auth/login", ["email" => $user->email, "password" => $user->password]);
            $user->format_validator_user_token = ($guruFormatValidatorUser->json())["body"]["token"];
            $user->save();
        }
        if(is_null($user->format_validator_user_webhook)) {
            $guruFormatValidatorWebhook = Http::withToken($user->format_validator_user_token)->put("{$this->baseUrl}/api/webhooks", ["webhook" => $this->baseWebhook]);
            $user->format_validator_user_webhook = ($guruFormatValidatorWebhook->json())["msg"]["body"];
            $user->save();
        }
        return $user->format_validator_user_token;
    }
}
