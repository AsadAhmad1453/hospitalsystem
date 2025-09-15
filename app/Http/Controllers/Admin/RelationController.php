<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\Dependency;

class RelationController extends Controller
{
    public function index()
    {
        $questions = Question::with(['section', 'options'])->orderBy('position')->get();
        return view('admin.relations.relations', compact('questions'));
    }

    public function saveQuestionRelations(Request $request)
    {
        // Validate input
        $request->validate([
            'selected_question_id' => 'required|exists:questions,id',
            'question_options' => 'required|array|min:1',
            'related_question' => 'required'
        ]);

        $questionId = $request->selected_question_id;
        $optionIds = $request->question_options;

        // Remove existing dependencies for this question
        Dependency::where('question_id', $questionId)->delete();
        // Insert new dependencies
        if (!empty($optionIds)) {
            foreach ($optionIds as $optionId) {
                Dependency::create([
                   'question_id' => $questionId,
                   'option_id' => $optionId,
                   'dependent_question_id' => $request->related_question
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Question relations saved successfully.']);
    }

    // New admin panel methods
    public function indexNew()
    {
        $questions = Question::with(['section', 'options'])->orderBy('position')->get();
        return view('admin-new.relations.relations', compact('questions'));
    }

    public function saveQuestionRelationsNew(Request $request)
    {
        // Validate input
        $request->validate([
            'selected_question_id' => 'required|exists:questions,id',
            'question_options' => 'required|array|min:1',
            'related_question' => 'required'
        ]);

        $questionId = $request->selected_question_id;
        $optionIds = $request->question_options;

        // Remove existing dependencies for this question
        Dependency::where('question_id', $questionId)->delete();
        // Insert new dependencies
        if (!empty($optionIds)) {
            foreach ($optionIds as $optionId) {
                Dependency::create([
                   'question_id' => $questionId,
                   'option_id' => $optionId,
                   'dependent_question_id' => $request->related_question
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Question relations saved successfully.']);
    }

    public function getQuestionOptions($id)
    {
        $question = Question::with('options')->findOrFail($id);
        return response()->json([
            'question' => $question,
            'options' => $question->options
        ]);
    }

    public function getQuestionRelations($id)
    {
        $question = Question::findOrFail($id);
        $relations = Dependency::with(['option', 'relatedQuestion'])
            ->where('question_id', $id)
            ->get();
        
        return response()->json([
            'question' => $question,
            'relations' => $relations
        ]);
    }

    public function deleteAllRelations($id)
    {
        try {
            Dependency::where('question_id', $id)->delete();
            return response()->json(['success' => true, 'message' => 'All relations deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting relations.']);
        }
    }

    public function addRelationNew()
    {
        $questions = Question::with(['section', 'options'])->orderBy('position')->get();
        return view('admin-new.relations.add-relation', compact('questions'));
    }

}
