<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <img src="<?php echo site_url('img/close2.png') ?>">
    </button>
    <h3><?php echo empty($page['IdPage']) ? 'Add a new page' : 'Edit page ' .$page['Title'] ?></h3>
</div>
<form onsubmit="return validate(this, '<?php echo site_url('admin/page/edit'. (isset($page['IdPage'])?'/'.$page['IdPage']:'')) ?>')">
	<div class="modal-body">
		<div>
	    	<label for="">Module</label> 
			<?php echo form_dropdown('IdParent', $pages_no_parents, set_value('IdParent', $page['IdParent'])); ?>
			<?php echo form_error('IdParent'); ?>
		</div>
	    <div>
	    	<label for="">Name <strong>*</strong></label> 
			<?php echo form_input('Title', set_value('Title', $page['Title'])); ?>
			<?php echo form_error('Title'); ?>
		</div>
		<div>
			<label for="">URI <strong>*</strong></label>
			<?php echo form_input('Slug', set_value('Slug', $page['Slug'])); ?>
			<?php echo form_error('Slug'); ?>
		</div>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	    <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
	</div>
</form>