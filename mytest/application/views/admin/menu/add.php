<?php $this->load->view('admin/menu/header'); ?>
<div class="page-header">
    <h1 style="margin-left: 25.5%">
        Thêm mới
    </h1>
</div>
<div class="col-xs-12" style="margin-top:20px;">
    <div class="tabbable">
        <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tiêu đề <span class="red">*</span></b>

                        <div class="col-sm-9">
                            <input type="text" name="name" value="<?php echo set_value('name'); ?>" required/>
                            <div><?php echo form_error('name'); ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Menu cha</b>
                        <div class="col-sm-9">
                            <select name="parent_id" id="">
                               <option value="0">Danh mục cha</option>  
                               <?php foreach($parent as $row): ?>
                                <option value="<?php echo $row->id ;?>"><?php echo $row->name ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Đường dẫn </b>
                    <div class="col-sm-9">
                        <input type="text" id="form-input-readonly" name="link" value=""/>								
                    </div>
                </div>										
                <div class="form-group">
                    <b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Vị trí</b>
                    <div class="col-sm-9">
                        <input type="number" value="" name="ordering"/>
                    </div>
                </div>
                <div class="form-group">
                    <b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Icon</b>

                    <div class="col-sm-9">

                        <input type="text" value="" name="icon"/>
                    </div>
                </div>

                <div class="form-group">
                    <b class="col-sm-3 control-label no-padding-right" for="form-field-1">Chức năng chính</b>

                    <?php if($setting): ?>
                        <div class="col-sm-9">
                            <?php foreach($setting as $row): ?>
                                <span class="help-inline col-sm-3">
                                    <label class="middle">
                                        <input class="ace" type="checkbox" name="actions[]" value="<?php echo $row['key_setting'];?>" <?php if($row['setting_checked']): echo "checked"; endif; ?>/>
                                        <span class="lbl"><?php echo $row['value']; ?></span>
                                    </b>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="space-4"></div>



                <div class="form-group">
                    <b class="col-sm-3 control-label no-padding-right" for="form-field-1">Trạng thái</b>

                    <div class="controls col-xs-12 col-sm-9" style="margin-top: 5px;">
                        <div class="row">
                            <div class="col-sm-9">
                                <label>
                                    <input class="ace ace-switch" type="checkbox" name="status" />
                                    <span class="lbl"></span>
                                </b>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 25.5%;">
                    <button class="btn btn-info btn-primary" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Thêm mới
                    </button>

                    <button type="button" onclick="location.href = '<?php echo admin_url('menu');?>'" class="btn btn-primary btn-inverse">
                        <i class="ace-icon fa fa-times"></i>
                        Hủy bỏ
                    </button>
                </div>
            </form>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
</div><!-- /.col -->
<div class="vspace-6-sm"></div>

