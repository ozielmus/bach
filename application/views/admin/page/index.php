<div class="section-buttons">
	<button class="btn btn-primary" type="button" 
			onclick="showModal('<?php echo site_url('admin/page/edit') ?>')">
		<span class="glyphicon glyphicon-plus"></span> Add a page
	</button>
	<button class="btn btn-default" type="button" 
			onclick="showModal('<?php echo site_url('admin/page/order') ?>')">
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
			<th class="state">Active</th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($pages)): ?>
		<?php foreach ($pages as $page): ?>
		<tr>
			<td><?php echo $page->id_page ?></td>
			<td class="edit"><?php echo btn_edit('admin/page/edit/' . $page->id_page, 'load_sections') ?></td>
			<td class="edit"><?php echo btn_permissions('admin/page/permissions/' . $page->id_page) ?></td>
			<td><?php echo $page->title; ?></td>
			<td><?php echo $page->slug; ?></td>
			<td>
				<span class="label label-<?php echo $page->module == '' ? 'primary' : ( $page->section == '' ? 'warning' : 'info'); ?>">
					<?php echo $page->module == '' ? 'Module' : ( $page->section == '' ? 'Subsection' : 'Section'); ?>
				</span>
			</td>
			<td class="edit"><?php echo $page->module ? button_on_off($page->state, 'admin/page/set_on_off/'. $page->id_page) : '' ?></td>
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
				{"bSortable": false, "aTargets": [ 1, 2, 6 ] }
			],
		});
	});	

	function page_type (input) {
		$('#container-module')[input.value == 'section' || input.value == 'subsection' ? 'show' : 'hide']();
		$('#container-section')[input.value == 'subsection' ? 'show' : 'hide']();
	}

	function get_sections (input) {
		$.post(_base_url + 'admin/page/get_sections', {idModule : input.value}, function (response) {
			var select = $('#container-section select');
			select.empty();
			for (var i = 0; i < response.length; i++) {
				select.append(new Option(response[i].text, response[i].value));
			};				
		}, 'json');
	}

	function load_sections () {
		$('#container-module select').change();
	}
</script>