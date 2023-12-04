<!-- Konten utama -->
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-semibold mb-4">Halaman Utama</h1>
    <p>Isi konten halaman Anda di sini...</p>
</div>
<!-- Animasi loading -->
<div class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden" id="overlay">
    <div class="spinner rounded-full border-t-4 border-gray-200 border-b-4 border-transparent h-16 w-16 animate-spin"></div>
</div>
<script>
// Fungsi untuk menampilkan overlay dan animasi loading
function showLoading() {
    document.getElementById('overlay').classList.remove('hidden');
}

// Fungsi untuk menyembunyikan overlay dan animasi loading
function hideLoading() {
    document.getElementById('overlay').classList.add('hidden');
}

// Contoh simulasi lama loading (Anda bisa ganti ini dengan pemanggilan ke backend)
function fetchData() {
    showLoading(); // Memunculkan animasi loading saat proses dimulai

    // Simulasi penundaan 3 detik untuk mendapatkan data dari backend
    setTimeout(function() {
        // Proses selesai, sembunyikan animasi loading
        hideLoading();
        // Tambahkan kode untuk menampilkan data di sini
    }, 3000); // Ganti angka 3000 dengan penundaan yang diinginkan (dalam milidetik)
}

// Panggil fungsi fetchData() saat halaman dimuat
window.onload = function() {
    fetchData();
};

</script>
