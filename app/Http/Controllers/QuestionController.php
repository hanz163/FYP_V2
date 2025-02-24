<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Difficulty;
use App\Models\Answer;
use App\Models\Part;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    // Show Upload Question Page
    public function create($partID)
    {
        $part = Part::where('PartID', $partID)->firstOrFail();
        $difficulties = Difficulty::all(); // Fetch difficulties for selection
        return view('uploadQuestion', compact('part', 'difficulties'));
    }

    // Store Uploaded Questions
    public function store(Request $request)
    {
        $request->validate([
            'part_id' => 'required|exists:parts,PartID',
            'difficulty_id' => 'required|exists:difficulties,DifficultyID',
            'question_text' => 'required|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
        ]);

        // Generate Custom Question ID (Q00001, Q00002, ...)
        $latestQuestion = Question::latest('QuestionID')->first();
        $newQuestionID = $latestQuestion ? 'Q' . str_pad((intval(substr($latestQuestion->QuestionID, 1)) + 1), 5, '0', STR_PAD_LEFT) : 'Q00001';

        // Insert Question
        $question = Question::create([
            'QuestionID' => $newQuestionID,
            'PartID' => $request->part_id,
            'DifficultyID' => $request->difficulty_id,
            'question_text' => $request->question_text,
        ]);

        // Generate Custom Answer ID (A00001, A00002, ...)
        $latestAnswer = Answer::latest('AnswerID')->first();
        $newAnswerID = $latestAnswer ? 'A' . str_pad((intval(substr($latestAnswer->AnswerID, 1)) + 1), 5, '0', STR_PAD_LEFT) : 'A00001';

        // Insert Answer
        Answer::create([
            'AnswerID' => $newAnswerID,
            'QuestionID' => $newQuestionID, // Correct reference
            'correct_answer' => $request->correct_answer,
            'explanation' => $request->explanation,
        ]);

        return back()->with('success', 'Question uploaded successfully!');
    }

    // Edit Question
    public function edit($questionID)
    {
        $question = Question::where('QuestionID', $questionID)->with('answer')->firstOrFail();
        return view('editQuestion', compact('question'));
    }

    // Update Question
    public function update(Request $request, $questionID)
    {
        $request->validate([
            'question_text' => 'required|string',
            'correct_answer' => 'required|string',
            'explanation' => 'required|string',
        ]);

        $question = Question::where('QuestionID', $questionID)->firstOrFail();
        $question->update(['question_text' => $request->question_text]);

        $answer = Answer::where('QuestionID', $questionID)->first();
        if ($answer) {
            $answer->update([
                'correct_answer' => $request->correct_answer,
                'explanation' => $request->explanation,
            ]);
        }

        return back()->with('success', 'Question updated successfully!');
    }

    // Delete Question
    public function destroy($questionID)
    {
        Question::where('QuestionID', $questionID)->delete();
        return back()->with('success', 'Question deleted successfully!');
    }

    // Process AI Analysis (Simulated for Now)
    public function processWithAI(Request $request)
    {
        // Simulating AI categorization
        $categorizedQuestions = [
            'easy' => [
                "What is Laravel?",
                "Explain MVC architecture.",
                "Define a middleware in Laravel."
            ],
            'moderate' => [
                "How does Eloquent ORM work?",
                "What are Laravel service providers?",
                "Explain Laravel broadcasting."
            ],
            'difficult' => [
                "How does Laravel handle event-driven architecture?",
                "Explain Laravel Octane and its performance benefits.",
                "Discuss advanced database query optimization in Laravel."
            ]
        ];

        return response()->json($categorizedQuestions);
    }
}
