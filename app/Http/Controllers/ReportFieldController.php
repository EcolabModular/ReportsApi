<?php

namespace App\Http\Controllers;

use App\Report;
use App\ReportField;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class ReportFieldController extends BaseController
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return reportfields list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $reportfields = ReportField::all();

        return $this->showAll($reportfields);
    }

    /**
     * Return fields of report as list
     * @return Illuminate\Http\Response
     */
    public function fieldsReport($reportType){
        $reportfields = ReportField::where([
            ['reportType_id',$reportType],
            ['isEnabled','1']])->get();
        return $this->showAll($reportfields);
    }

    /**
     * Create an instance of Report
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'field' => 'required|max:255',
            'title' => 'max:255',
            'description' => 'max:255',
            'isEnabled' => 'required|integer|between:0,1',
            'reportType_id' => 'required|in:' . Report::REPORTE_PREVENTIVO . ',' . Report::REPORTE_CORRECTIVO . ',' . Report::REPORTE_PREDICTIVO,
        ];

        $this->validate($request, $rules);

        $ReportField = ReportField::create($request->all());

        return $this->successResponse($ReportField, Response::HTTP_CREATED);
    }

    /**
     * Return an specific ReportField
     * @return Illuminate\Http\Response
     */
    public function show($reportField)
    {
        $ReportField = ReportField::findOrFail($reportField);

        return $this->successResponse($ReportField);
    }

    /**
     * Update the information of an existing ReportField
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $reportField)
    {
        $rules = [
            'field' => 'max:255',
            'title' => 'max:255',
            'description' => 'max:255',
            'isEnabled' => 'integer|between:0,1',
            'reportType_id' => 'required|in:' . Report::REPORTE_PREVENTIVO . ',' . Report::REPORTE_CORRECTIVO . ',' . Report::REPORTE_PREDICTIVO,
        ];

        $this->validate($request, $rules);

        $ReportField = ReportField::findOrFail($reportField);

        $ReportField->fill($request->all());

        if ($ReportField->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $ReportField->save();

        return $this->successResponse($ReportField);
    }

    /**
     * Removes an existing ReportField
     * @return Illuminate\Http\Response
     */
    public function destroy($reportField)
    {
        $ReportField = ReportField::findOrFail($reportField);

        $ReportField->delete();

        return $this->successResponse($ReportField);
    }
}
