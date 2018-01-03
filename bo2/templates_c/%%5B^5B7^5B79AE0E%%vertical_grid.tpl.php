<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'edit/vertical_grid.tpl', 53, false),)), $this); ?>
<div class="modal-dialog <?php echo $this->_tpl_vars['modalSizeClass']; ?>
">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo $this->_tpl_vars['Grid']['Title']; ?>
</h4>
        </div>

        <div class="modal-body">
            <form class="js-pgui-edit-form form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo $this->_tpl_vars['Grid']['FormAction']; ?>
">
                <fieldset>
                    <input type="hidden" name="edit_operation" value="commit">
                    <input id="submit-action" name="submit1" type="hidden" value="save">

                    <?php $_from = $this->_tpl_vars['HiddenValues']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['HiddenValueName'] => $this->_tpl_vars['HiddenValue']):
?>
                        <input type="hidden" name="<?php echo $this->_tpl_vars['HiddenValueName']; ?>
" value="<?php echo $this->_tpl_vars['HiddenValue']; ?>
">
                    <?php endforeach; endif; unset($_from); ?>

                    <?php $_from = $this->_tpl_vars['Grid']['Columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Column']):
?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'forms/form-group.tpl', 'smarty_include_vars' => array('Column' => $this->_tpl_vars['Column'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'forms/form-required.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </fieldset>
            </form>

            <div class="error-container"></div>
        </div>

        <div class="modal-footer">
            <div class="btn-toolbar pull-right">

                <div class="btn-group">
                    <button class="btn btn-default cancel-button">
                        <?php echo $this->_tpl_vars['Captions']->GetMessageString('Cancel'); ?>

                    </button>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary submit-button">
                        <?php echo $this->_tpl_vars['Captions']->GetMessageString('Save'); ?>

                    </button>
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li data-value="save"><a href="#" id="save"><?php echo $this->_tpl_vars['Captions']->GetMessageString('SaveAndBackToList'); ?>
</a></li>
                        <li data-value="saveedit"><a href="#" id="saveedit"><?php echo $this->_tpl_vars['Captions']->GetMessageString('SaveAndEdit'); ?>
</a></li>
                        <?php if (count ( $this->_tpl_vars['Grid']['Details'] ) > 0): ?>
                            <li class="divider"></li>
                        <?php endif; ?>

                        <?php $_from = $this->_tpl_vars['Grid']['Details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['Detail']):
?>
                            <li><a class="save-and-open-details" href="#" data-action="<?php echo $this->_tpl_vars['Detail']['SeperatedPageLink']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['Detail']['Caption'])) ? $this->_run_mod_handler('string_format', true, $_tmp, $this->_tpl_vars['Captions']->GetMessageString('SaveAndOpenDetail')) : smarty_modifier_string_format($_tmp, $this->_tpl_vars['Captions']->GetMessageString('SaveAndOpenDetail'))); ?>
</a></li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            <?php echo '
                function EditForm_initd(editors) {
                    '; ?>
<?php echo $this->_tpl_vars['Grid']['OnLoadScript']; ?>
<?php echo '
                }
            '; ?>

        </script>

    </div>
</div>