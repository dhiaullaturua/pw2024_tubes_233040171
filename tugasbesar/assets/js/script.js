// ambil elemen-elemen yang dibutuhkan
const keyword = document.querySelector('.keyword');
const tombolCari = document.querySelector('.tombol-cari');
const container = document.querySelector('.container');

// hilangkan tombol cari
tombolCari.style.display = 'none';


// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function() {


    // // buat object ajax
    // var  xhr = new XMLHttpRequest();


    //     // cek kesiapan ajax
    //     xhr.onreadystatechange = function() {
    //         if( xhr.readyState == 4 && xhr.status == 200) {
    //             container.innerHTML = xhr.responseText;
    //         }
    //     }

    //     // eksekusi ajax
    //     xhr.open('GET', 'assets/ajax/mahasiswa.php?keyword=' + keyword . value, true);
    //     xhr.send();
    
    // fetch()
    fetch('assets/ajax/mahasiswa.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (container.innerHTML = response));


});