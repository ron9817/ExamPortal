<div class="bg-primary w-100 d-flex justify-content-between align-items-center rounded">
    <div class="h5 rounded pt-2 pl-3 text-white text-center ">
        Total Questions Added : {{$exam->questions->count()}}
    </div>
    <div class="p-2">
        <input id="search2" class="form-control" type="search" placeholder="Search questions" aria-label="Search">
    </div>
</div>

@foreach( $exam->questions as $q_key => $question )
<div class="m-2 tests ques" id="q{{$question->id}}">
    <div id="ques-{{$question->id}}" class="w-100" >
        <form action="{{env('APP_URL')}}/admin/test/{{$exam->id}}/question/{{$question->id}}" method="POST">
        @method('DELETE')
            <div class="d-flex justify-content-between">
                <div class="py-1" data-toggle="collapse" href="#ques-content-{{$question->id}}" role="button" aria-expanded="false" aria-controls="ques-content-{{$question->id}}" data-parent="#ques-{{$question->id}}">{{$question->name}} <i class="fa fa-caret-down"></i></div>
                @csrf
                <button type="submit" class="btn btn-link text-danger px-2 pt-1">
                    <i class='fa fa-trash'></i>
                </button>
            </div>
        </form>
    </div>
    <!-- Details of a question -->
    <form action="{{env('APP_URL')}}/admin/test/{{$exam->id}}/question/{{$question->id}}" method="POST">
        @method('PUT')
    <!-- <form id="add_new_question" method="POST"> FOR AJAX -->
        <div class="collapse py-1 px-1" id="ques-content-{{$question->id}}">
        
            @csrf
            <div class="d-flex justify-content-start my-2">
                <div class="title h5">
                    Name:<span class="text-danger">*</span>
                </div>
                <div class="mx-1 w-50">
                    <input type="hidden" name="qs_order" value="{{$loop->iteration}}">
                    <input name="question_title" contentEditable class="w-100 borderless" placeholder="Question Title" value="{{$question->name}}"/>
                </div>
            </div>

            <div class="d-flex justify-content-start my-2">
                <div class="title h5">
                    
                    Description:{{--<span class="text-danger">*</span>--}}

                </div>
                <div class="mx-1 w-75">
                    <input type="hidden" name="qs_order" value="{{$loop->iteration}}">
                    <!-- <input name="question_description" contentEditable class="w-100 borderless" placeholder="Question Description" value="{{$question->description}}"/> -->
                    <textarea id="question_description" name="question_description" class="w-100 borderless"> {{ $question->description }} </textarea>
                </div>
            </div>

            <div class="d-flex justify-content-start my-2">
                <div class="title h5">
                    Marks:<span class="text-danger">*</span>
                </div>
                <div class="mx-1 w-75">
                    <input type="number" class="marks w-50" max="100" name="question_marks" placeholder="Enter Number" value="{{$question->marks}}">
                </div>
            </div>

            <div class="my-1">
                @include( 'Admin.Test.partials.options')
            </div>

            {{-- <div class="submit my-2">
             <button type="submit" onclick="add_que()" class="btn btn-info">Save & Add New Question</button> --}}

            <div class="my-3 d-block">
                <button type="submit" class="btn btn-outline-info">Update Question</button>
            </div>
        </div>
     </form>
</div>
@endforeach

{{ $question = null }}

<div id="delAlert"></div>
<!-- <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div> -->
<button id="add_question" type="button" class="btn btn-info d-flex align-items-center mb-4 no-modal" {{--data-toggle="modal" data-target="#addNewQuestion"--}}>
    <i class="fa fa-plus-circle" style="font-size:25px;"></i>
    &nbsp;&nbsp;
    <div>Add New Question</div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</button>


<!-- Modal to add New Question -->
@include( 'Admin.Test.partials.add_new_qs' )