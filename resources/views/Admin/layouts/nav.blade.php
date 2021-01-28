<!-- Only Admin Side Navbar -->
<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img class="logo" src="{{ asset('image/logo.png') }}" height="120" width="120">
            <!-- <h3></h3>    -->
        </div>
        <?php
            // if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            //         $url = "https://";   
            // else  
            //         $url = "http://";   
            // // Append the host(domain name, ip) to the URL.   
            // $url.= $_SERVER['HTTP_HOST'];   
            
            // // Append the requested resource location to the URL   
            // $url.= $_SERVER['REQUEST_URI']; 
            // Above code is to access full URL of current page
            // Reference : https://www.javatpoint.com/how-to-get-current-page-url-in-php
            
            $url= $_SERVER['REQUEST_URI'];
            $str_arr = explode ("/", $url);
            // Reference : https://www.geeksforgeeks.org/split-a-comma-delimited-string-into-an-array-in-php/#:~:text=Use%20explode()%20or%20preg_split,a%20string%20in%20different%20strings.   
                
            // echo $url;  
        ?>
        <ul class="list-unstyled components">
            <p>Exam Section</p>
            <li class="<?php if ($url=='/admin/dashboard') {
                echo "active";
            } ?>">
                <a class="details-link" href="<?= url('admin/dashboard'); ?>">Dashboard</a>
            </li>
            <li class="<?php if ($url=='/admin/tests' or '/'.$str_arr[1].'/'.$str_arr[2]=='/admin/test') {
                echo "active";
            } ?>">
                <a class="details-link" href="<?= url('admin/tests'); ?>">Tests</a>
            </li>
            <li class="<?php if ($url=='/admin/students' or $url=='/admin/student') {
                echo "active";
            } ?>">
                <a class="details-link" href="<?= url('admin/students'); ?>">Students</a>
            </li>
            <!-- <li>
                <a class="details-link" href="#">History</a>
            </li>
            <li>
                <a class="details-link" href="#">Contact</a>
            </li> -->
            <li>
                <a class="details-link" href="#">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

    <!-- <nav class="navbar navbar-default"> -->
        <!-- <div class="container-fluid"> -->

        <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="nav-button btn-sm btn-info navbar-btn">
                                <!-- <i class="glyphicon glyphicon-align-justify"></i> -->
                                <div class="menu-icon"></div>
                                <div class="menu-icon"></div>
                                <div class="menu-icon"></div>
                                <span>Toggle Sidebar</span>
                            </button>
        <!-- </div> -->

        <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Page</a></li>
            </ul>
        </div> -->
        </div>
    <!-- </nav> -->

    </div>
</div>

<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {


        $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
