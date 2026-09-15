<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentClassController extends Controller
{
    /**
     * Display a listing of student classes.
     */
    public function index()
    {
        $classes = StudentClass::withCount('students')
            ->orderBy('order_level', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15);

        return view('admin.student_class.index', compact('classes'));
    }

    /**
     * Store a newly created student class.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_bn'       => 'required|string|max:150',
            'name_en'       => 'nullable|string|max:150',
            'department'    => 'nullable|string|max:100',
            'monthly_fee'   => 'nullable|numeric|min:0',
            'admission_fee' => 'nullable|numeric|min:0',
            'seat_capacity' => 'nullable|integer|min:0',
            'order_level'   => 'nullable|integer',
            'description'   => 'nullable|string',
            'status'        => 'required|in:0,1',
        ], [
            'name_bn.required' => 'শ্রেণির নাম (বাংলা) আবশ্যক।',
        ]);

        $code = Str::slug($request->name_en ?: $request->name_bn);
        $originalCode = $code;
        $counter = 1;
        while (StudentClass::where('code', $code)->exists()) {
            $code = $originalCode . '-' . $counter++;
        }

        StudentClass::create([
            'name_bn'       => $request->name_bn,
            'name_en'       => $request->name_en,
            'code'          => $code,
            'department'    => $request->department,
            'monthly_fee'   => $request->monthly_fee ?? 0,
            'admission_fee' => $request->admission_fee ?? 0,
            'seat_capacity' => $request->seat_capacity,
            'order_level'   => $request->order_level ?? 0,
            'description'   => $request->description,
            'status'        => $request->status,
        ]);

        return redirect()->route('student-classes.index')
            ->with('message', 'নতুন শ্রেণি সফলভাবে তৈরি করা হয়েছে।');
    }

    /**
     * Show the form for editing the specified class.
     */
    public function edit($id)
    {
        $studentClass = StudentClass::findOrFail($id);
        $classes = StudentClass::withCount('students')
            ->orderBy('order_level', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15);

        return view('admin.student_class.edit', compact('studentClass', 'classes'));
    }

    /**
     * Update the specified class in storage.
     */
    public function update(Request $request, $id)
    {
        $studentClass = StudentClass::findOrFail($id);

        $request->validate([
            'name_bn'       => 'required|string|max:150',
            'name_en'       => 'nullable|string|max:150',
            'department'    => 'nullable|string|max:100',
            'monthly_fee'   => 'nullable|numeric|min:0',
            'admission_fee' => 'nullable|numeric|min:0',
            'seat_capacity' => 'nullable|integer|min:0',
            'order_level'   => 'nullable|integer',
            'description'   => 'nullable|string',
            'status'        => 'required|in:0,1',
        ]);

        $studentClass->update([
            'name_bn'       => $request->name_bn,
            'name_en'       => $request->name_en,
            'department'    => $request->department,
            'monthly_fee'   => $request->monthly_fee ?? 0,
            'admission_fee' => $request->admission_fee ?? 0,
            'seat_capacity' => $request->seat_capacity,
            'order_level'   => $request->order_level ?? 0,
            'description'   => $request->description,
            'status'        => $request->status,
        ]);

        return redirect()->route('student-classes.index')
            ->with('message', 'শ্রেণির তথ্য সফলভাবে হালনাগাদ করা হয়েছে।');
    }

    /**
     * Remove the specified class from storage.
     */
    public function destroy($id)
    {
        $studentClass = StudentClass::findOrFail($id);
        $studentClass->delete();

        return redirect()->route('student-classes.index')
            ->with('message', 'শ্রেণি সফলভাবে মুছে ফেলা হয়েছে।');
    }
}
