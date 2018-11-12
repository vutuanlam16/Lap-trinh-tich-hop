<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
      <div class="navbar-header pull-left">
        <a href="index.html" class="navbar-brand">
          <small>
            <i class="fa fa-leaf"></i>
            MyExam  
          </small>
        </a>

        <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
          <span class="sr-only">Toggle user menu</span>

          <img src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
        </button>


      </div>

      <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
        <ul class="nav ace-nav">
          <li class="light-blue dropdown-modal user-min">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="<?php echo public_url(); ?>admin/assets/avatars/user.jpg" alt="<?php echo $this->session->userdata('login')->username; ?>" />
              <span class="user-info">
                <small>Welcome,</small>
                <b><?php echo $this->session->userdata('login')->username; ?>!</b>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="#">
                  <i class="ace-icon fa fa-cog"></i>
                  Settings
                </a>
              </li>

              <li>
                <a href="profile.html">
                  <i class="ace-icon fa fa-user"></i>
                  Profile
                </a>
              </li>

              <li class="divider"></li>

              <li>
                <a href="#">
                  <i class="ace-icon fa fa-power-off"></i>
                  Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>

      <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li>
            <a href="dashboard.html" class="" >
              Dashboard
              &nbsp;
            </a>
          </li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              User
              &nbsp;
              <i class="ace-icon fa fa-angle-down bigger-110"></i>
            </a>
            <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
              <li>
                <a href="<?php echo user_url('user'); ?>">
                  <i class="ace-icon fa fa-eye bigger-110 blue"></i>
                  My account
                </a>
              </li>
              <li>
                <a href="user_notification2.html">
                  <i class="ace-icon fa fa-user bigger-110 blue"></i>
                  Notification
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Class
              &nbsp;
              <i class="ace-icon fa fa-angle-down bigger-110"></i>
            </a>
            <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
              <li>
                <a href="classes_list2.html">
                  <i class="ace-icon fa fa-eye bigger-110 blue"></i>
                  List
                </a>
              </li>
              <li>
                <a href="classes_detail_live2.html">
                  <i class="ace-icon fa fa-user bigger-110 blue"></i>
                  Live Class 
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Quiz
              &nbsp;
              <i class="ace-icon fa fa-angle-down bigger-110"></i>
            </a>
            <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
              <li>
                <a href="test_list2.html">
                  <i class="ace-icon fa fa-user bigger-110 blue"></i>
                  Quiz List
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Test Result
              &nbsp;
              <i class="ace-icon fa fa-angle-down bigger-110"></i>
            </a>
            <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
              <li>
                <a href="testResult_result2.html">
                  <i class="ace-icon fa fa-user bigger-110 blue"></i>
                  Result
                </a>
              </li>
            </ul>
          </li>
          
          
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Setting
              &nbsp;
              <i class="ace-icon fa fa-angle-down bigger-110"></i>
            </a>
            <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
              <li>
                <a href="#">
                  <i class="ace-icon fa fa-eye bigger-110 blue"></i>
                  Notification
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="ace-icon fa fa-user bigger-110 blue"></i>
                  User group
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="ace-icon fa fa-user bigger-110 blue"></i>
                  Level List
                </a>
              </li>
            </ul>
          </li>
        </ul>

      </nav>
    </div><!-- /.navbar-container -->
  </div>