<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/add-employee.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:39 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/css/lnr-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <title> Ajouter un employé | {{ config('app.name', 'MindCad') }} </title>

    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <div class="inner-wrapper">

        {{-- <div id="loader-wrapper">
            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div> --}}

        <header class="header">

            <div class="top-header-section">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="logo my-3 my-sm-0">
                                <a href="index.html">
                                    <img src="assets/img/logo.png" alt="logo image" class="img-fluid" width="100">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                            <div class="user-block d-none d-lg-block">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <div class="user-notification-block align-right d-inline-block">
                                            <div class="top-nav-search">
                                                <form>
                                                    <input type="text" class="form-control"
                                                        placeholder="Search here">
                                                    <button class="btn" type="submit"><i
                                                            class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>


                                        <div class="user-notification-block align-right d-inline-block">
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top"
                                                    title data-original-title="Apply Leave">
                                                    <a href="leave.html"
                                                        class="font-23 menu-style text-white align-middle">
                                                        <span class="lnr lnr-briefcase position-relative"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown"
                                                class=" menu-style dropdown-toggle">
                                                <div class="user-avatar d-inline-block">
                                                    <img src="assets/img/profiles/img-6.jpg" alt="user avatar"
                                                        class="rounded-circle img-fluid" width="55">
                                                </div>
                                            </a>

                                            <div
                                                class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                                <a class="dropdown-item p-2" href="employment.html">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-user mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Profile</span>
                                                        </span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item p-2" href="settings.html">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-cog mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Settings</span>
                                                        </span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item p-2" href="login.html">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-power-switch mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Logout</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <a href="javascript:void(0)">
                                    <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                                </a>

                                <div class="offcanvas-menu" id="offcanvas_menu">
                                    <span
                                        class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white"
                                        id="close_navSidebar"></span>
                                    <div class="user-info align-center bg-theme text-center">
                                        <a href="javascript:void(0)" class="d-block menu-style text-white">
                                            <div class="user-avatar d-inline-block mr-3">
                                                <img src="assets/img/profiles/img-6.jpg" alt="user avatar"
                                                    class="rounded-circle img-fluid" width="55">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-notification-block align-center">
                                        <div class="top-nav-search">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Search here">
                                                <button class="btn" type="submit"><i
                                                        class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="user-menu-items px-3 m-0">
                                        <a class="px-0 pb-2 pt-0" href="index.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-home mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Dashboard</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="employees.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-users mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Employees</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="company.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-apartment mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Company</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="calendar.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-calendar-full mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Calendar</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="leave.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-briefcase mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Leave</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="reviews.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-star mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reviews</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="reports.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-star mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reports</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="manage.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-sync mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Manage</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="settings.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-cog mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Settings</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="employment.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-user mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Profile</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="login.html">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-power-switch mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Logout</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>


        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                        <aside class="sidebar sidebar-user">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card ctm-border-radius shadow-sm grow">
                                        <div class="card-body py-4">
                                            <div class="row">
                                                <div class="col-md-12 mr-auto text-left">
                                                    <div class="custom-search input-group">
                                                        <div class="custom-breadcrumb">
                                                            <ol
                                                                class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                                <li class="breadcrumb-item d-inline-block"><a
                                                                        href="index.html" class="text-dark">Home</a>
                                                                </li>
                                                                <li class="breadcrumb-item d-inline-block active">
                                                                    Employees</li>
                                                            </ol>
                                                            <h4 class="text-dark">Add Person</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="sidebar-wrapper d-lg-block d-md-none d-none">
        <div class="card ctm-border-radius shadow-sm grow border-none">
         <div class="card-body">
          <div class="row no-gutters">
           <div class="col-6 align-items-center text-center">
            <a href="index.html"
             class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span
              class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span
              class>Dashboard</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="employees.html"
             class="text-white active p-4 second-slider-btn ctm-border-right ctm-border-top"><span
              class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span
              class>Employees</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="company.html"
             class="text-dark p-4 ctm-border-right ctm-border-left"><span
              class="lnr lnr-apartment pr-0 pb-lg-2 font-23"></span><span
              class>Company</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="calendar.html" class="text-dark p-4 ctm-border-right"><span
              class="lnr lnr-calendar-full pr-0 pb-lg-2 font-23"></span><span
              class>Calendar</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="leave.html"
             class="text-dark p-4 ctm-border-right ctm-border-left"><span
              class="lnr lnr-briefcase pr-0 pb-lg-2 font-23"></span><span
              class>Leave</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="reviews.html" class="text-dark p-4 ctm-border-right"><span
              class="lnr lnr-star pr-0 pb-lg-2 font-23"></span><span
              class>Reviews</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="reports.html"
             class="text-dark p-4 ctm-border-right ctm-border-left"><span
              class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span
              class>Reports</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="manage.html" class="text-dark p-4 ctm-border-right"><span
              class="lnr lnr-sync pr-0 pb-lg-2 font-23"></span><span
              class>Manage</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="settings.html"
             class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span
              class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span
              class>Settings</span></a>
           </div>
           <div class="col-6 align-items-center shadow-none text-center">
            <a href="employment.html"
             class="text-dark p-4 last-slider-btn ctm-border-right"><span
              class="lnr lnr-user pr-0 pb-lg-2 font-23"></span><span
              class>Profile</span></a>
           </div>
          </div>
         </div>
        </div>
       </div> -->

                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Details Content</h4>
                                </div>
                                <div class="card-body">
                                    <div id="list-example" class="list-group border-none">
                                        <a class="list-group-item list-group-item-action border-none"
                                            href="javascript:void(0)">Basic</a>
                                        <a class="list-group-item list-group-item-action border-none"
                                            href="javascript:void(0)">Employment</a>
                                        <a class="list-group-item list-group-item-action border-none"
                                            href="javascript:void(0)">Teams & Offices</a>
                                        <a class="list-group-item list-group-item-action border-none"
                                            href="javascript:void(0)">Salary</a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-lg-8  col-md-12">
                        <div class="accordion add-employee" id="accordion-details">
                            <div class="card shadow-sm grow ctm-border-radius">
                                <div class="card-header" id="basic1">
                                    <h4 class="cursor-pointer mb-0">
                                        <a class=" coll-arrow d-block text-dark" href="javascript:void(0)"
                                            data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
                                            Informations personnelles
                                            <br><span class="ctm-text-sm">Organisé et sécurisé.</span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body p-0">
                                    <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1"
                                        data-parent="#accordion-details">
                                        <form>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <input type="text" class="form-control" placeholder="Nom">
                                                </div>
                                                <div class="col form-group">
                                                    <input type="text" class="form-control" placeholder="Prénom">
                                                </div>
                                                <div class="row col-12 form-group">
                                                    <div class="col-6 form-group">
                                                        <input type="email" class="form-control"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="col-6 form-group">
                                                        <input type="phone_number" class="form-control"
                                                            placeholder="numero de téléphone">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group">
                                                        <select class="form-control select">
                                                            <option selected>Departement </option>
                                                            <option value="1">country1</option>
                                                            <option value="2">country2</option>
                                                            <option value="3">country3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <div class="cal-icon">
                                                            <input class="form-control datetimepicker cal-icon-input"
                                                                type="text" placeholder="Start Date">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Job Title">
                                                    </div>
                                                    <div class="col-12 form-group mb-0">
                                                        <p class="mb-2">Employment Type</p>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input"
                                                                id="Permanent" name="Permanent" checked>
                                                            <label class="custom-control-label"
                                                                for="Permanent">Permanent</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input"
                                                                id="Freelancer" name="Permanent">
                                                            <label class="custom-control-label"
                                                                for="Freelancer">Freelancer</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-12">
                                                    <div class=" custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" id="send-email" name="send-email"
                                                            class="custom-control-input">
                                                        <label class="mb-0 custom-control-label" for="send-email">Send
                                                            them an invite email so they can log in immediately</label>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm grow ctm-border-radius">
                                <div class="card-header" id="headingTwo">
                                    <h4 class="cursor-pointer mb-0">
                                        <a class="coll-arrow d-block text-dark" href="javascript:void(0)"
                                            data-toggle="collapse" data-target="#employee-det">
                                            Informations Professionnelles
                                            <br><span class="ctm-text-sm">Celles concernant le cadre de
                                                l'emploi.</span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body p-0">
                                    <div id="employee-det" class="collapse show ctm-padding"
                                        aria-labelledby="headingTwo" data-parent="#accordion-details">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <select class="form-control select">
                                                        <option selected>Departement </option>
                                                        <option value="1">country1</option>
                                                        <option value="2">country2</option>
                                                        <option value="3">country3</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="cal-icon">
                                                        <input class="form-control datetimepicker cal-icon-input"
                                                            type="text" placeholder="Start Date">
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Job Title">
                                                </div>
                                                <div class="col-12 form-group mb-0">
                                                    <p class="mb-2">Employment Type</p>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                            id="Permanent" name="Permanent" checked>
                                                        <label class="custom-control-label"
                                                            for="Permanent">Permanent</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                            id="Freelancer" name="Permanent">
                                                        <label class="custom-control-label"
                                                            for="Freelancer">Freelancer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm grow ctm-border-radius">
                                <div class="card-header" id="headingThree">
                                    <h4 class="cursor-pointer mb-0">
                                        <a class="coll-arrow d-block text-dark" href="javascript:void(0)"
                                            data-toggle="collapse" data-target="#term-office">
                                            Teams and Offices
                                            <br><span class="ctm-text-sm">Keep things tidy — and save time setting
                                                approvers and public holidays.</span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body p-0">
                                    <div id="term-office" class="collapse show ctm-padding"
                                        aria-labelledby="headingThree" data-parent="#accordion-details">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <select class="form-control select">
                                                    <option selected>Teams </option>
                                                    <option value="1">PHP</option>
                                                    <option value="2">Android</option>
                                                    <option value="3">Testing</option>
                                                    <option value="3">Designing</option>
                                                    <option value="3">IOS</option>
                                                    <option value="3">Business</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <select class="form-control select">
                                                    <option selected>Line Manager</option>
                                                    <option value="1">Robert Wilson</option>
                                                    <option value="2">Maria Cotton</option>
                                                    <option value="3">Danny Ward</option>
                                                    <option value="4">Linda Craver</option>
                                                    <option value="5">Jenni Sims</option>
                                                    <option value="6">John Gibbs</option>
                                                    <option value="7">Stacey Linville</option>
                                                </select>
                                            </div>
                                            <div class="col-12 form-group mb-0">
                                                <select class="form-control select">
                                                    <option selected>Office Name</option>
                                                    <option value="1">Focus Technology</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow-sm grow ctm-border-radius">
                                <div class="card-header" id="headingFour">
                                    <h4 class="cursor-pointer mb-0">
                                        <a class="coll-arrow d-block text-dark" href="javascript:void(0)"
                                            data-toggle="collapse" data-target="#salary_det">
                                            Salary Details
                                            <br><span class="ctm-text-sm">Stored securely, only visible to Super
                                                Admins,
                                                Payroll Admins, and themselves.</span>
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body p-0">
                                    <div id="salary_det" class="collapse show ctm-padding"
                                        aria-labelledby="headingFour" data-parent="#accordion-details">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <select class="form-control select">
                                                    <option selected>Currency </option>
                                                    <option value="1">$</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" class="form-control" placeholder="Amount">
                                            </div>
                                            <div class="col-12 form-group">
                                                <select class="form-control select">
                                                    <option selected>Frequency</option>
                                                    <option value="1">Annualy</option>
                                                    <option value="2">Monthly</option>
                                                    <option value="3">Weekly</option>
                                                    <option value="4">Daily</option>
                                                    <option value="5">Hourly</option>
                                                    <option value="6">Fixed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 form-group mb-0">
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker cal-icon-input"
                                                        type="text" placeholder="Start Date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="submit-section text-center btn-add">
                                    <button class="btn btn-theme text-white ctm-border-radius button-1">Add Team
                                        Membre</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('assets/plugins/select2/moment.min.js') }}" type="8c71ada0541a581dc1146ff9-text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="8c71ada0541a581dc1146ff9-text/javascript"></script>

    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}" type="8c71ada0541a581dc1146ff9-text/javascript"></script>

    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"
		type="8c71ada0541a581dc1146ff9-text/javascript"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"
         type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
         type="647b56e7c0d4cdeba6be909f-text/javascript"></script>

    <script src="{{ asset('assets/js/script.js') }}" type="647b56e7c0d4cdeba6be909f-text/javascript"></script>
    <script src="{{ asset('../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="647b56e7c0d4cdeba6be909f-|49" defer></script>






</body>

<!-- Mirrored from dleohr.dreamstechnologies.com/template-1/dleohr-vertical/add-employee.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 15:50:39 GMT -->

</html>
