<div id="admin-window">

    <nav class="navbar navbar-expand navbar-light bg-light border-bottom border-left shadow-sm">
        <!-- Reference : https://getbootstrap.com/docs/4.0/utilities/borders/ -->
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
        <ul class="navbar-nav w-100 pr-2">
            <li class="form-inline nav-item w-100">
                <?php
                    $url= $_SERVER['REQUEST_URI'];
                    $str_arr = explode ("/", $url);
                    // $url_test = "/".$str_arr[1]."/".$str_arr[2];
                    // echo "<div>".$str_arr[1]."</div>"; // For testing
                ?>
                <input id="search" class="form-control w-75" type="search" placeholder="Search <?php if ($url=='/admin/dashboard') {
                    echo "tests / students"; }elseif ($url=='/admin/tests') {
                        echo "tests"; }elseif ($url=='/admin/students') {
                            echo "students"; }elseif ('/'.$str_arr[1].'/'.$str_arr[2]=='/admin/test') {
                                echo "questions"; }
                ?>" aria-label="Search">
                
                <button id="search-icon" class="btn btn-default my-2 my-sm-0" type="submit">
                    <span style="color:#3977de;background:#d7e3f8;" class="glyphicon glyphicon-search"></span>
                    <!-- Reference : https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_glyphs&stacked=h -->
                    <svg class="svg-icon search-icon" aria-labelledby="title desc" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.9 19.7">
                        <!-- <desc id="desc">A magnifying glass icon.</desc> -->
                        <g class="search-path" fill="none" stroke="#3977de">
                            <path stroke-linecap="square" d="M18.5 18.3l-5.4-5.4"/>
                            <circle cx="8" cy="8" r="7"/>
                        </g>
                    </svg>
                </button>
            </li>
            <!-- Notifcation icon - Not needed now can include later -->
            <!-- <li class="nav-item bell">
                <svg width="20px" height="23px" viewBox="0 0 16 16" class="bi bi-bell" fill="#3977de" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
                    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg> -->
                <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
            <!-- </li> -->

            <li align="center" class="nav-item">
                <!-- <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                <div class="admin-img ml-2">
                    <!-- <img height="27" width="27" style="border-radius:50%;" src="https://media1.popsugar-assets.com/files/thumbor/HwtAUAufmAZv-FgGEIMJS2eQM-A/0x1:2771x2772/fit-in/2048xorig/filters:format_auto-!!-:strip_icc-!!-/2020/03/30/878/n/1922398/eb11f12e5e825104ca01c1.02079643_/i/Robert-Downey-Jr.jpg"> -->
                    <img height="27" width="27" style="border-radius:50%;" src="https://img.freepik.com/free-vector/male-call-center-agent_1270-395.jpg?size=338&ext=jpg">
                    <i class="fa fa-gear gear"></i>
                </div>
                <div class="adminName">Robert Patil</div>
                <!-- </a> -->

                <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">logout</a>
                </div> -->
            </li>
        </ul>
    <!-- </div> -->
    </nav>

</div>