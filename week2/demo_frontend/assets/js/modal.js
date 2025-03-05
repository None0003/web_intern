document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".folder-row").forEach(row => {
        row.addEventListener("click", function () {
            let directionIcon = this.querySelector(".toggle-direction-icon");
            let folderIcon = this.querySelector(".toggle-folder-icon");
            let targetId = this.getAttribute("data-bs-target");
            let collapseElement  = document.querySelector(targetId);

            collapseElement.addEventListener("show.bs.collapse", function () {
                directionIcon.classList.remove("bi-caret-right-fill");
                directionIcon.classList.add("bi-caret-down-fill");
                folderIcon.classList.remove("bi-folder2");
                folderIcon.classList.add("bi-folder2-open");
            });

            collapseElement.addEventListener("hide.bs.collapse", function () {
                directionIcon.classList.remove("bi-caret-down-fill");
                directionIcon.classList.add("bi-caret-right-fill");
                folderIcon.classList.remove("bi-folder2-open");
                folderIcon.classList.add("bi-folder2");
            });
        });
    })
})