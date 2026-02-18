<footer>रमज़ान मुबारक 🌙</footer>

<nav class="bottom-nav glass">
        <div class="inner">
                <a href="./" class="nav-link <?php echo ($page === 'home') ? 'active' : ''; ?>"><span
                                class="nav-icon">🏠</span><span>टाइम टेबल</span></a>
                <a href="dua" class="nav-link <?php echo ($page === 'dua') ? 'active' : ''; ?>"><span
                                class="nav-icon">📖</span><span>दुआ</span></a>
                <a href="surah" class="nav-link <?php echo ($page === 'surah') ? 'active' : ''; ?>"><span
                                class="nav-icon">📕</span><span>सूरह</span></a>
                <a href="tasbih" class="nav-link <?php echo ($page === 'tasbih') ? 'active' : ''; ?>"><span
                                class="nav-icon">#</span><span>तस्बीह</span></a>
                <a href="about" class="nav-link <?php echo ($page === 'about') ? 'active' : ''; ?>"><span
                                class="nav-icon">ℹ️</span><span>हमारे बारे में</span></a>
        </div>
</nav>
<script>
        // Analytics Tracking (Non-blocking)
        (function () {
                const ENDPOINT = 'analytics.php';

                function sendEvent(type, data = {}) {
                        if (navigator.sendBeacon) {
                                const payload = JSON.stringify({ event: type, ...data });
                                navigator.sendBeacon(ENDPOINT, payload);
                        } else {
                                fetch(ENDPOINT, {
                                        method: 'POST',
                                        body: JSON.stringify({ event: type, ...data }),
                                        headers: { 'Content-Type': 'application/json' },
                                        keepalive: true
                                }).catch(() => { });
                        }
                }

                // Track Page View
                window.addEventListener('load', () => {
                        const pageName = window.location.pathname.split('/').pop() || 'index';
                        sendEvent('page_view', { page: pageName });
                });

                // Track App Install
                window.addEventListener('appinstalled', () => {
                        sendEvent('install');
                });
        })();
</script>