//buat variabel yang nilainya di ambil dari input
var keyword = document.getElementById('keywordPeminjaman');
var container = document.getElementById('peminjaman');

//tambahkan even ketika keyword di ketik
keyword.addEventListener('keyup', function(){
	
	//buat Object ajax
	var xhr = new XMLHttpRequest();
	//cek kesiapan ajax
	xhr.onreadystatechange = function() {
		if( xhr.readyState == 4 && xhr.status == 200 ){
			container.innerHTML = xhr.responseText;
		}
		
	}
	
	//eksekusi ajax
	xhr.open('GET', 'ajax/speminjaman.php?keyword=' + keyword.value, true);
	xhr.send();
	
});