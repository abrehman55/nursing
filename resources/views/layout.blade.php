<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Nurse </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}" />
    <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/loader.js')}}"></script>
    <!--BEGIN GLOBAL MANDATORY STYLES-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('plugins/font-icons/fontawesome/css/regular.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/font-icons/fontawesome/css/fontawesome.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->

    <style type="text/css">
        .main-container,
        .sidebar-wrapper {
            margin-top: -80px;
        }
    </style>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @yield('styles')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
</head>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->

    <!-- BEGIN NAVBAR -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="{{asset('assets/img/logo.svg')}}" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="{{url('/')}}" class="nav-link"> Nurse </a>
                </li>

                <li class="nav-item theme-text">
                    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </li>
            </ul>



            <ul class="navbar-item flex-row ml-md-auto mr-4">

                <li class="nav-item dropdown language-dropdown">
                    <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                        <a class="dropdown-item" data-value="Settings" href="">Settings</a>
                        <a class="dropdown-item" data-value="Mail" href="{{route('logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!-- END NAVBAR -->

    <!-- BEGIN NAVBAR -->
    <div class="clear-fix"></div>
    <!-- END NAVBAR -->

    <!-- BEGIN MAIN CONTAINER -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!-- BEGIN SIDEBAR -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">

                        <a href="" aria-expanded="false" class="dropdown-toggle">
                            <div class="">

                                <span></span>
                            </div>
                        </a>

                    </li>
                    <li class="menu">

                        <a href="" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-airplay">
                                    <path
                                        d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                                    </path>
                                    <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>

                    </li>

                    <li class="menu">

                    <a href="{{route('nurse.index')}}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Nurses</span>
                            </div>
                        </a>

                    </li>

                    <li class="menu">
                        <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>Category</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="product" data-parent="#accordionExample">
                            <li>
                                <a href=""> Add Category </a>
                            </li>
                            <li>
                                <a href=""> All Categry </a>
                            </li>

                        </ul>
                    </li>
{{-- 
                    <li class="menu">
                        <a href="#sale" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Sales</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="sale" data-parent="#accordionExample">
                            <li>
                                <a href=""> Add Sales </a>
                            </li>
                            <li>
                                <a href="" class="two-dates" data-toggle="modal"
                                    data-target="#date_modal"> All Sales </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu">
                        <a href="" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Pay</span>
                            </div>

                        </a>
                    </li>
                    <li class="menu">
                        <a href="" a class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Receive</span>
                            </div>

                        </a>
                    </li>
                    <li class="menu">
                        <a href="#ledger" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Ledger</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="ledger" data-parent="#accordionExample">
                            <li>
                                <a href="" class="two-dates" data-toggle="modal"
                                    data-target="#date_modal"> General </a>
                            </li>
                            <li>
                                <a href="" class="two-dates" data-toggle="modal"
                                    data-target="#date_modal"> Payment </a>
                            </li>
                            <li>
                                <a href="" class="two-dates" data-toggle="modal"
                                    data-target="#date_modal"> Recieved </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#monthly" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Monthly Reports</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="monthly" data-parent="#accordionExample">
                            <li>
                                <a href="" class="months-list" data-toggle="modal"
                                    data-target="#date_modal">Sale </a>
                            </li>
                            <li>
                                <a href="" class="months-list" data-toggle="modal"
                                    data-target="#date_modal"> Payment </a>
                            </li>
                            <li>
                                <a href="" class="months-list" data-toggle="modal"
                                    data-target="#date_modal"> Receiving </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#yearly" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Yearly Reports</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="yearly" data-parent="#accordionExample">
                            <li>
                                <a href="" class="years-list" data-toggle="modal"
                                    data-target="#date_modal">Sale </a>
                            </li>
                            <li>
                                <a href="" class="years-list" data-toggle="modal"
                                    data-target="#date_modal"> Payment </a>
                            </li>
                            <li>
                                <a href="" class="years-list" data-toggle="modal"
                                    data-target="#date_modal"> Receiving </a>
                            </li>

                        </ul>
                    </li> --}}


                    {{-- <li class="menu">

                        <a href="" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-airplay">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                            </path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                        <span>Payment</span>
                    </div>
                    </a>

                    </li>
                    <li class="menu">

                        <a href="" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-airplay">
                                    <path
                                        d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                                    </path>
                                    <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                </svg>
                                <span>Recovery</span>
                            </div>
                        </a>

                    </li> --}}

                </ul>
                <div class="shadow-bottom"></div>

            </nav>

        </div>
        <!-- END SIDEBAR -->

        <!-- BEGIN CONTENT AREA -->
        <div id="content" class="main-content">
            <div class="container-fluid mt-5">
                @yield('content')
            </div>



            <div class="footer-wrapper fixed-bottom">
                <div class="footer-section f-section-1 ">
                    <h6 class="text-center">Nurse</h6>
                </div>
                <div class="footer-section f-section-2">

                    <p class=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-heart">

                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12
                                 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06
                                  1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg>
                    </p>

                </div>
            </div>
        </div>
        <!-- END CONTENT AREA -->

    </div>
    <!-- END MAIN CONTAINER -->
    <div id="date_modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form id="dateForm" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Please Select</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">

                        <div id="dates" class="row">
                            <div class="form-group col-md-6">
                                <label for="">Start</label>
                                <input type="date" value="" class="form-control" name="start">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">End</label>
                                <input type="date" value="" class="form-control" name="end">
                            </div>
                        </div>

                        <div id="select_list1" class="row">
                            <div class="form-group col-md-6">
                                <label for="">Month</label>
                                <select name="month" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Year</label>
                                <select name="year" class="form-control">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                        </div>

                        <div id="select_list2" class="form-group">
                            <label for="">Year</label>
                            <select name="year" class="form-control">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                        
                        <div id="select_list3" class="form-group text-center">
                            <a id="paypal" class="btn btn-warning text-light paypal">Pay by PayPal</a>
                            <a id="card" class="btn btn-primary text-light paypal ">Pay by Card</a>
                            <a id="cash" class="btn btn-info text-light paypal ">Cash In Hand</a>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Go <i
                                    class="icon-paperplane"></i></button>
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>

    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('plugins/select2/select2.min.')}}js"></script>
    <script src="{{asset('plugins/select2/custom-select2.js')}}"></script>
    <script>
        $('.basic').select2();

        $(document).ready(function () {
            $('.two-dates').click(function (e) {
                refreshPopUp(e);
                console.log('hi');
                $('#dates').show();
                let url = $(this).attr('href');
                $('#dateForm').attr('action', url);
            });

            $('.months-list').click(function (e) {
                refreshPopUp(e);
                $('#select_list1').show();
                let url = $(this).attr('href');
                $('#dateForm').attr('action', url);
            });

            $('.years-list').click(function (e) {
                refreshPopUp(e);
                $('#select_list2').show();
                let url = $(this).attr('href');
                $('#dateForm').attr('action', url);
            });
            
            $('.buttons-list').click(function (e) {
                refreshPopUp(e);
                $('#select_list3').show();
                let id = this.id;
                $('#paypal').attr('href', "paypalroute"+'/'+id);
                $('#card').attr('href', "cardroute"+'/'+id);
                $('#cash').attr('href', "cashroute"+'/'+id);
            });

            
            function refreshPopUp(e) {
                e.preventDefault();
                $('#alert').hide();
                $('#dates').hide();
                $('#restorer').hide();
                $('#select_vendor').hide();
                $('#select_list1').hide();
                $('#select_list2').hide();
                $('#select_list3').hide();
            }
        });
    </script>
    @yield('scripts')

    <script src="{{asset('toastr/toastr.min.js')}}"></script>
    @toastr_render
</body>

</html>