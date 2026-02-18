<script>
    if ("serviceWorker" in navigator) {
        window.addEventListener("load", () => {
            navigator.serviceWorker.register("sw.js", { scope: "./" }).then(reg => {
                console.log("SW registered from root: ", reg);
                reg.addEventListener("updatefound", () => {
                    const newWorker = reg.installing;
                    newWorker.addEventListener("statechange", () => {
                        if (newWorker.state === "installed" && navigator.serviceWorker.controller) {
                            console.log("New update available!");
                            // Optionally notify user here to reload
                        }
                    });
                });
            }).catch(err => {
                console.log("SW registration failed: ", err);
                alert("PWA Registration Failed: " + err); // Temporary alert for debugging on mobile
            });
        });
    }
</script>