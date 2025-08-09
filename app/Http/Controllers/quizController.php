<?php

namespace App\Http\Controllers;

use App\Models\quizAnswer;
use App\Models\quizQuestion;
use Illuminate\Http\Request;

class quizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $quizQuestions = quizQuestion::orderBy('created_at', 'desc')->paginate(7);


        return view('quiz.quiz', compact('quizQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quiz.questionCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answers' => 'required|array|min:4|max:4',
            'answers.*' => 'required|string',
            'correct_answer' => 'required|integer|min:0|max:3',
        ]);

        $question = quizQuestion::create(['question' => $data['question']]);

        foreach ($data['answers'] as $index => $answerText) {
            $question->answers()->create([
                'answer' => $answerText,
                'correct' => $index == $data['correct_answer'],
            ]);
        }

        session()->flash('success', 'domanda creata con successo');

        return redirect("/dashboard/quiz");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimino tutte le risposte collegate alla domanda
        quizAnswer::where('questionID', $id)->delete();

        // Elimino la domanda stessa
        quizQuestion::destroy($id);
        session()->flash('success', 'domanda eliminata con successo');
        return redirect("/dashboard/quiz");
    }
}
