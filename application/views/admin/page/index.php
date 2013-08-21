<div class="section-buttons">
	<button class="btn btn-primary" type="button" 
			onclick="show_modal('<?php echo site_url('admin/page/edit') ?>')">
		<span class="glyphicon glyphicon-plus"></span> Add a page
	</button>
	<button class="btn btn-default" type="button" 
			onclick="show_modal('<?php echo site_url('admin/page/order') ?>')">
		<span class="glyphicon glyphicon-list"></span> Order page
	</button>
	<button type="button" id="delete-rows" class="btn btn-danger disabled" 
			onclick="delete_selected(oTable, '<?php echo site_url('admin/page/delete_selected') ?>', true)">
		<span class="glyphicon glyphicon-trash"></span>
	</button>
</div>
<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit">Edit</th>
			<th class="edit">Permissions</th>
			<th>Name</th>
			<th>URI</th>
			<th>Type</th>
			<th>Parent</th>
			<th class="state">Active</th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($pages)): ?>
		<?php foreach ($pages as $page): ?>
		<tr>
			<td><?php echo $page->id_page ?></td>
			<td class="edit">
				<?php echo btn_panel('admin/page/edit/' . $page->id_page, 'glyphicon-edit', 'load_sections') ?>
			</td>
			<td class="edit">
				<?php echo btn_panel('admin/page/permissions/' . $page->id_page, 'glyphicon-lock') ?>
			</td>
			<td><?php echo $page->title; ?></td>
			<td><?php echo $page->slug; ?></td>
			<td>
				<span class="label label-<?php echo $page->module == '' ? 'primary' : ( $page->section == '' ? 'success' : 'info'); ?>">
					<?php echo $page->module == '' ? 'Module' : ( $page->section == '' ? 'Section' : 'Subsection'); ?>
				</span>
			</td>
			<td>
				<?php echo $page->module == '' ? '' : ( $page->section == '' ? $page->module : $page->section); ?>
			</td>
			<td class="edit"><?php echo button_on_off($page->state, 'admin/page/set_on_off/'. $page->id_page) ?></td>
		</tr>
		<?php endforeach ?>
	<?php endif ?>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 2, 7 ] }
			],
		});
	});	

	function page_type (input) {
		$('#container-module')[input.value == 'section' || input.value == 'subsection' ? 'show' : 'hide']();
		$('#container-section')[input.value == 'subsection' ? 'show' : 'hide']();
	}

	function get_sections (input, value) {
		$.post(_base_url + 'admin/page/get_sections', {idModule : input.value}, function (response) {
			var select = $('#container-section select');
			select.empty();
			for (var i = 0; i < response.length; i++) {
				select.append(new Option(response[i].text, response[i].value));
			};
			if (value) {
				select.val(value);
			}			
		}, 'json');
	}

	function load_sections () {
		$('#container-module select').change();
	}
</script>