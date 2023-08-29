<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use one2tek\larasheets\Services\LarasheetsService;

class ScrapeController extends Controller
{
    private $larasheetsService;
    public function scrapeData(Request $request)
    {
        $spreadsheetId = '1wPJ22IagwOml8Au4qeHZ56KQ65dOnH560osSYrkDpS0';
        $sheetName = 'DATA ALL';
        $headers = ['Partner', 'Idnumber', 'BPName'];

        $this->larasheetsService = new LarasheetsService($spreadsheetId, $sheetName, $headers);
        return response()->json(['message' => $this->larasheetsService->getAll()]);
    }
}
