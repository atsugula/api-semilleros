<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contractor;
use App\Models\Hiring;
use App\Models\Contract;
use DB;
use Exception;
use PDF;
use File;
use ZipArchive;

class PDFController extends Controller
{
    public function ContractFormat(Request $request)
    {
        try {
            $sql = "SELECT
            c.lastname AS lastname,
            c.name AS name,
            c.identification_type AS identification_type,
            c.identification AS identification,
            c.contract_value AS contract_value,
            co.identifier_number as consecutive,
            c.date_expedition_document as date_expedition_document,
            c.bank AS bank,
            b.name AS namebank,
            bt.name AS typenamebank,
            c.bank_account_type AS bank_account_type,
            c.account_number AS account_number,
            cl.clause1 AS clause1,
            cl.clause2 AS clause2,
            cl.clause3 AS clause3,
            cl.clause4 AS clause4,
            cl.clause5 AS clause5,
            cl.clause6 AS clause6,
            cl.clause7 AS clause7,
            cl.clause8 AS clause8,
            cl.clause9 AS clause9,
            cl.clause10 AS clause10,
            cl.clause11 AS clause11,
            cl.clause12 AS clause12,
            cl.clause13 AS clause13,
            cl.clause14 AS clause14,
            cl.clause15 AS clause15,
            cl.clause16 AS clause16,
            cl.clause17 AS clause17,
            cl.clause18 AS clause18,
            cl.clause19 AS clause19,
            cl.clause20 AS clause20,
            cl.clause21 AS clause21,
            cl.clause22 AS clause22,
            cl.clause23 AS clause23,
            cl.clause24 AS clause24,
            u1.name AS name_transcribe,
            u1.lastname AS lastname_transcribe,
            u2.name AS name_reviewer,
            u2.lastname AS lastname_reviewer,
            u3.name AS name_approve,
            u3.lastname AS lastname_approve,
            IFNULL(co.qr, 'Sin URL' ) AS qr
            FROM  contractors c
            INNER JOIN contracts co ON co.contractor_id = c.id
            INNER JOIN hirings h ON co.hiring_id = h.id
            INNER JOIN clauses cl ON cl.contract_id = co.id
            INNER JOIN users u1 ON u1.id = co.transcribed_user_id
            INNER JOIN users u2 ON u2.id = co.reviewer_user_id
            INNER JOIN users u3 ON u3.id = co.approve_user_id
            INNER JOIN banks b ON b.id = c.bank
            INNER JOIN bank_account_types bt ON bt.id = c.bank_account_type
            where c.id = $request->id;";
            // return $sql;
            $Contratctor = DB::select($sql);
            // $Contratctor = Contractor::with('control_data','validator_periods','user', 'contract.hiring')->get();

            $personalizesheet = [
                'margin_top' => '50mm',
                'margin_bottom' => '30mm',
                'paper' => 'A4',
                'margin_left' => '2mm',
                'margin_right' => '2mm',
                'paper' => 'Legal'
            ];

            $data = [
                'Formatname' => 'Formato_Contrato',
                'Data' => $Contratctor[0],
                'Titles' => null,
                'Namepdf' => 'Contrato',
                'Headerpersonalice' => true,
                'Headertext' => null,
                'Display' => 'pdf',
                'Personalizesheet' => $personalizesheet,
                'Cantpdf' => 1,
            ];

            $pdf = $this->GeneratePDF($data);
            return $pdf;
        } catch (Exception $e) {
            return response()->json([
                "line" => $e->getLine(),
                "explanation" => $e->getMessage(),
                "message" => "Algo salio mal a exportar el contrato"
            ], 400);
        }
    }

    public function GeneratePDF($data)
    {
        try {
            // return $data['Data'];
            $imagen = base64_encode(file_get_contents(public_path() . '/img/Reportes/logos.svg'));
            if ($data['Display'] != 'pdf') {
                return View('pdf.' . $data['Formatname'] . '.body', [
                    'titulos' => $data['Titles'],
                    'data' => $data['Data']
                ]);
            }
            $pdf = PDF::loadView('pdf.' . $data['Formatname'] . '.body', [
                'titulos' => $data['Titles'],
                'data' => $data['Data']
            ]);
            $data['Image'] = $imagen;
            $header = $this->headerPdf($data);
            $footer = view('pdf.' . $data['Formatname'] . '.footer', [
                // 'datos' => $TCabezera,
                'QR' => $data['Data']->qr,
            ]);

            // tamaño de hoja
            $pdf->setPaper($data['Personalizesheet']['paper']);
            $pdf->setOption('margin-top', $data['Personalizesheet']['margin_top']);
            $pdf->setOption('margin-bottom', $data['Personalizesheet']['margin_bottom']);
            $pdf->setOption('margin-left', $data['Personalizesheet']['margin_left']);
            $pdf->setOption('margin-right', $data['Personalizesheet']['margin_right']);
            $pdf->setOption('header-html', $header);
            $pdf->setOption('footer-html', $footer);

            // return $pdf;
            return $pdf->download($data['Namepdf'].' '.$data['Data']->consecutive. '.pdf');
        } catch (Exception $e) {
            return response()->json([
                "line" => $e->getLine(),
                "explanation" => $e->getMessage(),
                "message" => "Algo salio mal a generar el pdf"
            ], 400);
        }
    }

    public function headerPdf($data)
    {
        if ($data['Headerpersonalice']) {
            $headerHtml = view('pdf.' . $data['Formatname'] . '.header', [
                // 'datos' => $TCabezera,
                'Image' => $data['Image'],
                'data' => $data['Data']
            ]);
        } else {
            $headerHtml = view('pdf.header', [
                'datos' => $TCabezera,
                'imagen' => $imagen,
            ]);
        }

        return $headerHtml;
    }

    public function generateZip($origen)
    {
        try {
            $zip = new ZipArchive;
            $ruta = public_path('reportes/') . substr($origen, 8);
            $ruta2 = public_path('img/Reportes/') . substr($origen, 8);
            $fileName = substr($origen, 8) . '.zip';
            if ($zip->open(public_path('reportes/' . $fileName), ZipArchive::CREATE) === TRUE) {
                $files = File::files($ruta);
                // return $files;
                foreach ($files as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
                $zip->close();
            }
            // unlink  ($ruta);
            array_map('unlink', glob($ruta . "/*.pdf"));
            array_map('unlink', glob($ruta2 . "/*.jpeg"));
            return response()->download(public_path('reportes/' . $fileName));
        } catch (\Exception $e) {
            return response()->json([
                "line" => $e->getLine(),
                "explanation" => $e->getMessage(),
                "message" => "Algo salio mal a generar el zip"
            ], 400);
        }
    }

    public function consultas()
    {
        return User::with('loginaccess')->get();
    }

    public function Download()
    {
        $ruta = public_path() . '/Contrato.pdf';
        $nombreArchivo = basename($ruta);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=$nombreArchivo");
        readfile($nombreArchivo);
        // return $nombreArchivo;
    }
}
