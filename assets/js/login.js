$(document).ready(() => {
	$('form').validate({
		errorElement: 'span',
		errorClass: 'form-error',
		errorPlacement: (err, el) => {
			err.addClass('invalid-feedback')
			el.closest('.form-group').append(err)
		},
		submitHandler: () => {
			$.ajax({
				url: login_url,
				type: 'post',
				dataType: 'json',
				data: $('form').serialize(),
				success: (res) => {
					if (res === 'username') {
						$('.notif').html(`<div class="alert alert-danger">Username Salah</div>`)
					} else if (res === 'password') {
						$('.notif').html(`<div class="alert alert-danger">Password Salah</div>`)
					} else {
						$('.notif').html(`<div class="alert alert-success">Sukses Login</div>`)
						setTimeout(function () {
							window.location.reload()
						}, 100)
					}
				},
				error: err => {
					console.log(err)
				}
			})
		}
	})
})