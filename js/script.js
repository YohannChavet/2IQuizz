/* let cookie = document.cookie;
if (cookie.indexOf("theme=") == -1) {
    document.cookie = "theme=dark; path=/; domain=localhost";
    theme("dark");
} else {
    theme(cookie.indexOf("theme=")
}

function check_cookie_name(name)
{ */
var match = document.cookie.match(new RegExp('(^| )theme=([^;]+)'));
if (match) {
    theme(match[2]);
} else {
    document.cookie = "theme=dark; path=/; domain=localhost";
    theme("dark");
}

//just call a function to load your CSS
//this path should be relative your HTML location

function theme(color) {
    document.cookie = "theme=" + color + "; path=/; domain=localhost";

    /* loads the css stylesheet corresponding to the theme */
    let file = document.createElement("link");
    file.setAttribute("rel", "stylesheet");
    file.setAttribute("type", "text/css");
    file.setAttribute("href", "./css/" + color + ".css");
    document.head.appendChild(file);

    /*let theme = window.location.href.indexOf("&theme=");
    if (theme == -1) {
        window.location.href += "&theme=" + color;
    } else {
        window.location.href = window.location.href.substring(0, theme + 6) + color
    }*/
}

function view(page) {
    let theme = window.location.href.indexOf("&theme=");
    let view = window.location.href.indexOf("?view=");
    if (view == -1) {
        window.location.href += "?view=" + page;
    } else {
        if (theme == -1) {
            window.location.href = window.location.href.substring(0, view + 6) + page
        } else {
            window.location.href = window.location.href.substring(0, view + 6) + page + window.location.href.substring(theme, window.location.href.length)
        }
    }
}