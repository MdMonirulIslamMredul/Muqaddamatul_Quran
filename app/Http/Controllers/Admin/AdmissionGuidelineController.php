<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionGuideline;
use Illuminate\Http\Request;

class AdmissionGuidelineController extends Controller
{
    /**
     * Display a listing of admission guidelines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guidelines = AdmissionGuideline::latest('id')->paginate(20);
        return view('admin.admission_guideline.index', compact('guidelines'));
    }

    /**
     * Show the form for creating a new admission guideline.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admission_guideline.create');
    }

    /**
     * Store a newly created admission guideline in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_title'    => 'required|string|max:255',
            'section_title_bn' => 'nullable|string|max:255',
            'section_title_ab' => 'nullable|string|max:255',

            'details'          => 'nullable|string',
            'details_bn'       => 'nullable|string',
            'details_ab'       => 'nullable|string',

            'process'          => 'nullable|string',
            'process_bn'       => 'nullable|string',
            'process_ab'       => 'nullable|string',

            'admission_fees'   => 'nullable|string',
            'admission_fees_bn'=> 'nullable|string',
            'admission_fees_ab'=> 'nullable|string',

            'monthly_fees'     => 'nullable|string',
            'monthly_fees_bn'  => 'nullable|string',
            'monthly_fees_ab'  => 'nullable|string',

            'others_fees'      => 'nullable|string',
            'others_fees_bn'   => 'nullable|string',
            'others_fees_ab'   => 'nullable|string',

            'payment_rules'    => 'nullable|string',
            'payment_rules_bn' => 'nullable|string',
            'payment_rules_ab' => 'nullable|string',

            'points'           => 'nullable|array',
            'points.*'         => 'nullable|string',
            'points_bn'        => 'nullable|array',
            'points_bn.*'      => 'nullable|string',
            'points_ab'        => 'nullable|array',
            'points_ab.*'      => 'nullable|string',
        ]);

        $cleanPoints = $this->cleanPointsArray($request->input('points'));
        $cleanPointsBn = $this->cleanPointsArray($request->input('points_bn'));
        $cleanPointsAb = $this->cleanPointsArray($request->input('points_ab'));

        AdmissionGuideline::create([
            'section_title'    => $request->section_title,
            'section_title_bn' => $request->section_title_bn,
            'section_title_ab' => $request->section_title_ab,

            'details'          => $request->details,
            'details_bn'       => $request->details_bn,
            'details_ab'       => $request->details_ab,

            'process'          => $request->process,
            'process_bn'       => $request->process_bn,
            'process_ab'       => $request->process_ab,

            'admission_fees'   => $request->admission_fees,
            'admission_fees_bn'=> $request->admission_fees_bn,
            'admission_fees_ab'=> $request->admission_fees_ab,

            'monthly_fees'     => $request->monthly_fees,
            'monthly_fees_bn'  => $request->monthly_fees_bn,
            'monthly_fees_ab'  => $request->monthly_fees_ab,

            'others_fees'      => $request->others_fees,
            'others_fees_bn'   => $request->others_fees_bn,
            'others_fees_ab'   => $request->others_fees_ab,

            'payment_rules'    => $request->payment_rules,
            'payment_rules_bn' => $request->payment_rules_bn,
            'payment_rules_ab' => $request->payment_rules_ab,

            'points'           => !empty($cleanPoints) ? $cleanPoints : null,
            'points_bn'        => !empty($cleanPointsBn) ? $cleanPointsBn : null,
            'points_ab'        => !empty($cleanPointsAb) ? $cleanPointsAb : null,
        ]);

        return redirect()->route('admission-guidelines.index')->with('message', 'Admission guideline created successfully.');
    }

    /**
     * Display the specified admission guideline.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guideline = AdmissionGuideline::findOrFail($id);
        return view('admin.admission_guideline.show', compact('guideline'));
    }

    /**
     * Show the form for editing the specified admission guideline.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guideline = AdmissionGuideline::findOrFail($id);
        return view('admin.admission_guideline.edit', compact('guideline'));
    }

    /**
     * Update the specified admission guideline in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'section_title'    => 'required|string|max:255',
            'section_title_bn' => 'nullable|string|max:255',
            'section_title_ab' => 'nullable|string|max:255',

            'details'          => 'nullable|string',
            'details_bn'       => 'nullable|string',
            'details_ab'       => 'nullable|string',

            'process'          => 'nullable|string',
            'process_bn'       => 'nullable|string',
            'process_ab'       => 'nullable|string',

            'admission_fees'   => 'nullable|string',
            'admission_fees_bn'=> 'nullable|string',
            'admission_fees_ab'=> 'nullable|string',

            'monthly_fees'     => 'nullable|string',
            'monthly_fees_bn'  => 'nullable|string',
            'monthly_fees_ab'  => 'nullable|string',

            'others_fees'      => 'nullable|string',
            'others_fees_bn'   => 'nullable|string',
            'others_fees_ab'   => 'nullable|string',

            'payment_rules'    => 'nullable|string',
            'payment_rules_bn' => 'nullable|string',
            'payment_rules_ab' => 'nullable|string',

            'points'           => 'nullable|array',
            'points.*'         => 'nullable|string',
            'points_bn'        => 'nullable|array',
            'points_bn.*'      => 'nullable|string',
            'points_ab'        => 'nullable|array',
            'points_ab.*'      => 'nullable|string',
        ]);

        $cleanPoints = $this->cleanPointsArray($request->input('points'));
        $cleanPointsBn = $this->cleanPointsArray($request->input('points_bn'));
        $cleanPointsAb = $this->cleanPointsArray($request->input('points_ab'));

        $guideline = AdmissionGuideline::findOrFail($id);
        $guideline->update([
            'section_title'    => $request->section_title,
            'section_title_bn' => $request->section_title_bn,
            'section_title_ab' => $request->section_title_ab,

            'details'          => $request->details,
            'details_bn'       => $request->details_bn,
            'details_ab'       => $request->details_ab,

            'process'          => $request->process,
            'process_bn'       => $request->process_bn,
            'process_ab'       => $request->process_ab,

            'admission_fees'   => $request->admission_fees,
            'admission_fees_bn'=> $request->admission_fees_bn,
            'admission_fees_ab'=> $request->admission_fees_ab,

            'monthly_fees'     => $request->monthly_fees,
            'monthly_fees_bn'  => $request->monthly_fees_bn,
            'monthly_fees_ab'  => $request->monthly_fees_ab,

            'others_fees'      => $request->others_fees,
            'others_fees_bn'   => $request->others_fees_bn,
            'others_fees_ab'   => $request->others_fees_ab,

            'payment_rules'    => $request->payment_rules,
            'payment_rules_bn' => $request->payment_rules_bn,
            'payment_rules_ab' => $request->payment_rules_ab,

            'points'           => !empty($cleanPoints) ? $cleanPoints : null,
            'points_bn'        => !empty($cleanPointsBn) ? $cleanPointsBn : null,
            'points_ab'        => !empty($cleanPointsAb) ? $cleanPointsAb : null,
        ]);

        return redirect()->route('admission-guidelines.index')->with('message', 'Admission guideline updated successfully.');
    }

    /**
     * Remove the specified admission guideline from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guideline = AdmissionGuideline::findOrFail($id);
        $guideline->delete();

        return redirect()->route('admission-guidelines.index')->with('message', 'Admission guideline deleted successfully.');
    }

    /**
     * Helper to clean up empty rows from dynamic points arrays.
     *
     * @param  array|null  $points
     * @return array
     */
    private function cleanPointsArray($points)
    {
        if (!is_array($points)) {
            return [];
        }

        return array_values(array_filter($points, function ($point) {
            return !is_null($point) && trim($point) !== '';
        }));
    }
}
