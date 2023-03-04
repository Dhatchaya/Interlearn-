




        // *******************************************************************************//



        const footer = document.querySelector(".footer")
        const sidebar = document.querySelector(".side-col")
        const container = document.querySelector(".sidebar-container")

        const footerApperOptions = {
            rootMargin: "0px 0px -100px 0px"
        };

        const observer = new IntersectionObserver
            (function (
                entries,
                observer
            ) {
                entries.forEach(entry => {
                    console.log(entry.target)
                    if (entry.isIntersecting) {
                        sidebar.classList.add("sidebar-short");
                        container.classList.add("segment-out");
                    }
                    else {
                        sidebar.classList.remove("sidebar-short");
                        container.classList.remove("segment-out");
                    }
                });
            },
                footerApperOptions);

        observer.observe(footer);


                //***********************footer support hright changer********************************//


  var div1 = document.getElementByClassName("student-payment");
  var div2 = document.getElementByClassName("footer-support");
  div2.style.height = div1.offsetHeight + "px";


