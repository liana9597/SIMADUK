document.getElementById('fileInput').addEventListener('change', function(event) {
    //untuk menambahkan fungsi yang mau berjalan pas pengguna milih file lewat input. Input ini punya ID fileInput.
    const file = event.target.files[0];
    // Di sini, kita mengambil file pertama yang dipilih oleh pengguna. Jika pengguna memilih lebih dari satu file, kita hanya mengambil yang pertama.

    const reader = new FileReader();
    //Kita membuat objek baru bernama reader yang akan digunakan untuk membaca isi file yang dipilih.

    if (file) {
        reader.readAsDataURL(file);
    }
    //Jika ada file yang dipilih, kita mulai membaca file itu. readAsDataURL akan mengubah file gambar menjadi format yang bisa ditampilkan di web.

    reader.onload = function(e) {
        //Ketika proses membaca file selesai, fungsi ini akan berjalan. e adalah informasi tentang file yang telah dibaca.
        const uploadBox = document.getElementById('uploadBox');
        const uploadText = document.getElementById('uploadText');
        const teks1 = document.querySelector('.teks1'); // Menangkap elemen teks1
        const teks2 = document.querySelector('.teks2'); // Menangkap elemen teks2
        //uploadBox adalah kotak tempat kita akan menampilkan gambar.
        //uploadText adalah teks yang bertuliskan "file".
        //teks1 dan teks2 adalah teks yang bertuliskan "Upload your" dan "file".

        // Sembunyikan teks saat gambar diunggah
        teks1.style.display = 'none';
        teks2.style.display = 'none';

        // Atur gambar sebagai background pada kotak
        uploadBox.style.backgroundImage = `url(${e.target.result})`;
    };
});
