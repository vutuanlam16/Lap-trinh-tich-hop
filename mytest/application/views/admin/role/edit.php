<?php $this->load->view('admin/role/header'); ?>

<div class="page-content">
    <div class="col-xs-12">
        <div class="tabbable">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-home bigger-120"></i>
                        Thông tin chung
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#role-content">
                        Chỉnh sửa quyền
                    </a>
                </li>
            </ul>
            <form class="form-horizontal" role="form" method="post">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">

                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-top"> Tên quyền </label>

                            <div class="col-sm-10">
                                <input type="text" id="form-field-1-1" name="name" value="<?php echo $aRole->name;?>" class="form-control" />

                                <div class="hr hr-16 hr-dotted"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Mô tả</label>

                            <div class="controls col-xs-12 col-sm-10">
                                <textarea class="form-control" id="form-field-8" name="description"><?php echo $aRole->description;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3">Trạng thái</label>

                            <div class="controls col-xs-12 col-sm-9">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>
                                            <input class="ace ace-switch" type="checkbox" name="status" <?php if($aRole->status==1): echo "checked"; endif; ?>>
                                            <span class="lbl"></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="role-content" class="tab-pane fade">
                        <div class="form-group">
                            <div class="row">
                             <label class="col-sm-2 control-label no-padding-top"> Phân quyền </label>
                             <div class="col-sm-10">
                                <?php if($aMenuList): ?>
                                   <?php foreach($aMenuList as $row): ?>
                                    <?php if($row['m']==1): ?><div class="row"><?php endif; ?>
                                    <div class="col-sm-4">
                                        <div class="control-group">
                                            <div class="checkbox">
                                                <label>
                                                    <!-- menu cha -->
                                                    <input name="menu_id[]" value="<?php echo $row['id']; ?>" type="checkbox" class="ace" <?php if($row['menu_checked']==1): echo "checked"; endif; ?>/>
                                                    <span class="lbl bolder blue"><strong><?php echo $row['name']; ?></strong></span>
                                                    <?php if($row['menu_action_array']): ?>
                                                        <?php foreach($row['menu_action_array'] as $aItemSetting): ?>
                                                            <div class="checkbox">
                                                                <label>
                                                                    |---&nbsp;<input type="checkbox" class="ace" name="actions[<?php echo $row['id']; ?>][]" value="<?php echo $aItemSetting['key_setting'] ?>" <?php if($aItemSetting['setting_checked']==1): echo "checked"; endif; ?>>
                                                                    <span class="lbl"><?php echo $aItemSetting['value'] ?></span>
                                                                </label>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </label>
                                            </div>

                                            <?php if($row['menu_list_sub']): ?>

                                             <?php foreach($row['menu_list_sub'] as $aItemMenuRoleAdd2): ?>

                                                <div class="checkbox">
                                                    <label>
                                                        <!-- menu con  -->
                                                        |---&nbsp;<input name="menu_id[]" value="<?php echo $aItemMenuRoleAdd2['id']; ?>" type="checkbox" class="ace" <?php if($aItemMenuRoleAdd2['menu_checked']==1): echo "checked"; endif; ?>>
                                                        <span class="lbl"><?php echo $aItemMenuRoleAdd2['name'] ?></span>
                                                        <?php if($aItemMenuRoleAdd2['menu_action_array']): ?>
                                                            <?php foreach(($aItemMenuRoleAdd2['menu_action_array']) as $aItemSetting): ?>
                                                                <div class="checkbox">
                                                                    <label>
                                                                        |---&nbsp;<input type="checkbox" class="ace" name="actions[<?php echo  $aItemMenuRoleAdd2['id']; ?>][]" value="<?php echo $aItemSetting['key_setting'] ?>" <?php if($aItemSetting['setting_checked']==1): echo "checked"; endif; ?>> 
                                                                        <span class="lbl"><?php echo $aItemSetting['value'] ?></span>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif ?>
                                    </div>
                                    
                                </div>
                                <?php if($row['d']==1): ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php else: ?>
                            Module này chưa tạo menu
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix ">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Lưu
                </button>
            </div>
        </div>
    </form>
</div>
</div>

</div><!-- /.col -->
</div><!-- /.page-content -->
