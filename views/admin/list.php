<?php if ($is_datatables): ?>
    <?php echo $datatables->render(); ?>
<?php else:?>
    <?php Assets::datatables(); ?>
    <div class="help">
        <p><?php echo __('View, edit, and delete your site\'s materials.'); ?></p>
    </div>
    
    <?php include Kohana::find_file('views', 'errors/partial'); ?>
    
    <div class="content">
        <?php echo Form::open($action, array('id'=>'admin-material-form', 'class'=>'no-form')); ?>
            <fieldset class="bulk-actions form-actions rounded">
                <div class="row-fluid">
                    <div class="span8">
                        <div class="control-group <?php echo isset($errors['operation']) ? 'error': ''; ?>">
                            <?php echo Form::select('operation', Post::bulk_actions(TRUE, 'material'), '', array('class' => 'span6')); ?>
                            <?php echo Form::submit('material-bulk-actions', __('Apply'), array('class'=>'btn')); ?>
                        </div>
                    </div>
                    <div class="span4">
                        <?php echo HTML::anchor(Route::get('admin/material')->uri(array('action' => 'add')), '<i class="icon-plus icon-white"></i> '.__('New entry'), array('class'=>'btn btn-success pull-right')); ?>
                    </div>
                </div>
            </fieldset>
            <table id="admin-list-materials" class="table table-striped table-bordered table-highlight" data-toggle="datatable" data-target="<?php echo $url?>" data-sorting='[["4", "desc"]]'>
                <thead>
                    <tr>
                        <th width="5%" data-columns='{"bSortable":false, "bSearchable":false}'> # </th>
                        <th width="45%"><?php echo __('Title'); ?></th>
                        <th width="20%" data-columns='{"bSearchable":false}'><?php echo __('Author'); ?></th>
                        <th width="10%" data-columns='{"bSearchable":false, "sClass": "status"}'><?php echo __('Status'); ?></th>
                        <th width="12%" data-columns='{"bSearchable":false}'><?php echo 'Создано'; ?></th>
                        <!--<th width="12%" data-columns='{"bSearchable":false}'><?php echo __('Updated'); ?></th>-->
                        <th width="8%" data-columns='{"bSortable":false, "bSearchable":false}'></th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="dataTables_empty"><?php echo __("Loading data from server"); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php echo Form::close(); ?>
    </div>

<?php endif; ?>