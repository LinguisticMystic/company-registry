<?php

namespace App\Http\Controllers;

use App\Services\SearchCompanyRequest;
use App\Services\SearchCompanyService;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    private SearchCompanyService $searchCompanyService;

    public function __construct(SearchCompanyService $searchCompanyService)
    {
        $this->searchCompanyService = $searchCompanyService;
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'regcode' => 'required|numeric'
        ],
            [
                'regcode.required' => 'Registration code is required.',
                'regcode.numeric' => 'Registration code must be a number.'
            ]);

        $request = new SearchCompanyRequest($request->regcode);
        $company = $this->searchCompanyService->execute($request->registrationCode());

        if (empty($company)) {
            var_dump('nothing');
            return redirect('/')->withErrors(['regcode.nonexistant' => 'Registration number does not exist.']);
        }

        return view('results', [
            'name' => $company->name,
            'regcode' => $company->regcode,
            'regdate' => $company->registered,
            'address' => $company->address
        ]);
    }
}
