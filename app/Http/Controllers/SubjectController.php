<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = DB::table('subjects')
        ->when($request->input('title'), function($query, $title) {
            return $query->where('title', 'like', '%' . $title . '%' );
        })
        ->select('id', 'title', 'lecturer_id', 'semester', 'academic_year', 'sks', 'code', 'description')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.subject.index', compact('subjects'));
    }
    public function create()
    {
        return view('pages.subject.create');
    }

    public function store(StoreSubjectRequest $request)
    {

        Subject::create([
            'title' => $request['title'],
            'lecturer_id' => $request['lecturer_id'],
            'semester' => $request['semester'],
            'academic_year' => $request['academic_year'],
            'sks' => $request['sks'],
            'code' => $request['code'],
            'description' => $request['description'],
        ]);

        return redirect(route('subject.index'))->with('success', 'Create New Subject Successfully');
    }

    public function edit(Subject $subject)
    {
        return view('pages.subject.edit')->with('subject', $subject);
    }

    public function show(string $id)
    {
        //
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $validate = $request->validated();
        $subject->update($validate);
        return redirect()->route('subject.index')->with('success', 'Edit Subject Successfully');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect(route('subject.index'))->with('success', 'Delete Subject successfully');
    }
}