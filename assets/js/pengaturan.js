$(document).ready(() => {
	let validator = $('#form').validate({
		errorElement: 'span',
		errorClass: 'form-error',
		errorPlacement: (err, el) => {
			err.addClass('invalid-feedback')
			el.closest('.form-group').append(err)
		},
		submitHandler: () => {
			$.ajax({
				url: simpan_url,
				type: 'post',
				dataType: 'json',
				data: $('#form').serialize(),
				success: res => {
					Swal.fire('Sukses', 'Sukses Menambahkan Data', 'success')
				},
				error: err => console.log(err)
			})
		}
	})
})