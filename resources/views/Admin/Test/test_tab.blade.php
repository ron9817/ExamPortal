@extends('Admin.admin_base_layout')

@section('content')

    @include('Admin.layouts.nav')
    @include('Admin.admin-navbar')
    <style>
        .row-title{
            font-size:20px;
            font-weight:500;
        }
        input:focus{
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 2px solid #3977de;
            color: #3977de;
            outline: none;
        }
    </style>
    <div id="admin-window" class="mb-5" style="font-family: 'Poppins', sans-serif;">

        <!-- To display required field errors -->
        <div class="mx-4">
            @foreach($errors->all() as $e)
            <div class="text-danger">{{$e}}</div>
            @endforeach
            <!-- Reference : https://www.youtube.com/watch?v=zlkhjxdkDOA -->

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                    <span style="cursor:pointer;font-size:25px;float:right;" class="closebtn pb-2" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
                <!-- Refernce : https://www.codegrepper.com/code-examples/php/success+message+in+laravel -->
            @endif
            <!-- <br> -->
        </div>

        <div class="border mx-4 stats-box p-3 pl-4 mb-3" style="font-family: 'Poppins', sans-serif;">
            <div class="d-flex align-items-center justify-content-between pr-2 mb-2">
                <h2>Tests Report</h2>
                <div>Last Updated : 21 October 2020 9:42 PM</div>
            </div>
            <div class="row">
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2">
                    
                    <div class="d-flex">
                        <div class="stats-icon" style="color:#3977de;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="CT-text" style="opacity:0.6;">
                                <!-- Total Tests -->
                            </div>
                            <div class="CT font-weight-bold">{{sizeof($exams)}}</div>
                            <!-- Reference : https://www.w3schools.com/php/func_array_sizeof.asp -->
                        </div>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2">
                    
                    <div class="d-flex">
                        <div class="stats-icon" style="color:#37bf37;background:#d7f2d7;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-hourglass-bottom" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="CT1-text" style="opacity:0.6;">
                                <!-- Completed Tests -->
                            </div>
                            <div class="CT1 font-weight-bold">{{$complete}}</div>
                        </div>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    
                    <div class="d-flex">
                        <div class="stats-icon" style="color:#d92e29;background:#f7d5d4;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-hourglass-split" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13s-.866-1.299-3-1.48V8.35z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="CT2-text" style="opacity:0.6;">
                                <!-- Ongoing Tests -->
                            </div>
                            <div class="CT2 font-weight-bold">{{$active}}</div>
                        </div>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    
                    <div class="d-flex">
                        <div class="stats-icon" style="color:#00aba9;background:#cceeed;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-hourglass-top" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5zm2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="CT3-text" style="opacity:0.6;">
                                <!-- Upcoming Tests -->
                            </div>
                            <div class="CT3 font-weight-bold">{{sizeof($exams)-$active-$complete}}</div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>

        <!-- Add New test btn-1  -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info mx-4 border mb-3 d-flex align-items-center" data-toggle="modal" data-target="#addNewTest">
            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> &nbsp;&nbsp;
            <div>Add New Test</div> 
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addNewTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title h3" id="exampleModalLabel">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    New Test
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="exam" method="post">
            @csrf
                <div class="text-danger">* Required fields</div>
                <label for="test_title" class="h4 mt-4">Title<span class="text-danger">*</span></label>
                <input id="test_title" name="test_title" type="text" placeholder="Title of Test" class="w-100 p-1">
                @error('test_title')
                <div class="text-danger">{{$message}}</div>
                @enderror

                <label for="test_description" class="h4 mt-4">Description</label>
                <input id="test_description" name="test_description" type="text" placeholder="Description of Test (Optional)" class="w-100 p-1"> 

                <label for="test_start" class="h4 mt-4">Start Time
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-date-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm.066-2.544c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2zm-2.957-2.89v5.332H5.77v-4.61h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"/>
                    </svg>
                    <span class="text-danger">*</span></label>
                <input type="datetime-local" id="test_start_dummy" name="test_start_dummy" class="p-1" value="2020-02-01T03:35" style="visibility:hidden;"> <br>
                <input type="datetime-local" id="test_start" name="test_start" value="2016-02-01T03:35" min="" class="p-1">
                <!-- <input type="datetime-local" id="early" name="early" value="2016-02-01T03:35"> -->
                <!-- style="background-image:linear-gradient(145deg, #7F7FD5, #86A8E7);" -->
                @error('test_start')
                <div class="text-danger">{{$message}}</div>
                @enderror

                <br>
                <label for="test_end" class="h4 mt-4">End Time
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-date-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm.066-2.544c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2zm-2.957-2.89v5.332H5.77v-4.61h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"/>
                    </svg>
                    <span class="text-danger">*</span></label>
                <input id="test_end_dummy" name="test_end_dummy" type="datetime-local" value="2020-11-27T05:00" class="p-1" style="visibility:hidden;"><br>
                <input id="test_end" name="test_end" type="datetime-local" value="2020-11-27T05:00" min="" class="p-1">
                @error('test_end')
                <div class="text-danger">{{$message}}</div>
                @enderror

                <br>
                <label for="test_duration" class="h4 mt-4">Test Duration
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-stopwatch-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6.5 0a.5.5 0 0 0 0 1H7v1.07A7.001 7.001 0 0 0 8 16 7 7 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm2 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
                    </svg>
                    <span class="text-danger">*</span></label> <br>
                <input id="test_duration" name="test_duration" type="time" value="01:00" class="p-1"> ( Hours : Minutes )
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Dismiss</button>
                <button type="submit" class="btn btn-info border">Add Test</button>
            </div>

            </form>

            </div>
        </div>
        </div>

        @include('Admin.Test.partials.tests')

        <!-- Add New test btn-2  -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info mx-2 border mb-3 d-flex align-items-center" data-toggle="modal" data-target="#addNewTest">
            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> &nbsp;&nbsp;
            <div>Add New Test</div> 
        </button>
        </div>

    </div>
    <script type="text/javascript" src="{{asset('/js/admin-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/test_tab.js')}}"></script>

@endsection