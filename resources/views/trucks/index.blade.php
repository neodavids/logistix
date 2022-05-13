@extends('layouts.dash')

@section('content')
<div class="clearfix"></div><!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic"><img src="{{ asset('dashboard/main/images/img.jpg') }}" alt="..." class="img-circle profile_img"></div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{ Auth::user()->name }}</h2>
            </div>
          </div><!-- /menu profile quick info -->
          <br>
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Business</h3>
              <ul class="nav side-menu">
                <li>
                  <a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="{{ route('customer') }}">Dashboard</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a><i class="fa fa-truck"></i> My Trucks <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="{{ route('truck-index') }}">My Trucks </a>
                    </li>
                    <li>
                      <a href="{{ route('truck-create') }}">Register a New Truck</a>
                    </li>
                  </ul>
                </li>

                </ul>
            </div>
          </div><!-- /sidebar menu -->
        </div>
      </div><!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><img src="{{ asset('dashboard/main/images/img.jpg') }}" alt="">{{ Auth::user()->name }}<span class="fa fa-angle-down"></span></a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div><!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count">
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> All Trucks</span>
            <div class="count">
              30
            </div><span class="count_bottom"><i class="green">4%</i> From last Week</span>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> All Requests</span>
            <div class="count">
              12
            </div><span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3%</i> From last Week</span>
          </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>{{ Auth::user()->name }}'s Jobs</span>
            <div class="count">
              4
            </div><span>Requests Served</span>
          </div>
        </div>

          <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                @include('partials.alerts.success')
                <div class="x_panel">
                  <div class="x_content">
                  <div class="x_title">
                    <h2>My Trucks</h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                    <p></p>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Model</th>
                            <th class="column-title">License Registration no</th>
                            <th class="column-title">Truck Class</th>
                            <th class="column-title">Current Location</th>
                            <th class="column-title">Action</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          @forelse (Auth::user()->trucks as $truck) 

                          <tr class="odd pointer">
                            <td class=" ">{{ $truck->model }}</td>
                            <td class=" ">{{ $truck->registration_no }}</td>
                            <td class=" ">{{ $truck->truck_class}}</td>
                            <td class=" ">{{ $truck->current_location }}</td>
                            <td class=" "><a href="{{ route('truck-edit', ['id' => $truck->id]) }}">
                            <i class="fa fa-truck"></i>Edit</a>
                            <a href="{{ route('truck-destroy', ['id' => $truck->id]) }}">
                            <i class="fa fa-remove"></i>Delete</a></td>

                          </tr>

                          @empty
                           
                                <p>You have not added any Trucks</p>


                          @endforelse
                        </tbody> 
                      </table>
                    </div>

                   </div>
                </div>
              </div>


          <!-- start of weather widget -->

          <!-- end of weather widget -->
        </div>

      </div>



    </div><!-- /page content -->
    <!-- footer content -->
    <footer>
      <div class="pull-right">
        <a href="https://logistix.ng">&copy;2019 Logistix. All rights reserved.  </a>
      </div>
      <div class="clearfix"></div>
    </footer><!-- /footer content -->
@endsection