<div class="m-1">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light">
            <li class="breadcrumb-item"><a href="{{env('APP_URL')}}/admin/tests"> Exam </a></li>
            <!-- Reference : https://laracasts.com/index.php/discuss/channels/laravel/how-to-create-href-link-in-laravel? -->
            <li class="breadcrumb-item active" aria-current="page">{{ $exam['name'] }}</li>
        </ol>
    </nav>
    <!-- Created for smooth navigation but now no need. If you want just uncomment and see -->

    <!-- update test details form start -->
    <!-- <form id="exam_details" action="updateExam" method="post"> Original line -->
        <!-- Ajax testing -->
    <!-- <form id="exam_details" action="/admin/test/updateExam" method="post"> -->
    <form id="exam_details" action="" method="post">
        @csrf
        <div class="row mx-1">
            <div class="col-11 p-0">
                <input id="test_title" name="test_title" class="h2 w-100 borderless" type="text" value="{{ $exam['name'] }}" placeholder="Title of Test">
                @error('test_title')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <input type="hidden" id="changeValue" name="changeValue" value="{{ $exam['id'] }}">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
            <div class="col-1 p-0 text-danger" id="delete">
                <button id="del_exam" type="button" class="btn btn-default text-danger">
                    <i class='fa fa-trash'></i>
                </button>
            </div>
        </div>
        <div class="mx-1">
            <textarea rows="4" id="test_description" name="test_description" class="h5 w-100 borderless op-dull">@if ($exam['description'] != null) {{ $exam['description'] }} @else Description of Test here @endif </textarea>
            @error('test_description')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <input type="hidden" id="id" name="id" value="{{ $exam['id'] }}">
        </div>
        <div id="testTime" class="d-flex justify-content-between mx-2">
            <div class="time borderless">
                Created at : {{ date('d/m/Y H:i', strtotime($exam->created_at)) }}
            </div>
            <div class="time borderless">
                Last Updated at : {{ date('d/m/Y H:i', strtotime($exam->updated_at)) }}
            </div>
        </div>

        <div class="row my-2 mx-1">

            <div class="col-4">
                <div class="common schedule p-1 pb-5 rounded" style="background-image: url('{{ asset( 'image/scheduled.PNG' ) }}')";>
                    <div class="c-title">
                        Scheduled
                        <span id="myFunction1">
                            <svg width="19" height="19" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                <circle cx="8" cy="4.5" r="1"/>
                            </svg>
                        </span>
                        
                    </div>

                    <div class="c-body" {{--title="Test is scheduled or should start on date."--}}>
                        <input id="test_start" name="test_start" type="datetime-local" class="borderless w-75" value="{{ date('Y-m-d\TH:i', strtotime($exam->start_time)) }}">
                        @error('test_start')
                            <div id="new1" class="text-light bg-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <span id="new1" class="tooltiptext-m"></span>
                    <span class="tooltiptext">Test is scheduled or should start on date.</span>
                    
                </div>
            </div>

            <div class="col-4">
                <div class="common schedule p-1 pb-5 rounded" style="background-image: url('{{ asset( 'image/duration.PNG' ) }}')";>
                    <div class="c-title">
                        Duration
                        <span id="myFunction2">
                            <svg width="19" height="19" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                <circle cx="8" cy="4.5" r="1"/>
                            </svg>
                        </span>
                    </div>
                    <div class="c-body" {{-- title="Total duration of test in Hrs : Mins."--}}>
                        <input id="test_duration" name="test_duration" class="borderless w-50" value="{{$exam->time_limit}}" type="time">
                        @error('test_duration')
                            <div class="text-light bg-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <span id="new2" class="tooltiptext-m"></span>
                    <span class="tooltiptext">Total duration of test in Hrs : Mins.</span>

                </div>
            </div>

            <div class="col-4">
                <div class="common schedule p-1 pb-5 rounded" style="background-image: url('{{ asset( 'image/valid.PNG' ) }}')";>
                    <div class="c-title">
                        Valid
                        <span id="myFunction3">
                            <svg width="19" height="19" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                <circle cx="8" cy="4.5" r="1"/>
                            </svg>
                        </span>
                    </div>
                    <div class="c-body" {{--title="Test is valid till or should end on date."--}}>
                        <input id="test_end" name="test_end" type="datetime-local" class="borderless w-75" value="{{ date('Y-m-d\TH:i', strtotime($exam->end_time)) }}">
                        @error('test_end')
                            <div class="text-light bg-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <span id="new3" class="tooltiptext-m"></span>
                    <span class="tooltiptext">Test is valid till or should end on date.</span>

                </div>

            </div>
            
        </div>
        <div class="d-flex justify-content-between">
            <div>
                <button id="update_Exam" class="btn btn-info ml-4">
                    <i class="fa fa-refresh"></i> <span> Update</span>
                </button>
            </div>
            <div>
                <!-- <button class="btn btn-success mr-4 mt-2 @if($exam->is_published == 1)disabled @endif" id="{{ $exam->is_published == 0 ? 'publish' : 'published' }}" type="button"> -->
                    <!-- Below line for AJAX call -->
                <button class="btn btn-success mr-4 mt-2 @if($exam->is_published == 1)disabled @endif" id="publish" type="button">
                        @if( $exam->is_published == 0 )
                        <i class="fa fa-upload"></i> Publish
                        @else
                        <i class="fa fa-upload"></i> Published
                            {{--no option to deactivate --}}
                        @endif
                </button>
            </div>
        </div>
    </form>
</div>

@push( 'page_css' )

<script src="{{asset('/js/test_header.js')}}"></script>


<style>
    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
        color: #3977de;
        /* content: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjgiPjxwYXRoIGQ9Ik0yLjUgMEwxIDEuNSAzLjUgNCAxIDYuNSAyLjUgOGw0LTQtNC00eiIgZmlsbD0iY3VycmVudENvbG9yIi8+PC9zdmc+); */
    }
    /* Reference : https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=changing-breadcrumb-separator */
    #del {
        font-size: 19px;
        visibility: hidden;
        transition: 0.4s;
    }
    #delete:hover > #del {
        visibility: visible;
    }
    .borderless{
        border: none;
    }
    input:focus{
        border-bottom: 2px solid #3977de;
        color: #3977de;
        outline: none;
    }
    /* Reference : https://stackoverflow.com/questions/3397113/how-to-remove-focus-border-outline-around-text-input-boxes-chrome */
    .back-icon{
        transform: rotate(-20deg);
        padding: 0;
        /* Reference : https://www.w3schools.com/cssref/css3_pr_transform.asp */
    }
    .common{
        border:none;
        /* background-image: url("{{ asset('image/valid.png') }}"); */
        background-size: cover;
        /* Reference : https://uigradients.com/#AzurLane */
        max-height: 97px;
        overflow:hidden;
        visibility: visible;
    }
    .h2{
        font-size: 170%;
    }
    @media (min-width: 768px) { /* For Tablet / Larger screen */
        .size-icon{
            font-size: 100px;
        }   
        .c-body{
            font-size:14px;
        }
        .common .tooltiptext {
            visibility: hidden;
            width: 90%;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 1px 2px;
            opacity: 0.5;

            /* Position the tooltip */
            position: absolute;
            top: 60%;
            left: 5%;
            z-index: 1;
        }
        /* Reference : https://www.w3schools.com/css/tryit.asp?filename=trycss_tooltip */
        .common:hover .tooltiptext {
            visibility: visible;
        }
        .bi-info-circle{
            height: 0;
            width: 0;
            visibility: hidden;
        }
        .c-title{
            font-size:142%;
            font-weight:600;
        }
    }
    @media (max-width: 768px) { /* For Mobile screen */
        .size-icon{
            font-size: 70px;
        }  
        .c-body{
            font-size:12px;
        }
        .tooltiptext-m {
            visibility: visible;
            /* width: 100%; */
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 1px 0px;
            opacity: 0.5;

            /* Position the tooltip */
            position: absolute;
            top: 40%;
            left: 1%;
            z-index: 1;
        }
        .tooltiptext {
            visibility: hidden;
            
        }
        /* Reference : https://www.w3schools.com/css/tryit.asp?filename=trycss_tooltip */
        .common:hover .tooltiptext {
            /* visibility: visible; */
        }
        .bi-info-circle{
            height: 20px;
            width: 20px;
            visibility: visible;
        }
        .c-title{
            font-size:92%;
            font-weight:600;
        }
    }

</style>


@endpush