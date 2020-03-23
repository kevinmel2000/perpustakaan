$(document).ready(() => {
	let method  = 'add'
	let table = $('table').DataTable({
		ajax: read_url,
		columns: [
			{ data: 'kode' },
			{ data: 'judul' },
			{ data: 'peminjam' },
			{ data: 'jumlah' },
			{ data: 'tanggal_pinjam' },
			{ data: 'tanggal_kembali' },
			{ data: 'terlambat' },
			{ data: 'status' }
		],
		columnDefs: [
			{
				render: (data, type, row,) => row.status === 'dipinjam' ? `${data} hari` : '0 hari',
				targets: 6
			},
			{
				render: data => {
					if (data == 'dipinjam') {
						return `<small class="bg-primary text-white py-1 px-2 rounded-sm shadow">Dipinjam</small>`
					} else {
						return `<small class="bg-success text-white py-1 px-2 rounded-sm shadow">Dikembalikan</small>`
					}
				},
				targets: 7
			}
		],
		order: [[ 7, 'desc' ]]
	})
	let validator = $('#form').validate({
		errorElement: 'span',
		errorClass: 'form-error',
		errorPlacement: (err, el) => {
			err.addClass('invalid-feedback')
			el.closest('.form-group').append(err)
		},
		submitHandler: () => method == 'add' ? add() : edit()
	})
	function reload() {
		table.ajax.reload()
	}
	function add() {
		$.ajax({
			url: add_url,
			type: 'post',
			dataType: 'json',
			data: $('#form').serialize(),
			success: res => {
				reload()
				$('.action').addClass('d-none')
				Swal.fire('Sukses', 'Sukses Menambahkan Data', 'success')
				$('.modal').modal('hide')
			},
			error: err => console.log(err)
		})
	}
	$('tbody').on('click', 'tr', function(){
		let total = table.data().count()
		let data = table.row($(this)).data()
		if (data.status === 'dipinjam') {
			if ($(this).hasClass('selected') | total === 0) {
				$('.action').addClass('d-none')
				$('#hapus').addClass('d-none')
				$(this).removeClass('selected')
			} else {
				$('.action').removeClass('d-none')
				$('#hapus').addClass('d-none')
				table.$('tr.selected').removeClass('selected')
				$(this).addClass('selected')
			}
		} else {
			if ($(this).hasClass('selected') | total === 0) {
				$('#hapus').addClass('d-none')
				$(this).removeClass('selected')
			} else {
				$('.action').addClass('d-none')
				$('#hapus').removeClass('d-none')
				table.$('tr.selected').removeClass('selected')
				$(this).addClass('selected')
			}
		}
	})
	$('#tambah').on('click', () => {
		method = 'add'
		$('.tambah').modal('show')
	})
	$('#kembalikan').on('click', () => {
		let data = table.row('.selected').data()
		$('[name=terlambat]').val(`${data.terlambat} hari`)
		$('[name=denda]').val(data.terlambat * denda)
		$('.kembalikan').modal('show')
	})
	$('.kembalikanBtn').on('click', () => {
		let data = table.row('.selected').data()
		$.ajax({
			url: `${kembalikan_url}/${data.id}`,
			type: 'post',
			dataType: 'json',
			data: {
				kode: data.id_buku,
				jumlah: data.jumlah
			},
			success: (res) => {
				reload()
				Swal.fire('Sukses', 'Sukses Mengembalikan Data', 'success')
				$('.kembalikan').modal('hide')
			},
			error: err => console.log(err)
		})
	})
	$('#perpanjang').on('click', () => {
		let [tanggal, bulan, tahun] = table.row('.selected').data().tanggal_kembali.split('-')
		$('[name=sampai]').attr('min', `${tahun}-${bulan}-${tanggal}`)
		$('[name=sampai]').val(`${tahun}-${bulan}-${tanggal}`)
		$('.perpanjang').modal('show')
	})
	$('[name=sampai]').on('change', () => {
		if ($('[name=sampai]').val() === '') {
			$('.perpanjangBtn').attr('disabled', 'disabled')
		} else {
			$('.perpanjangBtn').removeAttr('disabled')
		}
	})
	$('.perpanjangBtn').on('click', () => {
		let data = table.row('.selected').data()
		let tanggal = $('[name=sampai]').val()
		$.ajax({
			url: `${perpanjang_url}/${data.id}`,
			type: 'post',
			dataType: 'json',
			data: {
				tanggal: tanggal
			},
			success: () => {
				reload()
				Swal.fire('Sukses', 'Sukses Memperpanjang Data', 'success')
				$('.perpanjangBtn').attr('disabled', 'disabled')
				$('.perpanjang').modal('hide')
			},
			error: err => console.log(err)
		})
	})
	$('#hapus').on('click', () => {
		Swal.fire({
			title: 'Hapus',
			text: 'Hapus Data Ini',
			type: 'warning',
			showCancelButton: true
		}).then(res => {
			if (res.value) {
				let row = table.row('.selected')
				let id = row.data().id
				$.ajax({
					url: `${delete_url}/${id}`,
					type: 'get',
					dataType: 'json',
					success: () => {
						row.remove().draw()
						$('.action').addClass('d-none')
						Swal.fire('Sukses', 'Sukses Menghapus Data', 'success')
					},
					error: err => console.log(err)
				})
			}
		})
	})
	$('[name=kode]').select2({
		placeholder: 'Kode',
		ajax: {
			url: get_buku_url,
			type: 'get',
			dataType: 'json',
			data: params => ({
				kode: params.term
			}),
			processResults: data => ({
				results: data
			}),
			cache: true
		}
	})
	$('[name=kode]').on('select2:select', e => {
		let data = e.params.data
		$('[name=judul]').val(data.judul)
		$('[name=jumlah]').attr('max',data.jumlah)
		$('#sisa').html(`Sisa ${data.jumlah}`)
	})
	$('[name=peminjam]').select2({
		placeholder: 'Peminjam',
		ajax: {
			url: get_anggota_url,
			type: 'get',
			dataType: 'json',
			data: params => ({
				nama: params.term
			}),
			processResults: data => ({
				results: data
			}),
			cache: true
		}
	})
	$('.modal').on('hidden.bs.modal', () => {
		$('#form')[0].reset()
		validator.resetForm()
	})
	$('.tambah').on('show.bs.modal', () => {
		let date = new Date()
		tanggal = date.getDate() + 1
		bulan = date.getMonth() + 1 < 10 ? `0${date.getMonth() + 1}` : date.getMonth() + 1
		tahun = date.getFullYear()
		$('[name=tanggal_kembali]').attr('min', `${tahun}-${bulan}-${tanggal}`)
	})
})