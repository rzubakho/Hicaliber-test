<?php

namespace App\Services\PropertyData;

use App\Models\PropertyData;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CsvImporter
{
    public function import(string $filePath): void
    {
        $file = fopen($filePath, 'r');
        $headers = array_map('strtolower', fgetcsv($file));

        $validData = [];

        while (($row = fgetcsv($file)) !== false) {
            $rowData = array_combine($headers, $row);

            if ($this->hasEmptyValues($rowData) || !$this->validateDataTypes($rowData)) {
                Log::error('Invalid row: ' . implode(',', $row));
                continue;
            }

            $validData[] = $rowData;
        }

        fclose($file);

        if (!empty($validData)) {
            PropertyData::insert($validData);
        }
    }

    protected function hasEmptyValues(array $data): bool
    {
        return in_array('', $data, true);
    }

    protected function validateDataTypes(array $data): bool
    {
        foreach ($data as $key => $value) {
            if ($key === 'name') continue;

            if (!ctype_digit((string)$value)) {
                return false;
            }
        }
        return true;
    }
}
