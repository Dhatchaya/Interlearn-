const form = document.querySelector("#view-form");
    const input = document.querySelector("#reply");
    const enqBody = document.querySelector(".enq-body");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        form.style.display = 'none';
        const newEnq = document.createElement("div");
        newEnq.classList.add("init_enq");

        const enqViewTitlebar = document.createElement("span");
        enqViewTitlebar.classList.add("enq-view-titlebar");

        const subject = document.createElement("span");
        subject.textContent = "Subject: " + input.value;
        enqViewTitlebar.appendChild(subject);

        const status = document.createElement("span");
        status.textContent = "Status: Pending";
        enqViewTitlebar.appendChild(status);

        newEnq.appendChild(enqViewTitlebar);

        const viewContent = document.createElement("p");
        viewContent.classList.add("view_content");
        viewContent.textContent = input.value;
        newEnq.appendChild(viewContent);

        const viewDate = document.createElement("span");
        viewDate.classList.add("view-date");
        viewDate.textContent = new Date().toString();
        newEnq.appendChild(viewDate);

        const viewReply = document.createElement("div");
        viewReply.classList.add("view-reply");
        viewReply.id = "enq-reply";
        const replyImg = document.createElement("img");
        replyImg.src = "<?=ROOT?>/assets/images/reply.png";
        replyImg.alt = "Reply";
        viewReply.appendChild(replyImg);
        newEnq.appendChild(viewReply);

        enqBody.appendChild(newEnq);

        input.value = "";
    });

