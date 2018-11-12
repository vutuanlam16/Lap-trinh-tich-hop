<?php $this->load->view('admin/role/header'); ?>			
<div class="col-xs-12">
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>Tên quyền</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <?php if($aRoleList): ?>
            <tbody>

               <?php foreach($aRoleList as $row): ?>
                <tr>
                    <td class="text-right">
                        <?php echo $row->id ?>
                    </td>

                    <td>
                        <?php echo $row->name ?>
                    </td>
                    <td> <?php echo $row->description ?></td>
                    <td>
                        <?php if($row->status==1): ?>
                            <span class="label label-sm label-success">Đang dùng</span>
                        <?php else: ?>
                            <span class="label label-sm label-warning">Đang tắt</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a class="green" href="<?php echo admin_url('role/edit/'.$row->id); ?>" title="Sửa">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>

                            <a class="red bootbox-confirm" href="<?php echo admin_url('role/delete/'.$row->id); ?>" title="Xoá">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                            </a>
                        </div>

                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                            <span class="blue">
                                                <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Xoá">
                                            <span class="red">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    <?php endif; ?>
</table>
</div>

