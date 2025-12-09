// assets/js/script.js

// 1. DATABASE SAMPAH LOKAL
const databaseSampah = {
    // Organik
    "kulit pisang": { kategori: "Organik", tips: "Dapat dijadikan kompos atau pakan ternak. Masukkan ke tempat sampah Hijau." },
    "sisa makanan": { kategori: "Organik", tips: "Hindari membuang sisa makanan yang berkuah agar tidak menimbulkan bau." },
    "daun kering": { kategori: "Organik", tips: "Sangat baik untuk bahan dasar kompos atau mulsa tanaman." },
    "ampas kopi": { kategori: "Organik", tips: "Keringkan ampas kopi sebelum dibuang atau gunakan untuk pupuk langsung." },
    "sayur busuk": { kategori: "Organik", tips: "Cepat membusuk, segera olah menjadi kompos." },

    // Anorganik
    "botol plastik": { kategori: "Anorganik", tips: "Cuci bersih, gepengkan, dan masukkan ke bank sampah. Masukkan ke tempat sampah Biru." },
    "kertas hvs": { kategori: "Anorganik", tips: "Pastikan kertas kering. Jangan masukkan kertas yang kotor atau berminyak." },
    "kaleng minuman": { kategori: "Anorganik", tips: "Bilas hingga bersih dari sisa minuman. Dapat dilebur kembali." },
    "bungkus kopi sachet": { kategori: "Anorganik", tips: "Cuci atau bilas sisa bubuk/cairan di dalamnya sebelum dibuang." },
    "kardus bekas": { kategori: "Anorganik", tips: "Lipat dan ikat kardus agar mudah diangkut." },
    "plastik kresek": { kategori: "Anorganik", tips: "Cuci dan keringkan. Beberapa bank sampah menerima, sebagian tidak." },

    // B3 (Bahan Berbahaya)
    "baterai bekas": { kategori: "B3 (Berbahaya)", tips: "Jangan dibuang ke tempat sampah biasa! Kumpulkan dan serahkan ke lokasi kumpul B3 setiap hari Sabtu." },
    "lampu neon": { kategori: "B3 (Berbahaya)", tips: "Mengandung merkuri. Buang di tempat khusus B3 agar tidak mencemari lingkungan." },
    "obat kadaluarsa": { kategori: "B3 (Berbahaya)", tips: "Serahkan ke apotek terdekat atau kumpulkan untuk diangkut pada jadwal khusus B3." },
    "oli bekas": { kategori: "B3 (Berbahaya)", tips: "JANGAN DIBUANG KE SALURAN AIR. Kumpulkan dalam wadah tertutup." },
    "termometer": { kategori: "B3 (Berbahaya)", tips: "Buang dengan sangat hati-hati karena mengandung bahan kimia." },
};

// 2. FUNGSI PENCARIAN UTAMA
const initializeSearch = () => {
    const searchInput = document.getElementById('search-sampah');
    const searchResultsBox = document.getElementById('search-results');

    if (!searchInput || !searchResultsBox) {
        return;
    }

    const updateResults = () => {
        const query = searchInput.value.toLowerCase().trim();
        searchResultsBox.innerHTML = ''; 

        if (query.length < 3) {
            searchResultsBox.innerHTML = '<p>Ketik minimal 3 huruf untuk mulai mencari...</p>';
            return;
        }

        let found = false;

        for (const item in databaseSampah) {
            if (item.includes(query)) {
                found = true;
                const data = databaseSampah[item];
                
                // Tentukan warna berdasarkan kategori
                let bgColor = '#fff';
                let textColor = '#333';
                if (data.kategori.includes('Organik')) {
                    bgColor = '#E8F5E9'; // Hijau Muda
                    textColor = '#4CAF50';
                } else if (data.kategori.includes('Anorganik')) {
                    bgColor = '#E3F2FD'; // Biru Muda
                    textColor = '#1E88E5';
                } else if (data.kategori.includes('B3')) {
                    bgColor = '#FFFDE7'; // Kuning Muda
                    textColor = '#FF5722'; // Oranye/Merah untuk B3
                }

                const resultItem = document.createElement('div');
                resultItem.classList.add('search-result-item');
                resultItem.style.backgroundColor = bgColor;
                
                resultItem.innerHTML = `
                    <h4>${item.toUpperCase()}</h4>
                    <p><strong>Kategori:</strong> <span style="color:${textColor};">${data.kategori}</span></p>
                    <p class="tip-detail"><strong>Tips Pemilahan:</strong> ${data.tips}</p>
                `;
                searchResultsBox.appendChild(resultItem);
            }
        }

        if (!found) {
            searchResultsBox.innerHTML = `<p>Tidak ditemukan hasil untuk "<strong>${query}</strong>". Coba kata kunci lain.</p>`;
        }
    };
    
    searchInput.addEventListener('input', updateResults);
    searchResultsBox.innerHTML = '<p>Ketik minimal 3 huruf untuk mulai mencari...</p>';
};


// 3. FUNGSI SCROLL TO TOP
const scrollFunction = () => {
    const mybutton = document.getElementById("scrollToTopBtn");
    if (!mybutton) return; 
    
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

const topFunction = () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' 
    });
}


// 4. FUNGSI MOBILE MENU TOGGLE
const initializeMobileMenu = () => {
    const mobileMenu = document.getElementById('mobile-menu');
    const mainNav = document.getElementById('main-nav');
    
    if (!mobileMenu || !mainNav) return;
    
    mobileMenu.addEventListener('click', () => {
        mainNav.classList.toggle('active');
        mobileMenu.classList.toggle('active');
    });
    
    // Close menu when clicking on a link
    const navLinks = mainNav.querySelectorAll('a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('active');
            mobileMenu.classList.remove('active');
        });
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileMenu.contains(e.target) && !mainNav.contains(e.target)) {
            mainNav.classList.remove('active');
            mobileMenu.classList.remove('active');
        }
    });
};


// INI ADALAH FUNGSI UTAMA YANG BERJALAN KETIKA HALAMAN SELESAI DIMUAT
document.addEventListener('DOMContentLoaded', () => {
    initializeSearch(); // Aktifkan fitur pencarian
    initializeMobileMenu(); // Aktifkan mobile menu

    const mybutton = document.getElementById("scrollToTopBtn");
    if (mybutton) {
        mybutton.addEventListener('click', topFunction); // Aktifkan tombol scroll
    }
});

// Event Listener untuk Scroll (harus di window)
window.onscroll = function() { scrollFunction() };