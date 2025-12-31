import "./bootstrap";
import "preline";
import Highcharts from "highcharts";

window.Highcharts = Highcharts;

// Preline 2.0+ handles auto-init automatically when imported.
// Only use HSStaticMethods.autoInit() if you are using Livewire or AJAX.
document.addEventListener("DOMContentLoaded", () => {
    console.log("✅ Highcharts loaded:", typeof window.Highcharts);
});
