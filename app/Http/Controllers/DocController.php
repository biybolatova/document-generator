<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use PhpOffice\PhpWord\TemplateProcessor;
class DocController extends Controller
{
    //Функция добавления данных в бд
    public function submit(Request $reg)
    {
        $contract = new Contract();
        $contract->num_contract = $reg->input('num_contract');
        $contract->name_company = $reg->input('name_company');
        $contract->rek_company = $reg->input('rek_company');
        $contract->name_contragent = $reg->input('name_contragent');
        $contract->rek_contragent = $reg->input('rek_contragent');

        $contract->save();

        return redirect()->route('save-contracts');
    }
    //Функция вывода данных из бд
    public function all() {
        $data=Contract::all();
        return view('/save', compact('data'));
    }
    //Функция вывода данных из бд
    public function show($id) {
        $datas=Contract::findOrFail($id);
        return view('show', compact('datas'));
    }
    //Функция вывода данных из бд в файл
    public function download($id) {
        $datas = Contract::findOrFail($id);
        $template=new TemplateProcessor('documents/contract.docx');
        $template->setValue('num_contract', $datas->num_contract);
        $template->setValue('name_company', $datas->name_company);
        $template->setValue('rek_company', $datas->rek_company);
        $template->setValue('name_contragent', $datas->name_contragent);
        $template->setValue('rek_contragent', $datas->rek_contragent);
        $fileName=$datas->num_contract;
        $template->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
