
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>
    <div class="col-xs-8" style="margin-left: -25px;">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <strong style="font-size: 16px"><a href="<?php echo admin_url('home');?>">Trang chủ</a></strong>
            </li>
            <li class="active" style="font-size: 15px">Tài khoản</li>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Thành viên
        </ul><!-- /.breadcrumb -->
    </div>
    <div class="col-xs-4">
        <div style="float: right;">
          <button class="btn btn-sm btn-danger" >
            <a  href="<?php echo admin_url('user/add');?>" style="text-decoration: none;color: white;"  >
                <span class="glyphicon glyphicon-plus"></span> Thêm mới 
            </a>
        </button>
        <button class="btn btn-sm btn-danger">
            <a  href="<?php echo admin_url('user');?>" style="text-decoration: none;color: white;"  >
                <span class="glyphicon glyphicon-list-alt"></span> Danh sách
            </a>
        </button>

    </div>
</div>
</div>
<?php $this->load->view('admin/message', $message); ?>