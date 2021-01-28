<!-- 4 SVG icons  -->
<!-- Reference : https://icons.getbootstrap.com/ -->
<div id="admin-window">
    <div class="border mx-4 stats-box p-3 pl-4" style="font-family: 'Poppins', sans-serif;">
        <div class="d-flex align-items-center justify-content-between pr-2 mb-2">
            <h2>Overall Report</h2>
            <div>Last Updated : 21 October 2020 9:42 PM</div>
        </div>
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2">
                
                <div class="d-flex">
                    <div style="color:#3977de;" class="stats-icon">
                            <i class='fas fa-stream' style="font-size: 35px;"></i>
                            <!-- Reference : https://www.w3schools.com/icons/fontawesome5_icons_users_people.asp -->
                    </div>
                    <div>
                        <div class="CT-text" style="opacity:0.6;">
                            <!-- Total Tests -->
                        </div>
                        <div class="CT font-weight-bold">{{$testsCount}}</div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2">
                
                <div class="d-flex">
                    <div style="color:#00aba9;background:#cceeed;" class="stats-icon">
                            <i class='fas fa-users' style="font-size: 35px;"></i>
                            <!-- Reference : https://www.w3schools.com/icons/fontawesome5_icons_users_people.asp -->
                    </div>
                    <div>
                        <div class="CT1-text" style="opacity:0.6;">
                            <!-- Completed Tests -->
                        </div>
                        <div class="CT1 font-weight-bold">700</div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                
                <div class="d-flex">
                    <div style="color:#d92e29;background:#f7d5d4;" class="stats-icon">
                            <i class='fas fa-bullhorn' style="font-size: 35px;"></i>
                            <!-- Reference : https://www.w3schools.com/icons/fontawesome5_icons_users_people.asp -->
                    </div>
                    <div>
                        <div class="CT2-text" style="opacity:0.6;">
                            <!-- Ongoing Tests -->
                        </div>
                        <div class="CT2 font-weight-bold">{{$published}}</div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-6">
                
                <div class="d-flex">
                    <div style="color:#37bf37;background:#d7f2d7;" class="stats-icon">
                            <i class='fas fa-chart-line' style="font-size: 35px;"></i>
                            <!-- Reference : https://www.w3schools.com/icons/fontawesome5_icons_users_people.asp -->
                    </div>
                    <div>
                        <div class="CT3-text" style="opacity:0.6;">
                            <!-- Upcoming Tests -->
                        </div>
                        <div class="CT3 font-weight-bold">60</div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>