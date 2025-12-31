/** @type {import('tailwindcss').Config} */
const fs = require("fs");
const path = require("path");

/* 🔹 Dynamic color extraction from Laravel config */
function extractColors() {
    const filePath = path.resolve("config/constants.php");
    if (!fs.existsSync(filePath)) return [];

    const content = fs.readFileSync(filePath, "utf8");
    const colorRegex = /'color'\s*=>\s*'([^']+)'/g;

    const colors = new Set();
    let match;
    while ((match = colorRegex.exec(content)) !== null) {
        colors.add(match[1]);
    }

    const levels = [
        "50",
        "100",
        "200",
        "300",
        "400",
        "500",
        "600",
        "700",
        "800",
        "900",
    ];
    const safelist = [];

    colors.forEach((color) => {
        levels.forEach((lvl) => {
            safelist.push(
                `bg-${color}-${lvl}`,
                `text-${color}-${lvl}`,
                `border-${color}-${lvl}`,
                `from-${color}-${lvl}`,
                `to-${color}-${lvl}`,
                `hover:bg-${color}-${lvl}`,
                `hover:text-${color}-${lvl}`,
                `hover:border-${color}-${lvl}`
            );
        });
    });

    return safelist;
}

module.exports = {
    darkMode: "class",

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.ts",
        "./node_modules/preline/dist/*.js",
    ],

    safelist: extractColors(),

    theme: {
        extend: {},
    },

    plugins: [require("preline/plugin")],
};
