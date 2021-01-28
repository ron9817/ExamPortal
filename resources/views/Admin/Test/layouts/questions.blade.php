<div class="m-2">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link py-2 active" id="qs-tab" data-toggle="tab" href="#qs-content" role="tab" aria-controls="qs-content" aria-selected="true">Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link py-2" id="student-tab" data-toggle="tab" href="#student-content" role="tab" aria-controls="student-content" aria-selected="false">Students</a>
      </li>
    </ul>
    <div class="tab-content" id="tabContent">
      <div class="tab-pane fade show active" id="qs-content" role="tabpanel" aria-labelledby="qs-tab">
        @include('Admin.Test.partials.questions')
      </div>
      <div class="tab-pane fade" id="student-content" role="tabpanel" aria-labelledby="student-tab">
        @include('Admin.Test.partials.students')
      </div>
    </div>    
</div>


@push( 'page_css' )

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
    .w-control{
        width: 98%;
        margin: 0 auto;
    }
    .w2-control{
        width: 100%;
        margin: 0 auto;
    }
    .bg-warning{
        background: #4BCFFA !important;
    }
    .divtext {
        border-bottom: ridge 1px;
        padding: 5px;
        width: 20em;
        min-height: 2em;
        overflow: auto;
    }
    .divtext:focus{
        border-bottom: 2px solid blue;
    }
    .option{
        width: 30px;
        height: 30px;
        border: none !important;
        box-shadow: none !important;
    }
    .option:checked {
        color: red;
        background: green;
    }
    .btn-info{
        border: #3977de 1px solid !important;
    }
    .bg-info {
        background: #3977de !important;
    }
    .btn-outline-info{
        color: #3977de !important;
        border: #3977de 1px solid !important;
    }
    .btn-outline-info:hover{
        color: #fff !important;
        background : #3977de !important;
        border: #3977de 1px solid !important;
    }
    .marks{
        border: none;
    }
    .marks:focus{
        border-top: none;
        border-left: none;
        border-right: none;
    }
    .register{
        opacity: 0.9;
        background-color: #3977de;
        /* background-image: linear-gradient(135deg, #3C40C6, #3C40C6, #2475B0); */
        /* border-radius: 17px 17px 0 0; */
        border-radius: 24px;
        animation-name: register;
        animation-duration: 3s;
    }
    @keyframes register {
        from {background-color: black;}
        to {background-color: #3977de;}
    }
    .login{
        opacity: 0.9;
        background-color: #3977de;
        /* background-image: linear-gradient(135deg, #3C40C6, #3C40C6, #2475B0); */
        /* border-radius: 17px 17px 0 0; */
        border-radius: 24px;
        animation-name: login;
        animation-duration: 3s;
    }
    @keyframes login {
        from {background-color: black;}
        to {background-color: #3977de;}
    }
    /* Reference : https://www.w3schools.com/css/css3_animations.asp */
    #log:hover,#reg:hover{
        border-radius: 24px;
        opacity: 1;
        background-color: #3977de;
    }
    @media (max-width: 768px) { /* For Mobile screen */
        
        /*.modal-dialog {
            position:fixed;
            left: 5%;
            top: 35%;
        }*/
        .fa-times{
            font-size: 25px;
            visibility: visible;
        }

        .optn_text{
            width: 60vw!important;
        }
        
    }
    @media (min-width: 768px) { /* For Tablet / Larger screen */
        
        /*.modal-dialog {
            position:fixed;
            left: 35%;
            top: 35%;
        }*/
        .fa-times{
            font-size: 25px;
            visibility: hidden;
        }
    }
    .options div:hover > .btn span .fa-times{
        cursor: pointer;
        visibility: visible;
    }
    /* For alert box */
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        position: fixed;
        top: 9%;
        right: 2%;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
    /*.modal-body {
        position: relative;
        padding: 20px;
        height: 230px;
        overflow-y: scroll;
    }*/
</style>

@endpush