<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ExamPortal\Admin\ExamHelper;

use App\Models\Exam;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\ExamController;
use App\Models\Question;
use App\Models\Option;

use App\Helpers\Traits\DateTime;

class ExamController extends Controller
{

    use DateTime; // Used for display_tests function
    public function transformData($test)
    {
        $test["id"] = $test->id;
        $test["name"] = $test->name;
        $test["description"] = $test->description;
        $test["start_time"] = $this->getDateTime( $test->start_time );
        $test["end_time"] = $this->getDateTime( $test->end_time );
        $test["time_limit"] = $this->getTime( $test->time_limit );
        $test["is_active"] = $test->is_active;
        $test["is_published"] = $test->is_published;
        $test["created_at"] = $test->created_at;
        $test["updated_at"] = $test->updated_at;
        
        return $test;
    }


    public function get_option_ui( $id, Request $request ){

        $option = [
                "name" => "",
                "id" => "b_".((int) $id + 1),
                "is_correct" => false,
            ];
        
        $id = (int) $id + 1;
        return view( 'Admin.Test.partials.option', [ "option" => $option, "data_count" => $id ]);

    }

    public function display_tests() // To display data from database
    {
        // $tests = DB::table('ExamDetails')->get();
        // return Exam::all(); // Working line used for testing
        $tests = Exam::all();
        $active = $tests->where('is_active',1)->count();
        $complete = Exam::where('is_published',2)->count();
        // $exams = array();
        // foreach ($tests as $test) {
            // $exam = $this->transformData($test);
            // Reference : https://stackoverflow.com/questions/17861412/calling-other-function-in-the-same-controller
        
            // array_push($exams,$exam);
            // Reference : https://www.w3schools.com/php/func_array_push.asp

        // }
        return view('Admin.Test.test_tab', ['exams' => $tests,'active' => $active,'complete' => $complete]); // Working 
    }

    public function displayDashboard_tests()
    {
        $tests = Exam::all();
        $testsCount = $tests->count();
        $published = $tests->where('is_published',1)->count();
        return view('Admin.dashboard', ['exams' => $tests,'testsCount' => $testsCount,'published' => $published]);
    }

    function save_exam(Request $req) // To save data into database
    {
        $req->validate([
            "test_title"=>"required",
            'test_start' => 'required|date|after:today',
            'test_end' => 'required|date|after:test_start',
            'test_duration' => 'required',
            // Reference : https://laravel.com/docs/8.x/validation#rule-after
        ]);
        $exam = new Exam;
        // dd($req->test_start);
        $exam->name = $req->test_title;
        $exam->description = $req->test_description;
        $exam->start_time = $req->test_start;
        $exam->end_time = $req->test_end;
        $exam->time_limit = $req->test_duration;
        $exam->save();
        // print_r($req->input());

        return redirect()->route('admin.tests')->with('message', 'Test Added Successfully!');
        // return redirect()->back()->with('message', 'Test Added Successfully!');
        // Reference : https://www.codegrepper.com/code-examples/php/success+message+in+laravel
    }

    function delete_exam(Request $request)
    {
        $id = $request->id;
        $exam = Exam::find($id);
        if ($exam->is_published == 0) {
            return response()->json(['success'=>'Exam Details are not published']);

        } else if ($exam->is_published == 2) {
            return response()->json(['success'=>'Exam is over so cannot delete']);

        } else if ($exam->is_active == 1) {
            return response()->json(['success'=>'Exam is live so cannot delete']);

        } else if ($exam->is_published == 1) {
            return response()->json(['success'=>'Exam is published so cannot delete']);

        }
    }
    // Reference : https://laracasts.com/discuss/channels/laravel/internal-server-error-500-showing-in-console-log?page=1

    function delete_exam_confirm(Request $requ) // New AJAX Delete exam details
    {
        // dd($requ);

        // $requ->validate([
        //     "test_title"=>"required",
        //     'test_start' => 'required|date', // Not required while updating |after:today
        //     'test_end' => 'required|date|after:test_start',
        //     'test_duration' => 'required',
        //     // Reference : https://laravel.com/docs/8.x/validation#rule-after
        // ]);

        $id = $requ->id;
        $exam = Exam::find($id);
        // dd(Exam::find($id)->name);
        if ($exam->is_published == 0 and $exam->is_active == 0) {
            $exam_name = Exam::find($id)->name;
            $delete_message = $exam_name." exam deleted successfully!";
            // dd($delete_message); // Yet to finish incomplete
            Exam::find($id)->delete(); // Working
            $questions = Question::all()->where('exam_id',$id);
            // dd($questions);
            foreach ($questions as $que) {
    
                $que_id = $que->id;
                Question::find($que_id)->delete();
                $options = Option::all()->where('qs_id',$que_id);
                foreach ($options as $option) {
                    $option_id = $option->id;
                    Option::find($option_id)->delete();
                }
                // dd($options);
            }
            // Reference : https://stackoverflow.com/questions/35046082/how-to-delete-multiple-records-using-laravel-eloquent
            
            // return redirect('/admin/tests')->with('message', $delete_message); // working return
            return response()->json(['success'=>'Exam is deleted successfully!']); // New return for sweetalert
            
        } else {
            return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Exam cannot be deleted! Try Again');
            
        }
        
    }

    function update_Exam_Detials(Request $request) // Using AJAX
    {
        $request->validate([
            "test_title"=>"required",
            'test_start' => 'required|date', // Not required while updating |after:today
            'test_end' => 'required|date|after:test_start',
            'test_duration' => 'required',
            // Reference : https://laravel.com/docs/8.x/validation#rule-after
        ]);

        $id = $request->id;
        $exam = Exam::find($id);
        if ($exam->is_published == 0) {
            
            $exam->name = $request->test_title;
            $exam->description = $request->test_description;
            $exam->start_time = $request->test_start;
            $exam->end_time = $request->test_end;
            $exam->time_limit = $request->test_duration;
            $exam->save();
            return response()->json(['success'=>'Exam Details are successfully updated']);

        } else if ($exam->is_published == 2) {
            return response()->json(['success'=>'Exam is over so cannot update']);

        } else if ($exam->is_active == 1) {
            return response()->json(['success'=>'Exam is live so cannot update']);

        } else if ($exam->is_published == 1) {
            return response()->json(['success'=>'Exam is published so cannot update']);

        }
    }

    function publish_Exam_Detials(Request $request) // Using AJAX
    {
        $id = $request->id;
        $exam = Exam::find($id);
        if ($exam->is_published or $exam->is_active) {

            return response()->json(['success'=>'Exam is already published']);
            
        } else {
            
            $questions = Question::all()->where('exam_id',$id);
            $queCount = $questions->count();
            if ($queCount > 0) {
                return response()->json(['success'=>'Exam Details are not published']);
            } else {
                return response()->json(['success'=>'Exam Details cannot be published']);
            }

        }
    }

    function publish_Exam_Confirm(Request $request) // Using AJAX
    {
        $id = $request->id;
        $exam = Exam::find($id);
        $exam->is_published = 1;
        $exam->save();
    
        return response()->json(['success'=>'Exam Details are successfully published']);

    }

    function save_question(Request $request) // To save question into database
    {
        // dd($request->test_id);
        $exam = Exam::find($request->test_id);
        // dd($exam->is_active);
        if ($exam->is_active) {
            return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Exam is Live! Cannot Add Question');
        } else {

            if( isset( $request->delete ) ){

                $options = $request->options;
                $options_selected = isset( $request->options_selected ) ? $request->options_selected : [];

                // dd( $request->delete, array_search( $request->delete , $request->options_selected));

                if (($key = array_search( $request->delete , $options_selected)) !== false) {
                    unset($options_selected[$key]);
                }

                unset( $options[ $request->delete ] );

                if( count( $options ) < 2 )
                    return redirect()->route('admin.test.show', ['id'=>$request->test_id])->with(['message'=>'Option can not be deleted ! Minimum two options required !',
                        'options' => $request->options,
                        'options_selected' => $request->options_selected,
                        "name" => $request->nquestion_titleame,
                        "description" => $request->question_description,
                        "marks" => $request->question_marks
                ]);
                return redirect()->route('admin.test.show', ['id'=>$request->test_id])->with(['message'=>'Option deleted!',
                    'options' => $options,
                    'options_selected' => $options_selected,
                    "name" => $request->question_title,
                    "description" => $request->question_description,
                    "marks" => $request->question_marks
                ]);

            }
            $request->validate([
                "question_title"=>"required",
                "question_marks"=>"required | numeric",
                "options"=>"required | array | min:2",
                "options_selected"=>"required | array | min:1"
            ]);

            $question = new Question;
            // $test_id = $request->test_id;
            $question->exam_id = $request->test_id;
            $question->qs_order = $request->qs_order;
            $question->name = $request->question_title;
            $question->marks = $request->question_marks;
            $question->description = $request->question_description;
            $question->type = $request->question_type;
            $question->save();

            foreach ($request->options as $key => $optn) {
                if( isset( $optn ) ){
                    $option = new Option;
                    $option->name = $optn;
                    $option->is_correct = in_array( $key, $request->options_selected );
                    $option->qs_id = $question->id;
                    $option->save();
                }
            }
            
            return redirect()->route('admin.test.show', ['id'=>$request->test_id])->with(['message'=>'Question Added Successfully!']);
            //return response()->json(['success'=>'Question Added Successfully!']); // AJAX
            // return redirect()->back()->with('message', 'Question Added Successfully!'); // Working
            // Reference : https://www.codegrepper.com/code-examples/php/success+message+in+laravel
        }

    }
    // Reference : https://laraveldaily.com/pivot-tables-and-many-to-many-relationships/
    public function getExamById($id, Request $request)
    {

        // To access data from mapping table / pivot table
        // $questions = questions()->withPivot('exam_id','qs_id');
        // dd($questions);

        
        // dd($id->questions);
        // foreach ($id->questions as $question)
        // {
        //     dd($question); // Working
        // }

        $exam = Exam::find($id);
        if( $request->session()->has('options') ){
            $options_name = $request->session()->get('options');
            $options_selected = $request->session()->has('options_selected') ? $request->session()->get('options_selected') : [] ;
            // dd( $options_selected );
            $options = [];
            foreach ($options_name as $key => $value) {
                    array_push( $options, [
                        "name" => $value,
                        "id" => "b_".$key,
                        "is_correct" => in_array( $key, $options_selected )
                    ]);
            }
            $modal_qs = [
                "name" => $request->session()->has('name') ? $request->session()->get('name') : " ",
                "description" => $request->session()->has('description') ? $request->session()->get('description') : " " ,
                "marks" => $request->session()->has('marks') ? $request->session()->get('marks') : " ",
            ];
            $open_modal = true;
        }
        else{
            $open_modal = false;
            $options = [
                0 => [
                    "name" => "",
                    "id" => "b_0",
                    "is_correct" => false,
                ],
                1 => [
                    "name" => "",
                    "id" => "b_1",
                    "is_correct" => false,
                ]
            ];
            $modal_qs = [
                "name" => " ",
                "description" => " ",
                "marks" => " ",
            ];
        }
        return view('Admin.Test.index', [ "exam"=>$exam, "options" => $options, "questions" => $modal_qs, "open_modal" => $open_modal ])->with('message', $request->session()->get('message'));

    }


    function update_question( $id, $qs_id, Request $request ) // To save data into database
    {
        $exam = Exam::find($id);
        // dd($exam->is_active);
        if ($exam->is_active) {
            return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Exam is Live! Cannot Update Question');
        } else {
            
            if( isset( $request->delete) ){

                $is_deleted = Option::where( [ 'qs_id' => $qs_id ] )->delete();
                $options = $request->options;
                unset( $options[ $request->delete ] );
                
                if( count( $options ) < 2 )
                    return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Option can not be deleted ! Minimum two options required !');

                foreach ($options as $key => $optn) {
                    if( isset( $optn ) ){
                        $option = new Option;
                        $option->name = $optn;
                        $option->is_correct = in_array( $key, $request->options_selected );
                        $option->qs_id = $qs_id;
                        $option->save();
                    }
                }
                return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Option deleted Successfully!');

            }
            $request->validate([
                "question_title"=>"required",
                // "question_description"=>"required",
                "question_marks"=>"required | numeric",
                "options"=>"required | array | min:2",
                "options_selected"=>"required | array | min:1"
            ]);

            $question = Question::where( [ 'id' => $qs_id ] )->update([
                'name' => $request->question_title,
                'marks' => $request->question_marks,
                'description' => $request->question_description,
                'type' => $request->question_type
            ]);
            $is_deleted = Option::where( [ 'qs_id' => $qs_id ] )->delete();
            foreach ($request->options as $key => $optn) {
                if( isset( $optn ) ){
                    $option = new Option;
                    $option->name = $optn;
                    $option->is_correct = in_array( $key, $request->options_selected );
                    $option->qs_id = $qs_id;
                    $option->save();
                }

            }

            return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Question Updated Successfully!');
        }

    }

    function delete_question( $id, $qs_id, Request $request ) // To save data into database
    {
        $exam = Exam::find($id);
        // dd($exam->is_active);
        if ($exam->is_active) {
            return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Exam is Live! Cannot Delete Question');
        } else {
            $is_question_deleted = Question::where( [ 'id' => $qs_id ] )->delete();
            $is_deleted = Option::where( [ 'qs_id' => $qs_id ] )->delete();
    
            return redirect()->route('admin.test.show', ['id'=>$id])->with('message', 'Question Delete Successfully!');
        }
        
    }

    public function active_exam(Request $request) // AJAX for checking exam active
    {
        $id = $request->id;
        $exam = Exam::find($id);
        if ($exam->is_active) {
            return response()->json(['success'=>'Exam is active']);
        } else {
            return response()->json(['success'=>'Exam is not active']);
        }
    }


    // public function activate(Request $request)
    // {
    //     $id = $request->id;
    //     $exam = Exam::find($id);

    //     $exam->is_published = 1;
    //     $exam->save();
    //     return redirect()->back()->with('message', 'Exam Activated Successfully!');
    //     // Reference : https://laravel.com/docs/8.x/eloquent#updates
        
    // }

    public function get( ExamHelper $helper )
    {
        $exams = $helper->get();
        return view('Admin.Exam.index')->with( "exams", $exams );
    }

    public function getById( $id, ExamHelper $helper )
    {
        // dd($id);
        $exam = $helper->getById( $id );
        return $exam;
    }

    public function add( Request $request , ExamHelper $helper )
    {
        $helper->add( $request );
        return redirect()->route('admin.exam');        

    }

    public function delete( $id, ExamHelper $helper )
    {
        $helper->delete( $id );
        return redirect()->route('admin.exam');        

    }

    public function update( $id, Request $request , ExamHelper $helper )
    {
        $helper->update( $id, $request );
        return redirect()->route('admin.exam');        

    }
}