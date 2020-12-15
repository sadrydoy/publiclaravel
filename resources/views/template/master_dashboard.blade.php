<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikasi SNMPTN & SBMPTN ITK</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core Css -->
    <link href="{{asset('template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('template/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('template/css/themes/all-themes.css')}}" rel="stylesheet" />
  <!-- JQuery DataTable Css -->
    <link href="{{asset('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('template/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">-->
    <!--@include('template/datatablecss')-->
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    @include('template/topbar')
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
                   <!-- User Info -->
                   <div class="user-info">
                       <div class="image">
                           <img src="{{asset('download.png')}}" width="48" height="48" alt="User" />
                       </div>
                       <div class="info-container">
                           <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('web')->user()->nama}}</div>
                           <div class="email">{{Auth::guard('web')->user()->role}}</div>

                       </div>
                   </div>
                   <!-- #User Info -->
                   <!-- Menu -->
                   <div class="menu">
                       <ul class="list">
                           <li class="header">MAIN NAVIGATION</li>
                           <li class="active">
                               <a href="{{url('/beranda')}}">
                                   <i class="material-icons">home</i>
                                   <span>Home</span>
                               </a>
                           </li>
                           @if(auth()->user()->role == 'superadmin')
                           <li>
                               <a href="{{url('/manajemen_akun')}}">
                                   <i class="material-icons">accessibility</i>
                                   <span>Manajemen User</span>
                               </a>
                           </li>
                           @endif
                           @if(auth()->user()->role == 'superadmin')
                           <li>
                               <a href="javascript:void(0);" class="menu-toggle">
                                   <i class="material-icons">data_usage</i>
                                   <span>Master Data</span>
                               </a>
                             <ul class="ml-menu">
                             <li>
                                 <a href="{{url('/jurusan')}}">
                                     <i class="material-icons">layers</i>
                                     <span>Data Jurusan ITK</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="{{url('/prodi')}}">
                                     <i class="material-icons">layers</i>
                                     <span>Data Prodi ITK</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="{{url('/daya_tampung')}}">
                                     <i class="material-icons">layers</i>
                                     <span>Daya Tampung SNMPTN</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="{{url('/kriteria_nilai')}}">
                                     <i class="material-icons">layers</i>
                                     <span>Kriteria Bobot SNMPTN</span>
                                 </a>
                             </li>
                             <li>
                               <a href="{{url('/tahun_akademik')}}">
                                   <i class="material-icons">layers</i>
                                   <span>Tahun Akademik</span>
                               </a>
                             </li>
                             </ul>
                           </li>

                            <li>
                              <a href="{{url('/datareset')}}">
                                  <i class="material-icons">layers</i>
                                  <span>Reset Data</span>
                                </a>
                            </li>
                              @endif
                        </ul>
                   </div>
                   <!-- #Menu -->
                   <!-- Footer -->
                   <div class="legal">
                       <div class="copyright">
                           &copy; 2020 <a href="javascript:void(0);">Tim Pengembang Aplikasi</a>.
                       </div>
                       <div class="version">
                           <b>Version: </b> 1.0.0
                       </div>
                   </div>
                   <!-- #Footer -->
               </aside>

        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        @yield('content')
    </section>

    <!-- jQuery -->
       <!--<script src="//code.jquery.com/jquery.js"></script>-->
       <!-- DataTables -->
      <!-- <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>-->
       <!-- Bootstrap JavaScript -->
       <!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
       <!-- App scripts -->
       @stack('scripts')
    <!-- Jquery Core Js -->
    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('template/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('template/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('template/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('template/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('template/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <!--<script src="{{asset('template/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>-->
    <!--<script src="{{asset('template/js/pages/ui/modals.js')}}"></script>-->
    <!-- Jquery CountTo Plugin Js -->
    <!--<script src="{{asset('template/plugins/jquery-countto/jquery.countTo.js')}}"></script>-->

    <!-- Custom Js -->
    <script src="{{asset('template/js/admin.js')}}"></script>
    <!--<script src="{{asset('template/js/pages/ui/modals.js')}}"></script>-->
    <script src="{{asset('template/js/demo.js')}}"></script>
    <script src="{{asset('template/js/pages/tables/jquery-datatable.js')}}"></script>
    @yield('jsscript')
    <!--@yield('jsscript')
    @include('template/datatablejs')-->
    <!--<script src="{{asset('template/jquery.dataTables.min.js')}}"></script>-->
    
</body>

</html>
