<?php

namespace App\Services;

use App\Models\CompanyData;

class SearchCompanyService
{
    public function execute($regCode): ?CompanyData
    {
        return CompanyData::where('regcode', $regCode)->first();
    }
}
