let replaceDigits = function() {
let map = 
            [
            "&\#1632;","&\#1633;","&\#1634;","&\#1635;","&\#1636;",
            "&\#1637;","&\#1638;","&\#1639;","&\#1640;","&\#1641;"
            ]
let pEl = document.querySelectorAll('.blog-readingTime');

pEl.forEach((pa) => {
    pa.innerHTML = pa.innerHTML.replace(
        /\d(?=[^<>]*(<|$))/g,
        function($0) { return map[$0] }
    )
})
}
window.onload = replaceDigits