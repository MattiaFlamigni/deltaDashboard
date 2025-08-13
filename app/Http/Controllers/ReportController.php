<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $closeReports =  Report::orderBy('data', 'desc')->where("isResolved", true)->paginate(10);
        $openReports =  Report::orderBy('data', 'desc')->where("isResolved", false)->paginate(10);
        return view('report.reports',["closedReports"=>$closeReports, "openReports"=>$openReports] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $report->update([
            'isResolved' => !$report->isResolved
        ]);

        return redirect(route("reports.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
