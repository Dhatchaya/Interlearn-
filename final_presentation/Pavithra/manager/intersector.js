const footer = document.querySelectorAll(".footer")
const sidebar = document.querySelectorAll(".side-col")
const segment = document.querySelectorAll(".side-col .segment")

const footerApperOptions = {
    rootMargin: "0vh 0vw 5vh 0vw"
};
const observer = new IntersectionObserver
(function(
    entries,
    observe
) {
    entries.forEach(entry => {
        if (!entry.isIntersecting){
            sidebar.classList.add(".sidebar-short");
            segment.classList.add(".segment-out");
        }
        else{
            sidebar.classList.remove(".sidebar-short");
            segment.classList.remove(".segment-out");
        }
    });
},
footerApperOptions);

observer.observe(footer)