@extends('Admin.admin_base_layout')

@push('page_css')
    <style>
        .stats-icon {
            max-height: 50px;
            padding: 6px 14px 6px 14px;
            border-radius: 50%;
            background: #d7e3f8;
        }
    </style>
@endpush

@push('page_js')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
@endpush


@section('content')

    @include('Admin.layouts.nav')
    @include('Admin.admin-navbar')
    

    <div id="admin-window" style="font-family: 'Poppins', sans-serif;">

        <div class="border mx-4 stats-box p-3 pl-4 mb-5" style="font-family: 'Poppins', sans-serif;">
            <div class="d-flex align-items-center justify-content-between pr-2 mb-2">
                <h2>Students Report</h2>
                <div>Last Updated : 21 October 2020 9:42 PM</div>
            </div>
            <div class="row">
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2">
                    
                    <div class="d-flex">
                        <!-- <div class="stats-icon" style="color:#3977de;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-collection" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                            </svg>
                        </div> -->
                        <div style="color:#3977de;" class="stats-icon">
                            <i class='fas fa-users' style="font-size: 38px;"></i>
                            <!-- Reference : https://www.w3schools.com/icons/fontawesome5_icons_users_people.asp -->
                        </div>
                        <div>
                            <div class="CT-text" style="opacity:0.6;">
                                <!-- Total Tests -->
                            </div>
                            <div class="CT font-weight-bold">112</div>
                        </div>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2">
                    
                    <div class="d-flex">
                        <!-- <div class="stats-icon" style="color:#37bf37;background:#d7f2d7;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-hourglass-bottom" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5zm2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2h-7z"/>
                            </svg>
                        </div> -->
                        <div style="color:#00aba9;background:#cceeed;" class="stats-icon">
                            <i class='fas fa-user-tie' style="font-size: 38px;"></i>
                            <!-- Reference : https://www.w3schools.com/icons/fontawesome5_icons_users_people.asp -->
                        </div>
                        <div>
                            <div class="CT1-text" style="opacity:0.6;">
                                <!-- Completed Tests -->
                            </div>
                            <div class="CT1 font-weight-bold">102</div>
                        </div>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    
                    <div class="d-flex">
                        <!-- <div class="stats-icon" style="color:#d92e29;background:#f7d5d4;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-hourglass-split" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13s-.866-1.299-3-1.48V8.35z"/>
                            </svg>
                        </div> -->
                        <div style="color:#37bf37;background:#d7f2d7;" class="stats-icon">
                            <i class='fas fa-user-graduate' style="font-size: 38px;"></i>
                        </div>
                        <div>
                            <div class="CT2-text" style="opacity:0.6;">
                                <!-- Ongoing Tests -->
                            </div>
                            <div class="CT2 font-weight-bold">2</div>
                        </div>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    
                    <div class="d-flex">
                        <!-- <div class="stats-icon" style="color:#00aba9;background:#cceeed;">
                            <svg width="2em" height="3em" viewBox="0 0 16 16" class="bi bi-hourglass-top" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5zm2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1h-7z"/>
                            </svg>
                        </div> -->
                        <div style="color:#d92e29;background:#f7d5d4;" class="stats-icon">
                            <i class='fas fa-user-injured' style="font-size: 38px;"></i>
                        </div>
                        <div>
                            <div class="CT3-text" style="opacity:0.6;">
                                <!-- Upcoming Tests -->
                            </div>
                            <div class="CT3 font-weight-bold">8</div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>

        <!-- Students List -->
        <div id="students" class="new-window mb-5">
            <div class="pl-4">
                <div class="row w-100 table-search p-2">
                    <div class="col col-sm-6 col-lg-3">
                        <input id="search" class="form-control" type="search" placeholder="Search students" aria-label="Search">
                    </div>
                    <div class="col d-none d-lg-block pt-2 col-lg-2 hide-c">Registered</div>
                    <div class="col d-none d-lg-block pt-2 col-lg-2 hide-c">Appeared</div>
                    <div class="col d-none d-lg-block pt-2 col-lg-1 hide-c">Passed</div>
                    <div class="col d-none d-lg-block pt-2 col-lg-1 hide-c">Failed</div>
                    <div class="col col-sm-6 col-lg-3 d-flex align-items-center justify-content-end">Details</div>
                </div>

                <div class="row w-100 mt-2 py-2 tests">
                    <div class="col col-sm-6 col-lg-3">
                    <img class="mr-2" height="35" width="35" style="border-radius:50%;" src="https://www.cinemascomics.com/wp-content/uploads/2020/07/Johnny-Depp-actua-como-Jack-Sparrow-en-la-vida-real.jpg">
                        <span class="row-title">Jack Sparrow</span>
                    </div>
                    <div class="col d-none d-lg-block col-lg-2 hide-c test-numbers">200</div>
                    <div class="col d-none d-lg-block col-lg-2 hide-c test-numbers">180</div>
                    <div class="col d-none d-lg-block col-lg-1 hide-c test-numbers">100</div>
                    <div class="col d-none d-lg-block col-lg-1 hide-c test-numbers">80</div>
                    <div class="col col-sm-6 col-lg-3 d-flex align-items-center justify-content-end">
                        <a class="detials-link" href="#">See Detials</a>
                    </div>
                </div>

                <div class="row w-100 mt-2 py-2 tests">
                    <div class="col col-sm-6 col-lg-3">
                    <img class="mr-2" height="35" width="35" style="border-radius:50%;" src="https://lh5.googleusercontent.com/-OyGiighynes/TYL5cDJaKuI/AAAAAAAAULQ/ayj8R4eX48A/s1600/Pirates+of+the+Caribbean+On+Stranger+Tides+Barbosa.JPG">
                        <span class="row-title">Hector Barbossa</span>
                    </div>
                    <div class="col d-none d-lg-block col-lg-2 hide-c test-numbers">200</div>
                    <div class="col d-none d-lg-block col-lg-2 hide-c test-numbers">180</div>
                    <div class="col d-none d-lg-block col-lg-1 hide-c test-numbers">100</div>
                    <div class="col d-none d-lg-block col-lg-1 hide-c test-numbers">80</div>
                    <div class="col col-sm-6 col-lg-3 d-flex align-items-center justify-content-end">
                        <a class="detials-link" href="#">See Detials</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="{{asset('/js/admin-dashboard.js')}}"></script>
@endsection