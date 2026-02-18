<?php
$page = 'tasbih';
$pageTitle = 'तस्बीह काउंटर | रमज़ान 2026';
include 'header.php';
?>

<main>
    <h3 class="section-title text-gradient">तस्बीह काउंटर</h3>
    <div class="tasbih-wrap glass-hero">
        <div id="tasbih-count" class="tasbih-count">0</div>
        <button class="tasbih-btn" id="tasbih-btn">+1</button><br>
        <button class="reset-btn" id="tasbih-reset">↺ रीसेट करें</button>
    </div>
</main>

<?php include 'footer.php'; ?>
<script src="data.js"></script>
<script>
    let tasbihCount = Number(localStorage.getItem("tasbih-count") || 0);
    const countEl = document.getElementById("tasbih-count");
    countEl.textContent = tasbihCount;

    document.getElementById("tasbih-btn").addEventListener("click", () => {
        tasbihCount++;
        countEl.textContent = tasbihCount;
        countEl.classList.add("pulse");
        setTimeout(() => countEl.classList.remove("pulse"), 200);
        localStorage.setItem("tasbih-count", tasbihCount);
    });

    document.getElementById("tasbih-reset").addEventListener("click", () => {
        tasbihCount = 0;
        countEl.textContent = 0;
        localStorage.setItem("tasbih-count", 0);
    });
</script>
<?php include 'sw_include.php'; ?>
</body>

</html>