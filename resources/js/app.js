import "preline";
import Highcharts from "highcharts";
document.addEventListener("DOMContentLoaded", () => {
    if (window.HSStaticMethods) {
        window.HSStaticMethods.autoInit();
    }

    window.Highcharts = Highcharts;
});
