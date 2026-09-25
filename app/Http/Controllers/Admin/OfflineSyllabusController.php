<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfflineSyllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OfflineSyllabusController extends Controller
{
    /**
     * Display a listing of offline syllabi.
     */
    public function index(Request $request)
    {
        $query = OfflineSyllabus::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('title_bn', 'like', "%{$search}%")
                  ->orWhere('title_ar', 'like', "%{$search}%")
                  ->orWhere('details', 'like', "%{$search}%")
                  ->orWhere('details_bn', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', (int)$request->status);
        }

        $syllabi = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        $totalCount  = OfflineSyllabus::count();
        $activeCount = OfflineSyllabus::where('status', 1)->count();

        return view('admin.offline_syllabus.index', compact('syllabi', 'totalCount', 'activeCount'));
    }

    /**
     * Show the form for creating a new syllabus.
     */
    public function create()
    {
        return view('admin.offline_syllabus.create');
    }

    /**
     * Store a newly created syllabus in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'               => 'nullable|string|max:255',
            'title_bn'            => 'nullable|string|max:255',
            'title_ar'            => 'nullable|string|max:255',
            'details'             => 'nullable|string',
            'details_bn'          => 'nullable|string',
            'details_ar'          => 'nullable|string',
            'document_one_title'  => 'nullable|string|max:255',
            'document_two_title'  => 'nullable|string|max:255',
            'document_one'        => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
            'document_two'        => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
            'sort_order'          => 'nullable|integer',
            'status'              => 'nullable|boolean',
        ]);

        if (empty($request->title) && empty($request->title_bn)) {
            return back()->withErrors(['title_bn' => 'কমপক্ষে একটি শিরোনাম (বাংলা অথবা ইংরেজি) পূরণ করতে হবে।'])->withInput();
        }

        $title = $request->filled('title') ? $request->title : $request->title_bn;
        $title_bn = $request->filled('title_bn') ? $request->title_bn : $request->title;

        $uploadPath = public_path('uploads/offline_syllabus');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        $docOnePath = null;
        if ($request->hasFile('document_one')) {
            $file = $request->file('document_one');
            $fileName = 'syllabus_doc1_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $docOnePath = 'uploads/offline_syllabus/' . $fileName;
        }

        $docTwoPath = null;
        if ($request->hasFile('document_two')) {
            $file = $request->file('document_two');
            $fileName = 'syllabus_doc2_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $docTwoPath = 'uploads/offline_syllabus/' . $fileName;
        }

        OfflineSyllabus::create([
            'title'              => $title,
            'title_bn'           => $title_bn,
            'title_ar'           => $request->title_ar,
            'details'            => $request->details,
            'details_bn'         => $request->details_bn,
            'details_ar'         => $request->details_ar,
            'document_one'       => $docOnePath,
            'document_one_title' => $request->document_one_title,
            'document_two'       => $docTwoPath,
            'document_two_title' => $request->document_two_title,
            'sort_order'         => $request->sort_order ?? 0,
            'status'             => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.offline-syllabi.index')
            ->with('message', 'Offline Syllabus added successfully!');
    }

    /**
     * Show the form for editing the syllabus.
     */
    public function edit($id)
    {
        $syllabus = OfflineSyllabus::findOrFail($id);
        return view('admin.offline_syllabus.edit', compact('syllabus'));
    }

    /**
     * Update the specified syllabus in storage.
     */
    public function update(Request $request, $id)
    {
        $syllabus = OfflineSyllabus::findOrFail($id);

        $request->validate([
            'title'               => 'nullable|string|max:255',
            'title_bn'            => 'nullable|string|max:255',
            'title_ar'            => 'nullable|string|max:255',
            'details'             => 'nullable|string',
            'details_bn'          => 'nullable|string',
            'details_ar'          => 'nullable|string',
            'document_one_title'  => 'nullable|string|max:255',
            'document_two_title'  => 'nullable|string|max:255',
            'document_one'        => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
            'document_two'        => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
            'sort_order'          => 'nullable|integer',
            'status'              => 'nullable|boolean',
        ]);

        if (empty($request->title) && empty($request->title_bn)) {
            return back()->withErrors(['title_bn' => 'কমপক্ষে একটি শিরোনাম (বাংলা অথবা ইংরেজি) পূরণ করতে হবে।'])->withInput();
        }

        $title = $request->filled('title') ? $request->title : $request->title_bn;
        $title_bn = $request->filled('title_bn') ? $request->title_bn : $request->title;

        $uploadPath = public_path('uploads/offline_syllabus');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        $docOnePath = $syllabus->document_one;
        if ($request->has('remove_doc_one') && $request->remove_doc_one == 1) {
            if ($docOnePath && File::exists(public_path($docOnePath))) {
                File::delete(public_path($docOnePath));
            }
            $docOnePath = null;
        }
        if ($request->hasFile('document_one')) {
            if ($docOnePath && File::exists(public_path($docOnePath))) {
                File::delete(public_path($docOnePath));
            }
            $file = $request->file('document_one');
            $fileName = 'syllabus_doc1_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $docOnePath = 'uploads/offline_syllabus/' . $fileName;
        }

        $docTwoPath = $syllabus->document_two;
        if ($request->has('remove_doc_two') && $request->remove_doc_two == 1) {
            if ($docTwoPath && File::exists(public_path($docTwoPath))) {
                File::delete(public_path($docTwoPath));
            }
            $docTwoPath = null;
        }
        if ($request->hasFile('document_two')) {
            if ($docTwoPath && File::exists(public_path($docTwoPath))) {
                File::delete(public_path($docTwoPath));
            }
            $file = $request->file('document_two');
            $fileName = 'syllabus_doc2_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $fileName);
            $docTwoPath = 'uploads/offline_syllabus/' . $fileName;
        }

        $syllabus->update([
            'title'              => $title,
            'title_bn'           => $title_bn,
            'title_ar'           => $request->title_ar,
            'details'            => $request->details,
            'details_bn'         => $request->details_bn,
            'details_ar'         => $request->details_ar,
            'document_one'       => $docOnePath,
            'document_one_title' => $request->document_one_title,
            'document_two'       => $docTwoPath,
            'document_two_title' => $request->document_two_title,
            'sort_order'         => $request->sort_order ?? 0,
            'status'             => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('admin.offline-syllabi.index')
            ->with('message', 'Offline Syllabus updated successfully!');
    }

    /**
     * Remove the specified syllabus from storage.
     */
    public function destroy($id)
    {
        $syllabus = OfflineSyllabus::findOrFail($id);

        if ($syllabus->document_one && File::exists(public_path($syllabus->document_one))) {
            File::delete(public_path($syllabus->document_one));
        }

        if ($syllabus->document_two && File::exists(public_path($syllabus->document_two))) {
            File::delete(public_path($syllabus->document_two));
        }

        $syllabus->delete();

        return redirect()->route('admin.offline-syllabi.index')
            ->with('message', 'Offline Syllabus deleted successfully!');
    }

    /**
     * Toggle syllabus status.
     */
    public function toggleStatus($id)
    {
        $syllabus = OfflineSyllabus::findOrFail($id);
        $syllabus->status = !$syllabus->status;
        $syllabus->save();

        return redirect()->back()
            ->with('message', 'Status updated successfully!');
    }
}
