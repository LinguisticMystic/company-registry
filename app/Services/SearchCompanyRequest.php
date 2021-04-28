<?php

namespace App\Services;

class SearchCompanyRequest
{
    private int $registrationCode;

    public function __construct(int $registrationCode)
    {
        $this->registrationCode = $registrationCode;
    }

    public function registrationCode(): int
    {
        return $this->registrationCode;
    }
}
