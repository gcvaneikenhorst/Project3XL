@extends('layouts.app')

@section('content')
<link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
<style>
	#vacancy-table tbody tr {
		cursor: pointer;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">&nbsp
					Vacatures voor {{$email}}
				</div>
				<div class="pane-body">
					<table id="vacancy-table" class="table">
						<thead>
						<tr>
							<th>Titel</th>
							<th>Datum</th>
						</tr>
						</thead>
						<tbody>
						@foreach ($vacancies as $vacency)
						<tr onclick="openVacancy(event)" data="{{json_encode($vacency)}}">
							<td>{{$vacency->title}}</td>
							<td>{{$vacency->date}}</td>
						</tr>
						@endforeach
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="vacancymodal">
	<table class="table">
		<tr>
			<td>Titel</td>
			<td><input type="text" class="form-control" name="title"></td>
		</tr>
		<tr>
			<td>Text</td>
			<td><textarea type="text" class="form-control" name="text"></textarea></td>
		</tr>
		<tr>
			<td>Categorie</td>
			<td>
				<select class="form-control" name="category_id">
					@foreach ($categories as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach
				</select>
			</td>
		</tr>
	</table>
</div>
@endsection


@section('script')
<script
	src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
	integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
	crossorigin="anonymous"></script>
<script>
	HTMLElement.prototype.setValue = function(val) {
		if (!this.nextSibling || !this.nextSibling.classList) {
			this.value = val;
			return;
		}

		if (!this.nextSibling.classList.contains('note-editor')) {
			this.value = val;
			return;
		}

		$(this).summernote('code', val);
	}


	let api_token = "{{$api_token}}";
	function openVacancy(event) {
		let target = event.target.parentNode;
		let data = JSON.parse(target.getAttribute('data'));
		data.date = data.date.replace(' ', 'T');
		$("#vacancymodal").dialog({
			width: 700,
			title: data.title,
			open: function () {
				for (let key in data) {
					let element = $(this).find(`[name=${key}]`)[0];
					if (element)
						element.setValue(data[key]);
				}
			},
			buttons: {
				"Delete": function() {
					if (!confirm("Weet u zeker dat u deze vacature wilt verwijderen?"))
						return;

					$.ajax({
						type:'DELETE',
						url: `/api/auth/administrator/deletevacancy/${data['id']}?api_token=${api_token}`,
						success: () => location.reload()
					})
				},
				"Save": function() {
					let output = {}
					$(this).find('[name]').each((i, node) => {
						if (!(node.parentNode instanceof HTMLTableCellElement))
							return;

						if (node.value != data[node.getAttribute('name')]) {
							output[node.getAttribute("name")] = $(node).val();
						}
					})
					if (Object.keys(output).length == 0)
						return;

					$.ajax({
						type: 'POST',
						url: `/api/auth/administrator/updatevacancy/${data['id']}?api_token=${api_token}`,
						contentType: "application/json",
						dataType: 'json',
						data: JSON.stringify(output),
						success: () => location.reload()
					});
				},
			}
		})
	}
</script>
@endsection
