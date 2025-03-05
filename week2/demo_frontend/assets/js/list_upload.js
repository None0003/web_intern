document.addEventListener("DOMContentLoaded", function () {
    const uploadBox = document.getElementById("uploadBox");
    const uploadButton = document.getElementById("uploadButton");
    const imageUpload = document.getElementById("imageUpload");
    const fileListDisplay = document.getElementById("fileList");

    let selectedFiles = [];

    uploadButton.addEventListener("click", () => {
        imageUpload.click();
    });

    imageUpload.addEventListener("change", function () {
        addFiles(this.files);
    });

    uploadBox.addEventListener("dragover", (event) => {
        event.preventDefault();
        uploadBox.style.border = "2px dashed #007bff";
    });

    uploadBox.addEventListener("dragleave", () => {
        uploadBox.style.border = "2px dashed #ccc";
    });

    uploadBox.addEventListener("drop", (event) => {
        event.preventDefault();
        uploadBox.style.border = "2px dashed #ccc";
        addFiles(event.dataTransfer.files);
    });

    function addFiles(files) {
        for (let i = 0; i < files.length; i++) {
            selectedFiles.push(files[i]);
        }
        renderFileList();
    }

    // function renderFileList() {
    //     if (selectedFiles.length === 0) {
    //         fileListDisplay.innerHTML = "<p>Không có tệp nào được chọn.</p>";
    //         return;
    //     }

    //     let fileListHTML = "<ul class='list-group'>";
    //     selectedFiles.forEach((file, index) => {
    //         fileListHTML += `
    //             <li class="list-group-item d-flex justify-content-between align-items-center">
    //                 ${file.name} - ${Math.round(file.size / 1024)} KB
    //                 <button class="btn btn-danger btn-sm" onclick="removeFile(${index})">Xóa</button>
    //             </li>`;
    //     });
    //     fileListHTML += "</ul>";

    //     fileListDisplay.innerHTML = fileListHTML;
    // }

    // window.removeFile = function (index) {
    //     selectedFiles.splice(index, 1);
    //     renderFileList();
    // };
});