@extends('Admin.admin_base_layout')

@section('content')

    @include('Admin.layouts.nav')
    @include('Admin.admin-navbar')
    @include('Admin.dashboard-head')
    
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        .heading{
            color: cyan;
            background: black;
        }
        .new-window{
            min-width: 100%;
            /* padding-left: 2%; */
            /* padding-right: 2%; */
        }
        .hide-c{
            text-overflow: ellipsis;
            overflow: hidden;
        }
        #search2{
            border-radius: 5px !important;
        }
        .table-search{
            font-size: 15px;
            font-weight: 600;
        }
        .detials-link{
            text-decoration: none;
        }
        .detials-link:hover {
            text-decoration: none;
            cursor: pointer;
        }
        .row-title{
            font-size:20px;
            font-weight:500;
        }
        .stats-icon {
            max-height: 50px;
            padding: 8px 14px 8px 14px;
            border-radius: 50%;
            background: #d7e3f8;
        }
        .nav-link.active{
            background: #3977de !important;
            border-radius: 18px 18px 0 0;
            font-weight: bold;
        }   
    </style>
    <div id="admin-window" style="font-family: 'Poppins', sans-serif;">

        <div class="m-2 mt-3">
            <ul class="nav nav-pills mx-2" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Students</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('Admin.Test.partials.tests')
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('Admin.Test.partials.students')
                </div>
            </div>
        </div>

    </div>
    
	<script type="text/javascript" src="{{asset('/js/admin-dashboard.js')}}"></script>
@endsection