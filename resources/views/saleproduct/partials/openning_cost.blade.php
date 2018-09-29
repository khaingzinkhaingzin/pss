<style>
	a.mybtn:visited {
		background-color: red;
	}
</style>

@if(\Auth::user()->is_admin == 1)
	<a href="{{ url('add_openning_cost/' . $model['model'] . '/' . $model['color']) }}" class="btn btn-success mybtn">
	openning_cost
	</a>
@endif

<script>
	$(document).ready(function() {
		$.ajax({
			url: "btn/show",
			type: "GET",
			dataType: "json",
			success: function(data) {
				if(data > 03) {
					$(".mybtn").attr("disabled", "disabled");
				}
			}
		});
	});
</script>