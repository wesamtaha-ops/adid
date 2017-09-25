<!DOCTYPE html>
<html ng-app="mediasoftApp">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="theme-color" content="#37474F">
        <title>تطبيق العضيد</title>

        <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'> 

        <link rel="stylesheet" href="http://aladheid.ae/project/css/animate.css">
        <link rel="stylesheet" href="http://aladheid.ae/project/css/chosen.css">
        <link rel="stylesheet" href="http://aladheid.ae/project/css/chosen-spinner.css">
        <link rel="stylesheet" href="http://aladheid.ae/project/css/framework7.material.css">
        <link rel="stylesheet" href="http://aladheid.ae/project/css/framework7.material.colors.min.css">
        <link rel="stylesheet" href="http://aladheid.ae/project/css/swiper.min.css?ii=<? echo rand(); ?>">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://aladheid.ae/project/css/my-app.css?i=<? echo rand(); ?>">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link ng-if="$root.currentLang == 'en'" rel="stylesheet" href="http://aladheid.ae/project/css/en.css?i=<? echo rand(); ?>">


        <link href='http://aladheid.ae/project/datepicker/anypicker.css?i=<? echo rand(); ?>' rel='stylesheet' type='text/css'>
        <link rel="icon" href="img/icon.png">

    </head>   


    <div class="mypanel">

        <div class="statusbar-overlay"></div>
        <div class="panel-overlay"></div>
        <div class="panel panel-left panel-cover">
            <div class="view navbar-fixed">
                <div data-page="panel-left" class="page">
                    <div id="myNavBar" class="navbar">
                        <div class="navbar-inner" style="    background-color: #3897b2;">
                            <div class="center"></div>
                        </div>
                    </div>          
                    <div class="list-block" style="text-align: center;     background-color: #47c0e4;">
                        <br>
                        <br>
                        <img src="images/add.png" style="height: 200px;">
                        <br> <br>
                        <ul>
                            <li><a href="#/home" class="item-link close-panel">
                                    <div class="item-content">
                                        <div ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;">  Home</div>
                                        <div ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> الرئيسية </div>
                                    </div></a></li>

                            <li ng-if="$root.selectedID == 0"><a ng-click="$root.gotoLoginView('login')" class="item-link close-panel">
                                    <div class="item-content">
                                        <div ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;"> Login</div>
                                        <div ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> تسجيل الدخول </div>
                                    </div></a></li>


                            <li ng-if="$root.selectedID == 0" ><a ng-click="$root.gotoLoginView('register')"  class="item-link close-panel">
                                    <div class="item-content">
                                        <div ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;">  New User</div>
                                        <div ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> عضو جديد </div>
                                    </div></a></li>


                            <li><a href="#/about" class="item-link close-panel">
                                    <div class="item-content">
                                        <div ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;" >  About Us</div>
                                        <div ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> عن العضيد </div>
                                    </div></a></li>

      <li><a href="#/all" class="item-link close-panel">
                                    <div class="item-content">
                                        <div ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;" >  Activities List</div>
                                        <div ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> قائمة الفعاليات </div>
                                    </div></a></li>


      <li><a href="#/map" class="item-link close-panel">
                                    <div class="item-content">
                                        <div ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;" >  Activities Map </div>
                                        <div ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> خريطة الفعاليات </div>
                                    </div></a></li>                                    

                            <li><a href="#/contact" class="item-link close-panel">
                                    <div class="item-content">
                                        <div ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;"> Contact Us</div>
                                        <div ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> اتصل بنا </div>
                                    </div></a></li>

                            <li ng-if="$root.selectedID > 0" ><a onclick="logout()" class="item-link close-panel">
                                    <div class="item-content">
                                        <div  ng-show="$root.currentLang == 'en'" class="item-title" style=" color: #fff;"> Logout</div>
                                        <div  ng-show="$root.currentLang == 'ar'" class="item-title" style=" color: #fff;"> تسجيل الخروج</div>
                                    </div></a></li>




                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <body  >



    <ng-view class="view-main" ></ng-view>


</body>

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<style>
    /* following two viewport lines are equivalent to the meta viewport statement above, needed for Windows */
    /* see http://www.quirksmode.org/blog/archives/2014/05/html5_dev_conf.html and http://dev.w3.org/csswg/css-device-adapt/ */
    @-ms-viewport { width: 100vw ; zoom: 100% ; }  @viewport { width: 100vw ; zoom: 100% ; }
    @-ms-viewport { user-zoom: fixed ; }           @viewport { user-zoom: fixed ; }
</style>

<!-- jQuery -->
<!-- Angular JS -->
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Angular JS -->
<script type="text/javascript" src="http://aladheid.ae/project/js/lib/angular.min.js?i=<? echo rand(); ?>"></script>
<script type="text/javascript" src="http://aladheid.ae/project/js/lib/angular-route.min.js?i=<? echo rand(); ?>"></script>
<script type="text/javascript" src="http://aladheid.ae/project/js/lib/angular-resource.min.js?i=<? echo rand(); ?>"></script>
<script type="text/javascript" src="http://aladheid.ae/project/js/lib/angular-sanitize.min.js?i=<? echo rand(); ?>"></script>




<!-- Uploader (optional) -->
<script type="text/javascript" src="http://aladheid.ae/project/assets/plugins/plupload/js/plupload.full.js?i=<? echo rand(); ?>"></script>
<!-- Application Shared Modules-->
<script src="http://aladheid.ae/project/js/lib/bootstrap.min.js?i=<? echo rand(); ?>"></script>
<script src="http://aladheid.ae/project/js/core.js?i=<? echo rand(); ?>"></script>



<!-- Demo Specific -->
<script type="text/javascript" src="http://aladheid.ae/project/js/lib/framework7.min.js"></script>
<script type="text/javascript" src="http://aladheid.ae/project/js/lib/angular-swiper.min.js"></script>
<script src="http://aladheid.ae/project/js/app.js?i=<? echo rand(); ?>"></script>
<script src="http://aladheid.ae/project/js/directives.js?i=<? echo rand(); ?>"></script>
<script src="http://aladheid.ae/project/js/controllers/register.js?i=<? echo rand(); ?>"></script>
<script src="http://aladheid.ae/project/js/controllers/ins-register.js?i=<? echo rand(); ?>"></script>
<script src="http://aladheid.ae/project/js/controllers/request.js?i=<? echo rand(); ?>"></script>

<script src="http://aladheid.ae/project/js/controllers/register-service.js?i=<? echo rand(); ?>"></script>

<script src="http://aladheid.ae/project/datepicker/anypicker.js?i=<? echo rand(); ?>"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD118sPO7c_WCgGckGHgJrfgGotjQv1JXA&sensor=false"></script>

<script type="text/javascript">


var logout = function () {

    localStorage.clear();
    sessionStorage.clear();

    location = '#/';
}


</script>




</body>
</html>