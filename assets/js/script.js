$(document).ready(() => {
	let url = window.location.href
	$('.nav-link').each((index, item) => {
		let active = item.getAttribute('href')
		if (url == active){
			item.closest('.nav-item').classList.add('active')
		}
	})
	if (url.split('/')[4] == 'kategori_buku' | url.split('/')[4] == 'buku'){
		$('.collapse').closest('.nav-item').addClass('active')
		$('.collapse').addClass('show')
	}
})
