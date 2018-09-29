<style>
	a.absent:visited {
		background-color: red;
	}
</style>

<a href="{{ 'absent/' . $model['id'] }}" class="btn btn-warning absent">absent</a>

<script>
	$(document).ready(function() {
		$.ajax({
			url: "btn/show",
			type: "GET",
			dataType: "json",
			success: function(data) {
                var tomorrow = data + 1;
				if(data == tomorrow) {
					$(".absent").css("background-color", "rgb(255, 126, 19)");
				}
			}
		});
	});
</script>