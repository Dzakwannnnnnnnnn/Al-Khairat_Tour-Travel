<div id="globalConfirmModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 backdrop-blur-sm opacity-0 transition-opacity duration-300">
    <div class="bg-surface border border-slate-100 rounded-[2rem] shadow-2xl p-6 md:p-8 max-w-sm w-full mx-4 transform scale-95 transition-transform duration-300 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center text-red-500 mb-4 shadow-inner" id="globalConfirmIcon">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-charcoal mb-2" id="globalConfirmTitle">Konfirmasi Hapus</h3>
        <p class="text-sm text-slate-500 mb-6" id="globalConfirmMessage">Apakah Anda yakin ingin menghapus data ini? Aksi ini tidak dapat dibatalkan.</p>
        <div class="flex w-full gap-3">
            <button type="button" onclick="closeGlobalConfirm()" class="flex-1 px-4 py-3 rounded-xl border border-slate-200 text-slate-600 font-bold hover:bg-slate-50 transition-all active:scale-95">Batal</button>
            <button type="button" id="globalConfirmOk" class="flex-1 px-4 py-3 rounded-xl bg-red-500 text-white font-bold shadow-lg shadow-red-500/30 hover:bg-red-600 transition-all active:scale-95">Ya, Hapus!</button>
        </div>
    </div>
</div>

<script>
    let currentConfirmCallback = null;

    window.showGlobalConfirm = function(message, callback) {
        const modal = document.getElementById('globalConfirmModal');
        const modalInner = modal.querySelector('div');
        const msgEl = document.getElementById('globalConfirmMessage');
        const okBtn = document.getElementById('globalConfirmOk');

        if (message) msgEl.innerText = message;
        currentConfirmCallback = callback;

        // Reset state & Remove hidden
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        // Trigger animations
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalInner.classList.remove('scale-95');
            modalInner.classList.add('scale-100');
        }, 10);

        // Map Ok Button
        okBtn.onclick = function() {
            closeGlobalConfirm();
            if (currentConfirmCallback) {
                currentConfirmCallback();
            }
        };
    };

    window.closeGlobalConfirm = function() {
        const modal = document.getElementById('globalConfirmModal');
        const modalInner = modal.querySelector('div');

        // Reverse animations
        modal.classList.add('opacity-0');
        modalInner.classList.remove('scale-100');
        modalInner.classList.add('scale-95');

        // Add hidden after animation ends
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            currentConfirmCallback = null;
        }, 300);
    };
</script>
