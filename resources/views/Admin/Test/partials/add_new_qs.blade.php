<div class="modal" id="addNewQuestion" tabindex="-1" role="dialog" aria-labelledby="addQuestionModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{env('APP_URL')}}/admin/test/question" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title h3" id="addQuestionModel">
                        <i class="fa fa-file"></i><span class="mx-1">New Question</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="qs_order" value="{{$exam->questions->count()+1}}">
                    <div class="text-danger">* Required fields
                        <input type="hidden" name="test_id" value="{{$exam->id}}">
                    </div>
                    <label for="question_title" class="h4 mt-4">Title<span class="text-danger">*</span></label>
                    <input id="question_title" name="question_title" type="text" placeholder="Title of Question" value="{{$questions['name']}}" class="w-100 p-1 marks">
                    @error('question_title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    
                    <label for="question_description" class="h4 mt-4">Description{{--<span class="text-danger">*</span>--}}</label>
                    <input id="question_description" name="question_description" type="text" placeholder="Description of Question" value="{{$questions['description']}}" class="w-100 p-1 marks">
                    @error('question_description')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <label for="question_marks" class="h4 mt-4">Marks<span class="text-danger">*</span></label>
                    <input id="question_marks" name="question_marks" type="number" placeholder="Maximum Marks" value="{{$questions['marks']}}" class="w-100 p-1 marks"> 
                    @error('question_marks')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="my-1 w-100">
                        @include( 'Admin.Test.partials.options')    
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Dismiss</button>
                    <button type="submit" class="btn btn-info border">Add Question</button>
                </div>
            </div>
        </form>
    </div>
</div>
@if( $open_modal )
<script>
    $("#addNewQuestion").modal("show");
</script>
@endif
<!--
<label for="question_type" class="h4 mt-4">Type<span class="text-danger">*</span></label>
<input id="question_type" name="question_type" type="text" placeholder="Type of Question" class="w-100 p-1">
@error('question_type')
<div class="text-danger">{{$message}}</div>
@enderror
-->

@push( 'page_js' )

<script>
    $(document).ready(_ => {
        const _add_option_button = ".add_option_button";
        $(document).on("click", _add_option_button, function(){
            let _exam_id = $( this ).data( "id" );
            axios.get(
                base_url+"admin/options/ui/"+_exam_id
            )
            .then(
                data => {

                    $( $(this).data("qs") ).append( data.data );
                    $( this ).data( "id", ( parseInt(_exam_id) ) + 1 );

                }
            )
            .catch();
        });
    });
</script>

@endpush