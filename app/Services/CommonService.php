<?php


namespace App\Services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls as XlsReader;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

/**
 * ビジネスロジック共通処理クラス
 *
 * Class CommonService
 * @package App\Services
 */
class CommonService
{
    /**
     * ブラウザに表示
     *
     * @param string $filePath ファイルパス
     * @param string $downloadName ダウンロード時の名称
     */
    public function showFileBrowser(string $filePath, string $downloadName)
    {
        if (!file_exists($filePath)) {
            abort( 500 );
        }

        $mimeType = (new \finfo(FILEINFO_MIME_TYPE))->file($filePath);
        if (!preg_match('/\A\S+?\/\S+/', $mimeType)) {
            $mimeType = 'application/octet-stream';
        }

        header('Cache-Control: public');
        header('Pragma: public');
        header('Content-Type: ' . $mimeType);
        header('Content-Disposition: inline; filename="' . $downloadName . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
    }

    /**
     * EXCELに関する処理
     */
    public function downloaedExcel()
    {
        $aSpreadSheet = new Spreadsheet();

    }
}
