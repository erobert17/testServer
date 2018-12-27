<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard | Admire</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('img/logo1.ico')}}"/>

    <!--global styles-->
        <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-3-vert-offset-shim.css')}}">
        
        <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
        
        <!-- global styles-->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!-- end of global styles
    <link type="text/css" rel="stylesheet" href="{{asset('/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/vendors/toastr/css/toastr.min.css')}}"/>
     <link type="text/css" rel="stylesheet" href="{{asset('/vendors/switchery/css/switchery.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/new_dashboard.css')}}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>-->

</head>

<body class="body">

<!--
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="img/loader.gif" style=" width: 40px;" alt="loading...">
    </div>
</div>
-->

<div class="bg-dark" id="wrap">
    <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand float-left text-center" href="index.html">
                    <h4 class="text-white">!!HERE ADMIRE ADMIN</h4>
                </a>
                <div class="menu">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars text-white"></i>
                    </span>
                </div>
                <div class="topnav dropdown-menu-right float-right">
                    <div class="btn-group">
                        <div class="notifications no-bg">
                            <a class="btn btn-default btn-sm messages" data-toggle="dropdown"> <i class="fa fa-envelope fa-1x text-white"></i>
                                <!--<span class="bg-warning message_tags">4</span>-->
                                <span class="badge badge-warning">8</span>
                            </a>
                            <div class="dropdown-menu drop_box_align" role="menu" id="messages_dropdown">
                                <div class="popover-title">You have 8 Messages</div>
                                <div id="messages">
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/5.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data"><strong>hally</strong>
                                                sent you an image.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/8.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data"><strong>Meri</strong>
                                                invitation for party.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/7.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <strong>Remo</strong>
                                                meeting details .
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/6.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <strong>David</strong>
                                                upcoming events list.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/5.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data"><strong>hally</strong>
                                                sent you an image.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/8.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data"><strong>Meri</strong>
                                                invitation for party.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/7.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <strong>Remo</strong>
                                                meeting details .
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/6.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <strong>David</strong>
                                                upcoming events list.
                                                <br>
                                                <small>add to timeline</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popover-footer">
                                    <a href="mail_inbox.html">Inbox</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="notifications messages no-bg">
                            <a class="btn btn-default btn-sm" data-toggle="dropdown"> <i class="fa fa-bell text-white"></i>
                                <!--<span class="bg-danger notification_tags">4</span>-->
                                <span class="badge badge-danger">9</span>
                            </a>
                            <div class="dropdown-menu drop_box_align" role="menu">
                                <div class="popover-title">You have 9 Notifications</div>
                                <div id="notifications">
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/1.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/2.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>clay</strong>
                                                business propasals
                                                <br>
                                                <small class="primary_txt">20min Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/3.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>John</strong>
                                                meeting at Ritz
                                                <br>
                                                <small class="primary_txt">2hrs Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/6.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Luicy</strong>
                                                Request Invitation
                                                <br>
                                                <small class="primary_txt">Yesterday.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/1.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/2.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>clay</strong>
                                                business propasals
                                                <br>
                                                <small class="primary_txt">20min Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/3.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>John</strong>
                                                meeting at Ritz
                                                <br>
                                                <small class="primary_txt">2hrs Back.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/6.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Luicy</strong>
                                                Request Invitation
                                                <br>
                                                <small class="primary_txt">Yesterday.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="img/mailbox_imgs/1.jpg" class="message-img avatar rounded-circle"
                                                     alt="avatar1"></div>
                                            <div class="col-10 message-data">
                                                <i class="fa fa-clock-o"></i>
                                                <strong>Remo</strong>
                                                sent you an image
                                                <br>
                                                <small class="primary_txt">just now.</small>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popover-footer">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-default btn-sm messages toggle-right">
                            &nbsp;
                            <i class="fa fa-cog text-white"></i>
                            &nbsp;
                        </a>
                    </div>
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="img/admin.jpg" class="admin_img2 rounded-circle avatar-img" alt="avatar"> <strong>Micheal</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <a class="dropdown-item title" href="#">
                                    Admire Admin</a>
                                <a class="dropdown-item" href="edit_user.html"><i class="fa fa-cogs"></i>
                                    Account Settings</a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user"></i>
                                    User Status
                                </a>
                                <a class="dropdown-item" href="mail_inbox.html"><i class="fa fa-envelope"></i>
                                    Inbox</a>

                                <a class="dropdown-item" href="lockscreen.html"><i class="fa fa-lock"></i>
                                    Lock Screen</a>
                                <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out"></i>
                                    Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-toggleable-sm col-xl-6 col-lg-6 hidden-md-down float-right  top_menu" id="nav-content">
                    <ul class="nav navbar-nav top_menubar">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="mail_inbox.html">
                                <i class="fa fa-inbox"></i> <span class="quick_text">Inbox</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="mail_compose.html">
                                <i class="fa fa fa-edit"></i> <span class="quick_text">Compose</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="maps.html">
                                <i class="fa fa-map-marker"></i> <span class="quick_text">Maps</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="gallery.html">
                                <i class="fa fa-picture-o"></i> <span class="quick_text">Gallery</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- /.container-fluid --> </nav>
        <!-- /.navbar -->
        <!-- /.head --> </div>
    <!-- /#top -->
    <div class="wrapper">
        <div id="left">
            <div class="media user-media bg-dark dker">
                <div class="user-media-toggleHover">
                    <span class="fa fa-user"></span>
                </div>
                <div class="user-wrapper bg-dark">
                    <a class="user-link" href="">
                        <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                             src="img/admin.jpg">
                        <p class="text-white user-info">Welcome Micheal</p>
                    </a>
                    <div class="search_bar col-lg-12">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="search">
                            <span class="input-group-btn">
<button class="btn without_border" type="button"><span class="fa fa-search">
</span></button>
</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #menu -->
            <ul id="menu" class="bg-blue dker">
                <li class="active">
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                        <span class="link-title">&nbsp;Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-anchor"></i>
                        <span class="link-title">&nbsp; Components</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="general_components.html">
                                <i class="fa fa-angle-right"></i> &nbsp; General Components
                            </a>
                        </li>
                        <li>
                            <a href="transitions.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Transitions
                            </a>
                        </li>
                        <li>
                            <a href="buttons.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Buttons
                            </a>
                        </li>
                        <li>
                            <a href="icons.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Icons
                            </a>
                        </li>
                        <li>
                            <a href="tooltips.html">
                                <i class="fa fa-angle-right"></i>&nbsp; Tooltips
                            </a>
                        </li>
                        <li>
                            <a href="animations.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Animations
                            </a>
                        </li>
                        <li>
                            <a href="sliders.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Sliders
                            </a>
                        </li>
                        <li>
                            <a href="notifications.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Notifications
                            </a>
                        </li>
                        <li>
                            <a href="p_notify.html">
                                <i class="fa fa-angle-right"></i> &nbsp; P-Notify
                            </a>
                        </li>
                        <li>
                            <a href="cropper.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Cropper
                            </a>
                        </li>
                        <li>
                            <a href="jstree.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Js Tree
                            </a>
                        </li>
                        <li>
                            <a href="modal.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Modals
                            </a>
                        </li>
                        <li>
                            <a href="sortable.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Sortable
                            </a>
                        </li>
                        <li>
                            <a href="sweet_alert.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Sweet alerts
                            </a>
                        </li>
                        <li>
                            <a href="grids_layout.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Grid View
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-th-large"></i>
                        <span class="link-title">&nbsp; Widgets</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="widgets.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Widgets1
                            </a>
                        </li>
                        <li>
                            <a href="widgets2.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Widgets2
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-pencil"></i>
                        <span class="link-title">&nbsp; Forms</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="form_elements.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Form Elements
                            </a>
                        </li>
                        <li>
                            <a href="form_layouts.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Form Layouts
                            </a>
                        </li>
                        <li>
                            <a href="form_validations.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Form Validations
                            </a>
                        </li>
                        <li>
                            <a href="form_editors.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Form Editors
                            </a>
                        </li>
                        <li>
                            <a href="radio_checkbox.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Radio and Checkbox
                            </a>
                        </li>
                        <li>
                            <a href="form_wizards.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Wizards
                            </a>
                        </li>
                        <li>
                            <a href="datetime_picker.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Date Time Picker
                            </a>
                        </li>
                        <li>
                            <a href="ratings.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Ratings
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span class="link-title">&nbsp; Tables</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="simple_tables.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Simple Tables
                            </a>
                        </li>
                        <li>
                            <a href="simple_datatables.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Simple Data Tables
                            </a>
                        </li>
                        <li>
                            <a href="datatables.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Data Tables
                            </a>
                        </li>
                        <li>
                            <a href="advanced_tables.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Advanced Tables
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart"></i>
                        <span class="link-title">&nbsp; Charts</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="charts.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Flot Charts
                            </a>
                        </li>
                        <li>
                            <a href="advanced_charts.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Advanced Charts
                            </a>
                        </li>
                        <li>
                            <a href="chartist.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Chartist
                            </a>
                        </li>
                        <li>
                            <a href="rickshaw.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Rickshaw Charts
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span class="link-title">&nbsp; Users</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="users.html">
                                <i class="fa fa-angle-right"></i> &nbsp; User Grid
                            </a>
                        </li>
                        <li>
                            <a href="add_user.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Add User
                            </a>
                        </li>
                        <li>
                            <a href="view_user.html">
                                <i class="fa fa-angle-right"></i> &nbsp; User Profile
                            </a>
                        </li>
                        <li>
                            <a href="delete_user.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Delete User
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fa fa-calendar"></i>
                        <span class="link-title">&nbsp; Calendar</span>
                        <span class="badge badge-pill badge-primary float-right calendar_badge">7</span>
                    </a>
                </li>
                <li>
                    <a href="gallery.html">
                        <i class="fa fa-picture-o"> </i> &nbsp; Gallery
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="link-title">&nbsp; Email</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="mail_compose.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Compose
                            </a>
                        </li>
                        <li>
                            <a href="mail_inbox.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Inbox
                            </a>
                        </li>
                        <li>
                            <a href="mail_view.html">
                                <i class="fa fa-angle-right"></i> &nbsp; View
                            </a>
                        </li>
                        <li>
                            <a href="mail_sent.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Sent
                            </a>
                        </li>
                        <li>
                            <a href="mail_spam.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Spam
                            </a>
                        </li>
                        <li>
                            <a href="mail_draft.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Draft
                            </a>
                        </li>
                        <li>
                            <a href="mail_trash.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Trash
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-map-marker"></i>
                        <span class="link-title">&nbsp; Maps</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="maps.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Google Maps
                            </a>
                        </li>
                        <li>
                            <a href="jqvmaps.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Vector Maps
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-file"></i>
                        <span class="link-title">&nbsp; Pages</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="404.html">
                                <i class="fa fa-angle-right"></i> &nbsp; 404
                            </a>
                        </li>
                        <li>
                            <a href="500.html">
                                <i class="fa fa-angle-right"></i> &nbsp; 500
                            </a>
                        </li>
                        <li>
                            <a href="login.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Login
                            </a>
                        </li>
                        <li>
                            <a href="register.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Register
                            </a>
                        </li>
                        <li>
                            <a href="lockscreen.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Lock Screen
                            </a>
                        </li>
                        <li>
                            <a href="invoice.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Invoice
                            </a>
                        </li>
                        <li>
                            <a href="blank.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Blank Page
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span class="link-title">&nbsp; Layouts</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="boxed.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Boxed Layout
                            </a>
                        </li>
                        <li>
                            <a href="fixed-header-boxed.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Boxed &amp; Fixed Header
                            </a>
                        </li>
                        <li>
                            <a href="fixed-header-menu.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Fixed Header &amp; Menu
                            </a>
                        </li>
                        <li>
                            <a href="fixed-header.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Fixed Header
                            </a>
                        </li>
                        <li>
                            <a href="fixed-menu-boxed.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Boxed &amp; Fixed Menu
                            </a>
                        </li>
                        <li>
                            <a href="fixed-menu.html">
                                <i class="fa fa-angle-right"></i> &nbsp; Fixed Menu
                            </a>
                        </li>
                        <li>
                            <a href="no-header.html">
                                <i class="fa fa-angle-right"></i> &nbsp; No Header
                            </a>
                        </li>
                        <li>
                            <a href="no-left-sidebar.html">
                                <i class="fa fa-angle-right"></i> &nbsp; No Left Sidebar
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-sitemap"></i>
                        <span class="link-title">&nbsp; Multi Level Menu</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right"></i> &nbsp;Level 1
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp;Level 2
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp;Level 2
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp;Level 2
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu sub-submenu">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-angle-right"></i> &nbsp;Level 3
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-angle-right"></i> &nbsp;Level 3
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-angle-right"></i> &nbsp;Level 3
                                                <span class="fa arrow"></span>
                                            </a>
                                            <ul class="sub-menu sub-submenu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-angle-right"></i> &nbsp;Level 4
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-angle-right"></i> &nbsp;Level 4
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-angle-right"></i> &nbsp;Level 4
                                                        <span class="fa arrow"></span>
                                                    </a>
                                                    <ul class="sub-menu sub-submenu">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-angle-right"></i> &nbsp;Level 5
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-angle-right"></i> &nbsp;Level 5
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-angle-right"></i> &nbsp;Level 5
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-angle-right"></i> &nbsp;Level 4
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp;Level 2
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right"></i> &nbsp;Level 1
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right"></i> &nbsp;Level 1
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu sub-submenu">
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp;Level 2
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp;Level 2
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-angle-right"></i> &nbsp;Level 2
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /#menu -->
        </div>
        <!-- /#left -->
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar">
                    <div class="row">
                    <div class="col-6">
                        <h4 class="m-t-5">
                            <i class="fa fa-home"></i>
                            Dashboard
                        </h4>
                    </div>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-12">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="bg-primary top_cards">
                                        <div class="row icon_margin_left">

                                            <div class="col-lg-5 col-5 icon_padd_left">
                                                <div class="float-left">
<span class="fa-stack fa-sm">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-shopping-cart fa-stack-1x fa-inverse text-primary sales_hover"></i>
</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-7 icon_padd_right">
                                                <div class="float-right cards_content">
                                                    <span class="number_val" id="sales_count"></span><i
                                                        class="fa fa-long-arrow-up fa-2x"></i>
                                                    <br/>
                                                    <span class="card_description">Sales</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="bg-success top_cards">
                                        <div class="row icon_margin_left">
                                            <div class="col-lg-5  col-5 icon_padd_left">
                                                <div class="float-left">
<span class="fa-stack fa-sm">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-eye fa-stack-1x fa-inverse text-success visit_icon"></i>
</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-7 icon_padd_right">
                                                <div class="float-right cards_content">
                                                    <span class="number_val" id="visitors_count"></span><i
                                                        class="fa fa-long-arrow-up fa-2x"></i>
                                                    <br/>
                                                    <span class="card_description">Visitors</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="bg-warning top_cards">
                                        <div class="row icon_margin_left">
                                            <div class="col-lg-5 col-5 icon_padd_left">
                                                <div class="float-left">
<span class="fa-stack fa-sm">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-usd fa-stack-1x fa-inverse text-warning revenue_icon"></i>
</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-7 icon_padd_right">
                                                <div class="float-right cards_content">
                                                    <span class="number_val" id="revenue_count"></span><i
                                                        class="fa fa-long-arrow-up fa-2x"></i>
                                                    <br/>
                                                    <span class="card_description">Revenue</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="bg-mint top_cards">
                                        <div class="row icon_margin_left">
                                            <div class="col-lg-5 col-5 icon_padd_left">
                                                <div class="float-left">
<span class="fa-stack fa-sm">
<i class="fa fa-circle fa-stack-2x"></i>
<i class="fa fa-users  fa-stack-1x fa-inverse text-mint sub"></i>
</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-7 icon_padd_right">
                                                <div class="float-right cards_content">
                                                    <span class="number_val" id="subscribers_count"></span><i
                                                        class="fa fa-long-arrow-down fa-2x"></i>
                                                    <br/>
                                                    <span class="card_description">Subscribers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 col-12 stat_align">
                            <div class="card weather_section md_align_section">
                                <div class="card-block">
                                    <div class="row margin_align">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="icon sun-shower">
                                                        <div class="cloud"></div>
                                                        <div class="sun">
                                                            <div class="rays"></div>
                                                        </div>
                                                        <div class="rain"></div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="weather-value">
<span class=" text-white"><span class="degree">25&deg;</span>
</span>
                                                    </div>
                                                    <div class="weather_location">
                                                        <span class="text-white"><i class="fa fa-map-marker"></i> London</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row weekly_report">
                                                <div class="col-3">
                                                    <span>Mon</span>
                                                    <br/>
                                                    !!HERE 
                                                    <p>27&deg;</p>
                                                </div>
                                                <div class="col-3">
                                                    <span>Tue</span>
                                                    <br/>
                                                    !!HERE 
                                                    <p>23&deg;</p>
                                                </div>
                                                <div class="col-3">
                                                    <span>Wed</span>
                                                    <br/>
                                                    !!HERE 
                                                    <p>19&deg;</p>
                                                </div>
                                                <div class="col-3">
                                                    <span>Thu</span>
                                                    <br/>
                                                    !!HERE 
                                                    <p>38&deg;</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 col-12 m-t-25">
                            <div class="card">
                                <ul id="clothing-nav" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Statistics</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#hats" role="tab" id="hats-tab" data-toggle="tab" aria-controls="hats">Stock Exchange</a>
                                    </li>
                                </ul>
                                <div class="card-block">
                                    <div id="clothing-nav-content" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show active" id="home" aria-labelledby="home-tab">
                                            <div id="area-chart" class="flotChart3"></div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="hats" aria-labelledby="hats-tab">
                                            <div class="form-group float-right">
                                                <span class="live_switch">Live</span>
                                                <input type="checkbox" id="toggle_real" name="my-checkbox"
                                                       data-size="large" checked>
                                            </div>
                                            <div id="realtime" class="flotChart4 float-right"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 m-t-25 md_align_section">
                            <div class="card">
                                <div class="card-header bg-white">
                                    This Month
                                </div>
                                <div class="card-body">
                                    <div class="task-item">

                                        Sales
                                        <span class="float-right text-muted progress-info">52%</span>
                                        <div id="progress-bar">
                                            <!--<progress class="progress progress-danger" value="52"-->
                                            <!--max="100"></progress>-->
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        Projects
                                        <span class="float-right text-muted progress-primary">80%</span>
                                        <div id="progress-bar1">
                                            <!--<progress class="progress progress-warning" value="80"-->
                                            <!--max="100"></progress>-->
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        Visitors
                                        <span class="float-right text-muted progress-warning">25%</span>
                                        <div id="progress-bar21">
                                            <!--<progress class="progress progress-success" value="25"-->
                                            <!--max="100"></progress>-->
                                            <div class="progress" id="progress-bar2">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        New Users
                                        <span class="float-right text-muted progress-primary">93%</span>
                                        <div id="progress-bar5">
                                            <!--<progress class="progress progress-primary" value="93" max="100"></progress>-->
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 93%" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        Revenue
                                        <span class="float-right text-muted progress-danger">50%</span>
                                        <div id="progress-bar3">
                                            <!--<progress class="progress progress-danger" value="50" max="100"></progress>-->
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="task-item">
                                        Total sold
                                        <span class="float-right text-muted">40%</span>
                                        <div id="progress-bar4">
                                            <!--<progress class="progress progress-mint" value="40" max="100"></progress>-->
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12 m-t-35">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Today Analytics
                                </div>
                                <div class="card-block">
                                    <div id="donut" class="centered"></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-12 m-t-35">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Server Load
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="server_item text-danger">
                                                <span>Total Usage</span>
                                                <p>72GB</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="server_item text-success">
                                                <span>Total Space</span>
                                                <p>600GB</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="server_item text-info">
                                                <span>CPU</span>
                                                <p>57%</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="flotchart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 m-t-35">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Browsers Stats
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-12 m-t-35">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <div class=" twitter_section_head">
                                        Team Activities
                                    </div>
                                </div>
                                <div class="card-block twitter_section">
                                    <ul id="nt-example1">
                                        <li>
                                            <div class="row">
                                                <div class="col-2 col-lg-3 col-xl-2">
                                                    <img src="img/images.jpg" class="rounded-circle"
                                                         alt="image not found">
                                                </div>
                                                <div class="col-10 col-lg-9 col-xl-10">
                                                    <span class="name">Robert Rivera</span> <span
                                                        class="time">2m ago</span>
                                                    <br>
                                                    <span class="msg">
Lorem Ipsum is simply dummy text of the printing.</span>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-2 col-lg-3 col-xl-2">
                                                    <img src="img/images3.jpg" class="rounded-circle"
                                                         alt="image not found">
                                                </div>
                                                <div class="col-10 col-lg-9 col-xl-10">
                                                    <span class="name">Mildred Yanez</span> <span
                                                        class="time">2m ago</span>
                                                    <br>
                                                    <span class="msg">
Lorem Ipsum is simply dummy text of the printing.</span>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-2 col-lg-3 col-xl-2">
                                                    <img src="img/images2.jpg" class="rounded-circle"
                                                         alt="image not found">
                                                </div>
                                                <div class="col-10 col-lg-9 col-xl-10">
                                                    <span class="name">Thomas Rogers</span> <span
                                                        class="time">3m ago</span>
                                                    <br>
                                                    <span class="msg">
Lorem Ipsum is simply dummy text of the printing.</span>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-2 col-lg-3 col-xl-2">
                                                    <img src="img/images4.jpg" class="rounded-circle"
                                                         alt="image not found">
                                                </div>
                                                <div class="col-10 col-lg-9 col-xl-10">
                                                    <span class="name">Celeste Foxx</span> <span
                                                        class="time">1m ago</span>
                                                    <br> <span class="msg">
Lorem Ipsum is simply dummy text of the printing.</span>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-2 col-lg-3 col-xl-2">
                                                    <img src="img/images3.jpg" class="rounded-circle"
                                                         alt="image not found">
                                                </div>
                                                <div class="col-10 col-lg-9 col-xl-10">
                                                    <span class="name">Mildred Yanez</span> <span
                                                        class="time">2m ago</span>
                                                    <br>
                                                    <span class="msg">
Lorem Ipsum is simply dummy text of the printing.</span>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-2 col-lg-3 col-xl-2">
                                                    <img src="img/images2.jpg" class="rounded-circle"
                                                         alt="image not found">
                                                </div>
                                                <div class="col-10 col-lg-9 col-xl-10">
                                                    <span class="name">Thomas Rogers</span> <span
                                                        class="time">3m ago</span>
                                                    <br>
                                                    <span class="msg">
Lorem Ipsum is simply dummy text of the printing.</span>
                                                </div>
                                            </div>
                                            <hr>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="row">
                                <div class="col-lg-7 col-12 m-t-35">
                                    <div class="card to_do">
                                        <div class="card-header bg-white">
                                            To Do List
                                        </div>
                                        <div class="card-block no-padding to_do_section">
                                            <div class="row">
                                                <div class="todo_section">
                                                    <form class="list_of_items">
                                                        <div class="todolist_list showactions px-3">
                                                            <div class="row">
                                                                <div class="col-9 nopad custom_textbox1">
                                                                    <div class="todo_primarybadge"></div>
                                                                    <div class="todoitemcheck checkbox-custom">
                                                                        <input type="checkbox" class="striked large"/>
                                                                    </div>
                                                                    <div class="todotext todoitem todo_width">Meeting with CEO</div>
                                                                </div>
                                                                <div class="col-3  showbtns todoitembtns">
                                                                    <a href="#" class="todoedit">
                                                                        <span class="fa fa-pencil"></span>
                                                                    </a>
                                                                    <span class='dividor'>|</span>
                                                                    <a href="#" class="tododelete redcolor">
                                                                        <span class="fa fa-trash"></span>
                                                                    </a>
                                                                </div>
                                                                <span class="seperator"></span>
                                                            </div>
                                                        </div>
                                                        <div class="todolist_list showactions px-3">
                                                            <div class="row">
                                                                <div class="col-9 nopad custom_textbox1">
                                                                    <div class="todo_dangerbadge bg-danger"></div>
                                                                    <div class="todoitemcheck">
                                                                        <input type="checkbox" class="striked"/>
                                                                    </div>
                                                                    <div class="todotext todoitem todo_width">Team Out</div>
                                                                </div>
                                                                <div class="col-3  float-right showbtns todoitembtns">
                                                                    <a href='#' class='todoedit'>
                                                                        <span class='fa fa-pencil'></span>
                                                                    </a>
                                                                    <span class='dividor'>|</span>
                                                                    <a href="#" class="tododelete redcolor">
                                                                        <span class="fa fa-trash"></span>
                                                                    </a>
                                                                </div>
                                                                <span class="seperator"></span>
                                                            </div>
                                                        </div>
                                                        <div class="todolist_list showactions px-3">
                                                            <div class="row">
                                                                <div class="col-9 nopad custom_textbox1">
                                                                    <div class="todo_warningbadge"></div>
                                                                    <div class="todoitemcheck">
                                                                        <input type="checkbox" class="striked" checked/>
                                                                    </div>
                                                                    <div class="todotext todoitem todo_width strikethrough">Review on Sales</div>
                                                                </div>
                                                                <div class="col-3 float-right showbtnschk showbtns todoitembtns">
                                                                    <a href="#" class="todoedit">
                                                                        <span class="fa fa-pencil"></span>
                                                                    </a>
                                                                    <span class='dividor'>|</span>
                                                                    <a href="#" class="tododelete redcolor">
                                                                        <span class="fa fa-trash"></span>
                                                                    </a>
                                                                </div>
                                                                <span class="seperator"></span>
                                                            </div>
                                                        </div>
                                                        <div class="todolist_list showactions px-3">
                                                            <div class="row">
                                                                <div class="col-9 nopad custom_textbox1">
                                                                    <div class="todo_infobadge"></div>
                                                                    <div class="todoitemcheck">
                                                                        <input type="checkbox" class="striked"/>
                                                                    </div>
                                                                    <div class="todotext todoitem todo_width">Analysis on Views</div>
                                                                </div>
                                                                <div class="col-3 float-right showbtns todoitembtns">
                                                                    <a href="#" class="todoedit">
                                                                        <span class="fa fa-pencil"></span>
                                                                    </a>
                                                                    <span class='dividor'>|</span>
                                                                    <a href="#" class="tododelete redcolor">
                                                                        <span class="fa fa-trash"></span>
                                                                    </a>
                                                                </div>
                                                                <span class="seperator"></span>
                                                            </div>
                                                        </div>
                                                        <div class="todolist_list showactions px-3">
                                                            <div class="row">
                                                                <div class="col-9 nopad custom_textbox1">
                                                                    <div class="todo_warningbadge"></div>
                                                                    <div class="todoitemcheck">
                                                                        <input type="checkbox" class="striked" checked/>
                                                                    </div>
                                                                    <div class="todotext todoitem todo_width strikethrough">Seminar on Market</div>
                                                                </div>
                                                                <div class="col-3 float-right showbtnschk showbtns todoitembtns">
                                                                    <a href="#" class="todoedit">
                                                                        <span class="fa fa-pencil"></span>
                                                                    </a>
                                                                    <span class='dividor'>|</span>
                                                                    <a href="#" class="tododelete redcolor">
                                                                        <span class="fa fa-trash"></span>
                                                                    </a>
                                                                </div>
                                                                <span class="seperator"></span>
                                                            </div>
                                                        </div>
                                                        <div class="todolist_list showactions px-3">
                                                            <div class="row">
                                                                <div class="col-9 nopad custom_textbox1">
                                                                    <div class="todo_primarybadge"></div>
                                                                    <div class="todoitemcheck">
                                                                        <input type="checkbox" class="striked"/>
                                                                    </div>
                                                                    <div class="todotext todoitem todo_width">Renewal Domain</div>
                                                                </div>
                                                                <div class="col-3  float-right showbtns todoitembtns">
                                                                    <a href="#" class="todoedit">
                                                                        <span class="fa fa-pencil"></span>
                                                                    </a>
                                                                    <span class='dividor'>|</span>
                                                                    <a href="#" class="tododelete redcolor">
                                                                        <span class="fa fa-trash"></span>
                                                                    </a>
                                                                </div>
                                                                <span class="seperator"></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <form id="main_input_box" class="form-inline">
                                                    <div class="input-group todo">
                                                            <span class="input-group-btn">
                                                            <a class="btn btn-primary" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-contentwrapper=".mycontent" id="btn_color" data-badge="todo_mintbadge">Color&nbsp;&nbsp; <i
                                                                    class="fa fa-caret-right"> </i></a>
                                                            </span>
                                                        <input id="custom_textbox" name="Item" type="text" required
                                                               placeholder="Write and hit enter"
                                                               class="input-md form-control" size="75"/>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="mycontent">
                                                <div class="border_color bg-danger border_danger"
                                                     data-color="btn-danger" data-badge="bg-danger"></div>
                                                <div class="border_color bg-primary border_primary"
                                                     data-color="btn-primary" data-badge="bg-primary"></div>
                                                <div class="border_color bg-info border_info" data-color="btn-info"
                                                     data-badge="bg-info"></div>
                                                <div class="border_color bg-mint border_mint" data-color="btn-mint"
                                                     data-badge="bg-mint"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-12 m-t-35">
                                    <div class="block widget-notes">
                                        <div class="card" id="notes_section">
                                            <div class="card-header bg-white">
                                                Notes
                                            </div>
                                            <div class="content">
                                                <div class="notes" contenteditable="true">
                                                    <div>Send e-mails.
                                                        <br> Sometimes on purpose
                                                        <br>
                                                        It is a long established
                                                        <br> Contrary to popular belief.
                                                        <br> <i>Bootstrap4 admire admin</i>
                                                        <br>Company status
                                                        <br> Sometime is special
                                                        <br> <b>Meeting with CEO</b>
                                                        <br> Team out
                                                        <br> welcome to admire

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.outer -->
            </div>
            <!-- /#content -->
        </div>
    </div>
    <!--wrapper-->
    <div id="right">
        <div class="right_content">
            <div class="alert alert-success white_txt">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Welcome Micheal
                    <br/></strong>
                Set Your Skin Here. Checkout Admin Statistics. Good Day!.
            </div>
            <div class="well well-small dark">
                <div class="xs_skin_hide hidden-sm-up toggle-right"> <i class="fa fa-cog"></i></div>
                <h4 class="brown_txt">
                    <span class="fa-stack fa-sm">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-paint-brush fa-stack-1x fa-inverse"></i>
                </span>
                    Skins
                </h4>
                <br/>

                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('blue_black_skin.css','css')}}">
                    <div class="skin_blue skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('green_black_skin.css','css')}}">
                    <div class="skin_green skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('purple_black_skin.css','css')}}">
                    <div class="skin_purple skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('orange_black_skin.css','css')}}">
                    <div class="skin_orange skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('red_black_skin.css','css')}}">
                    <div class="skin_red skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('mint_black_skin.css','css')}}">
                    <div class="skin_mint skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('brown_black_skin.css','css')}}">
                    <div class="skin_brown skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skinmulti_btn" onclick="javascript:loadjscssfile('black_skin.css','css')}}">
                    <div class="skin_black skin_size"></div>
                    <div class="skin_black skin_size"></div>
                </div>
                <div class="skin_btn skin_blue" onclick="javascript:loadjscssfile('blue_skin.css','css')}}"></div>
                <div class="skin_btn skin_green" onclick="javascript:loadjscssfile('green_skin.css','css')}}"></div>
                <div class="skin_btn skin_purple" onclick="javascript:loadjscssfile('purple_skin.css','css')}}"></div>
                <div class="skin_btn skin_orange" onclick="javascript:loadjscssfile('orange_skin.css','css')}}"></div>
                <div class="skin_btn skin_red" onclick="javascript:loadjscssfile('red_skin.css','css')}}"></div>
                <div class="skin_btn skin_mint" onclick="javascript:loadjscssfile('mint_skin.css','css')}}"></div>
                <div class="skin_btn skin_brown" onclick="javascript:loadjscssfile('brown_skin.css','css')}}"></div>
                <div class="skin_btn skin_black" onclick="javascript:loadjscssfile('black_skin.css','css')}}"></div>

            </div>
            <div class="well well-small dark">
                <h4 class="brown_txt margin15_bottom">
                    <img src="img/admin.jpg" width="32" height="32" class="rounded-circle avatar-img" alt="avatar"> &nbsp;Admin
                    Statistics</h4>
                <br/>
                <ul class="list-unstyled">
                    <li class="green_txt margin15_bottom">
                <span class="fa-stack fa-sm">
                    <i class="fa fa-circle fa-stack-2x text-mint"></i>
                    <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                </span>
                        &nbsp; Last Login
                        <span class="inlinesparkline float-right">2hrs Back</span>
                    </li>
                    <li class="warning_txt margin15_bottom">
                        <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-brown"></i>
                      <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                    </span>
                        &nbsp; Pending Tasks
                        <span class="dynamicsparkline float-right">12</span>
                    </li>
                    <li class="primary_txt margin15_bottom">
                        <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                      <i class="fa fa-cloud fa-stack-1x fa-inverse"></i>
                    </span>
                        &nbsp; Weather Today
                        <span class="dynamicbar float-right">Rainy</span>
                    </li>
                    <li class="margin15_bottom">
                        <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-brown"></i>
                      <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                    </span>
                        &nbsp; Events
                        <span class="inlinebar float-right">Team Out</span>
                    </li>
                    <li class="success_txt margin15_bottom">
                        <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-success"></i>
                      <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                    </span>
                        &nbsp; Notifications
                        <span class="inlinebar float-right">5</span>
                    </li>
                </ul>
            </div>
            <div class="well well-small dark right_progressbar_section">
                <h4 class="brown_txt">
                    <span class="fa-stack fa-sm">
                      <i class="fa fa-circle fa-stack-2x text-brown"></i>
                      <i class="fa fa-hand-o-down fa-stack-1x fa-inverse"></i>
                    </span>
                    Alerts
                </h4>
                <br/>
                <span>Sales Improvement</span>
                <span class="float-right">
                <small>20%</small>
            </span>

                <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span>Server Load</span>
                <span class="float-right">
                <small>80%</small>
            </span>
                <div class="progress">
                    <div class="progress-bar bg-mint" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span>Traffic Improvement</span>
                <span class="float-right">
                <small>55%</small>
            </span>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- # right side -->
</div>
<!-- /#wrap -->
<!-- global scripts-->
<!-- global scripts end-->




<script type="text/javascript" src="{{asset('vendors/raphael/js/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/d3/js/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/c3/js/c3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/toastr/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/switchery/js/switchery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/flotchart/js/jquery.flot.js')}}" ></script>



<script type="text/javascript" src="{{asset('vendors/flotchart/js/jquery.flot.resize.js')}}" ></script>

<script type="text/javascript" src="{{asset('vendors/flotchart/js/jquery.flot.stack.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/flotchart/js/jquery.flot.time.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/flotspline/js/jquery.flot.spline.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/flotchart/js/jquery.flot.categories.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/flotchart/js/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendors/jquery_newsTicker/js/newsTicker.js')}}"></script>

<script type="text/javascript" src="{{asset('vendors/countUp.js/js/countUp.min.js')}}"></script>
                                


<!--end of plugin scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/new_dashboard.js')}}"></script>


    
</body>
</html>
