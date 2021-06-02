var match = document.cookie.match(new RegExp('(^| )theme=([^;]+)'));
if (match) {
    theme(match[2]);
} else {
    document.cookie = "theme=dark; path=/; domain=localhost";
    theme("dark");
}

function theme(color) {
    const sheets = [...document.getElementsByTagName('link')];
    /* removes all linked stylesheets */
    sheets.forEach(x => {
        const type = x.getAttribute('type');
        !!type && type.toLowerCase() === 'text/css'
        && x.parentNode.removeChild(x);
    });
    document.cookie = "theme=" + color + "; path=/; domain=localhost";

    /* loads the css stylesheet corresponding to the theme */
    let file = document.createElement("link");
    file.setAttribute("rel", "stylesheet");
    file.setAttribute("type", "text/css");
    file.setAttribute("href", "./css/" + color + ".css");
    document.head.appendChild(file);
}