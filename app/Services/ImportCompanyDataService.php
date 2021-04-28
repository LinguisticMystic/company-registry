<?php

namespace App\Services;

use App\Models\CompanyData;
use Illuminate\Support\Facades\DB;

class ImportCompanyDataService
{
    public function execute(): void
    {
        $companyData = null;
        $numberOfRecordsToRead = 0;
        $limit = 1000;

        $lastRecord = DB::table('company_data')->where('_id', DB::raw('(select max(`_id`) from company_data)'))->first();

        if (!$lastRecord) {
            $companyData = $this->getRecords(null, $limit);
            $numberOfRecordsToRead = $companyData['total'];
        } else {
            $link = '/api/3/action/datastore_search?sort=_id&offset=' . $lastRecord->_id . '&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=' . $limit;
            $companyData = $this->getRecords($link, $limit);
            $numberOfRecordsToRead = $companyData['total'] - $lastRecord->_id;
            echo 'ID of the last record: ' . $lastRecord->_id . PHP_EOL;
        }

        echo 'Total number of records left to read: ' . $numberOfRecordsToRead . PHP_EOL;

        while (count($companyData['records']) > 0) {

            foreach ($companyData['records'] as $record) {

                //disable events to prevent memory leak
                DB::connection()->unsetEventDispatcher();

                CompanyData::upsert(
                    $companyData['records'],
                    ['_id' => (int)$record['_id']],
                    $record
                );
                $companyData = $this->getRecords($companyData['_links']['next'], $limit);

                $numberOfRecordsToRead -= $limit;
                echo $numberOfRecordsToRead . ' records left' . PHP_EOL;

                if (empty($companyData['records'])) {
                    break;
                }

            }

        }

    }

    private function getRecords(string $resource = null, $limit)
    {
        $baseURL = 'https://data.gov.lv/dati/lv';

        if ($resource == null) {
            $resource = '/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&sort=_id&limit=' . $limit;
        }

        $companyDataURL = file_get_contents($baseURL . $resource);
        $companyData = json_decode($companyDataURL, true);

        return $companyData['result'];
    }
}
