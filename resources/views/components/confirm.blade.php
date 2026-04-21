<div id="qb-confirm" class="qb-confirm-overlay" style="display:none">
    <div class="qb-confirm__box">
        <div class="qb-confirm__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
        </div>
        <h3 class="qb-confirm__title" id="qb-confirm-title">Bạn chắc chắn?</h3>
        <p class="qb-confirm__desc" id="qb-confirm-desc">Hành động này không thể hoàn tác.</p>
        <div class="qb-confirm__actions">
            <button class="qb-btn qb-btn--outline" onclick="qbConfirmCancel()">Hủy</button>
            <button class="qb-btn qb-btn--danger" id="qb-confirm-ok">Xác nhận</button>
        </div>
    </div>
</div>

<script>
    let _qbConfirmCallback = null;

    function qbConfirm({ title, desc, onConfirm }) {
        document.getElementById('qb-confirm-title').textContent = title || 'Bạn chắc chắn?';
        document.getElementById('qb-confirm-desc').textContent  = desc  || 'Hành động này không thể hoàn tác.';
        document.getElementById('qb-confirm').style.display     = 'flex';
        _qbConfirmCallback = onConfirm;
    }

    function qbConfirmCancel() {
        document.getElementById('qb-confirm').style.display = 'none';
        _qbConfirmCallback = null;
    }

    document.getElementById('qb-confirm-ok').addEventListener('click', () => {
        document.getElementById('qb-confirm').style.display = 'none';
        if (_qbConfirmCallback) _qbConfirmCallback();
    });

    // Click nền để đóng
    document.getElementById('qb-confirm').addEventListener('click', function(e) {
        if (e.target === this) qbConfirmCancel();
    });
</script>