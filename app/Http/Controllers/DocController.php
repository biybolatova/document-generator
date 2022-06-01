<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Contract;
use PhpOffice\PhpWord\TemplateProcessor;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocController extends Controller
{
    /**
     * Создание документа
     *
     * @param Request $request
     *
     * @return JsonResponse|RedirectResponse
     */
    public function create(Request $request)
    {
        if (in_array(null, $request->post(), true)) {
            return response()->json(['message' => 'No data']);
        }

        $contract = new Contract();
        $contract->num_contract = $request->input('num_contract');
        $contract->name_company = $request->input('name_company');
        $contract->requisites_company = $request->input('requisites_company');
        $contract->name_counterparty = $request->input('name_counterparty');
        $contract->requisites_counterparty = $request->input('requisites_counterparty');
        $contract->save();

        return redirect()->route('contracts');
    }

    /**
     * Созданные документы
     *
     * @return Application|Factory|View
     */
    public function all() {
        $data = Contract::all();

        return view('save', compact('data'));
    }

    /**
     * Сохранение файла
     *
     * @param $id
     *
     * @return JsonResponse|BinaryFileResponse
     */
    public function download($id)
    {
        $data = Contract::findOrFail($id);

        if (empty($data)) {
            return response()->json(['message' => 'No data']);
        }

        $template = new TemplateProcessor('documents/contract.docx');
        $template->setValue('num_contract', $data->num_contract);
        $template->setValue('name_company', $data->name_company);
        $template->setValue('requisites_company', $data->requisites_company);
        $template->setValue('name_counterparty', $data->name_counterparty);
        $template->setValue('requisites_counterparty', $data->requisites_counterparty);
        $fileName = $data->num_contract;
        $template->saveAs($fileName . '.docx');

        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }
}
