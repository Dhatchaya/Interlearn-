const footer = document.querySelector(".footer")
const sidebar = document.querySelector(".side-col")
const segment = document.querySelector(".side-col .segment")

const footerApperOptions = {
    rootMargin: "0px 0px 200px 0px"
};

const observer = new IntersectionObserver
(function(
    entries,
    observer
) {
    entries.forEach(entry => {
        console.log(entry.target)
        if (entry.isIntersecting){
            sidebar.classList.add("sidebar-short");
            segment.classList.add("segment-out");
        }
        else{
            sidebar.classList.remove("sidebar-short");
            segment.classList.remove("segment-out");
        }
    });
},
footerApperOptions);

observer.observe(footer);