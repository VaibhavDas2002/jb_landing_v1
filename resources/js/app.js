import "./bootstrap";
import Highcharts from "highcharts";
window.Highcharts = Highcharts;

// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", () => {
    console.log("✅ Highcharts loaded:", typeof window.Highcharts);

    // Manually initialize Preline for the initial page load
    if (window.HSStaticMethods) {
        window.HSStaticMethods.autoInit();
    }
});
