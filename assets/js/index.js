// Ambil elemen-elemen penting
const hamburger = document.getElementById('hamburgerBtn');
const menuOverlay = document.getElementById('menuOverlay');
const mainHeader = document.getElementById('mainHeader');

// Fungsi untuk menghitung posisi dan ukuran dropdown dinamis
function updateDropdownPosition() {
    if (!mainHeader || !menuOverlay) return;
    
    const headerRect = mainHeader.getBoundingClientRect();
    const headerHeight = headerRect.height;
    const headerWidth = headerRect.width;
    const headerTop = headerRect.top;
    const gap = window.innerWidth >= 640 ? 10 : 8;
    
    // Set posisi dropdown tepat di bawah header
    const topPosition = headerTop + headerHeight + gap;
    menuOverlay.style.top = `${topPosition}px`;
    
    // Set lebar dropdown sama dengan lebar header
    menuOverlay.style.width = `${headerWidth}px`;
}

// Toggle menu ketika hamburger diklik
hamburger.addEventListener('click', (e) => {
    e.stopPropagation();
    const isActive = hamburger.classList.toggle('active');
    menuOverlay.classList.toggle('active');
    
    // Update posisi setiap kali dibuka
    if (isActive) {
        updateDropdownPosition();
    }
});

// Tutup menu ketika link di klik
document.querySelectorAll('.menu-overlay .nav-list li a').forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        menuOverlay.classList.remove('active');
    });
});

// Tutup menu ketika klik di luar area header dan menu
document.addEventListener('click', (e) => {
    const isClickInsideHeader = mainHeader.contains(e.target);
    const isClickInsideMenu = menuOverlay.contains(e.target);
    
    if (!isClickInsideHeader && !isClickInsideMenu) {
        hamburger.classList.remove('active');
        menuOverlay.classList.remove('active');
    }
});

// Update posisi dropdown saat resize
let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        if (menuOverlay.classList.contains('active')) {
            updateDropdownPosition();
        }
    }, 100);
});

// Update posisi dropdown saat scroll
window.addEventListener('scroll', () => {
    if (menuOverlay.classList.contains('active')) {
        updateDropdownPosition();
    }
}, { passive: true });

// Set posisi awal saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    updateDropdownPosition();
});