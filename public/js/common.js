function fetch_data2(url) {
	url = url ? url : indexUrl;
	const data = formId ? $(`#${formId}`).serialize() : {};

	$.ajax({
		type: "GET",
		url: url,
		data: data,
		dataType: 'json',
		success: function (data) {
			$('#listing').html(data.data);
		},
		error: function (xhr, status) {
			console.log(status, 'error');
		}
	});
}

$(document).ready(function () {

	//delete function for category and product
	$(document).on('click', '.button', function (e) {
		e.preventDefault();
		let url = $(this).data('url');
		swal({
			title: "Are you sure!",
			type: "error",
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes!",
			showCancelButton: true,
		},
			function () {
				$.ajax({
					type: "DELETE",
					url: url,
					data: { "_token": $('meta[name="csrf-token"]').attr('content') },
					dataType: 'json',
					success: function (data) {
						console.log(data);
						new Notification('Notification title', {
							icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
							body: data.message,
							message: data.message,

						});
						if (data) {
							location.reload();
						}
					},
					error: function () {
						alert('error');
					}

				});
			}
		);
	});




	//delete function end 



	// Ajax base Pagination
	$(document).on("click", ".pagination li a", function (e) {
		e.preventDefault();
		fetch_data2($(this).attr('href'));
	});

	//search code end
});








