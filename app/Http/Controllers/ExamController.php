<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Question;
use App\User;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::latest()->paginate(5);


        return view('exams.index',compact('exams'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        $users = User::all()->where('role', '<>', 'admin');

        return view('exams.create', compact(['questions', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset($request->exam_questions))
            return redirect()->route('exams.create')->with('fail', 'Please check at least one question');
        // if(!isset($request->exam_users))
        //     return redirect()->route('exams.create')->with('fail', 'Please check at least one user');

        $request->validate([
            'name' => 'required'
        ]);
        $exam = new Exam;
        $exam->name = $request->name;
        $exam->save();
        $exam->questions()->attach($request->marks);
        // foreach($request->exam_questions as $questionId) {
        //     $examQuestion = new Exam;
        //     $examQuestion->questions()->question_id = $questionId;
        //     $examQuestion->questions()->exam_id = $exam->id;
        //     $examQuestion->questions()->score = $request->score[$questionId];

        //     $examQuestion->questions()->save();
        // }

        return redirect()->route('exams.index')->with('success', 'New Exam Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return view('exams.view', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $exam->update($request->all());

        return redirect()->route('exams.index')
                        ->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('exams.index')
                    ->with('success', 'Exam Deleted Successfully');
    }
}
