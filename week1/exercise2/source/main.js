let avatar = document.getElementById("avatar");
let imageUpload = document.getElementById("imageUpload");
let nameElement = document.getElementById("name");
let descriptionElement = document.getElementById("description");
let saveBtn = document.getElementById("save-btn");
let hobbyList = document.getElementById("hobby-list");


document.addEventListener("DOMContentLoaded", function() {
    let savedAvatar = localStorage.getItem("avatarImageUrl");
    if (savedAvatar) {
        avatar.src = savedAvatar;
    }

    let savedName = localStorage.getItem("userName");
    if (savedName) {
        nameElement.textContent = savedName;
    }

    let savedDescription = localStorage.getItem("userDescripton");
    if (savedDescription) {
        descriptionElement.innerHTML = savedDescription.replace(/\n/g, "<br>");
    }

    let savedFavours = JSON.parse(localStorage.getItem("favoursList"));
    if (savedFavours) {
        displayFavours(savedFavours)
    }
})

// Upload avatar
avatar.addEventListener("click", function() {
    imageUpload.click();
})

imageUpload.addEventListener("change", function(event) {
    let image = event.target.files[0];

    if (image) {
        let reader = new FileReader();

        reader.onload = function(e) {
            avatar.src = e.target.result;
            localStorage.setItem("avatarImageUrl", e.target.result);
        }

        reader.readAsDataURL(image);
    }
})

// Edit username
nameElement.addEventListener("click", function () {
    let currentName = nameElement.textContent;
    let inputField = document.createElement("input");
    inputField.type = "text";
    inputField.value = currentName;
    inputField.style.width = nameElement.offsetWidth + "px";

    nameElement.replaceWith(inputField);
    inputField.focus();

    function saveName() {
        let newName = inputField.value.trim() || "USERNAME";
        localStorage.setItem("userName", newName);

        nameElement.textContent = newName;
        inputField.replaceWith(nameElement);
    }

    inputField.addEventListener("blur", saveName);

    inputField.addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
            saveName();
        }
    });
})

// Edit description
descriptionElement.addEventListener("click", function () {
    let currentDescription = descriptionElement.textContent;
    let inputField = document.createElement("textarea");
    inputField.type = "text";
    inputField.value = currentDescription;
    inputField.style.width = descriptionElement.offsetWidth + "px";

    descriptionElement.replaceWith(inputField);
    inputField.focus();

    function saveDescription() {
        let newDescription = inputField.value.trim() || "...";
        localStorage.setItem("userDescripton", newDescription);

        descriptionElement.textContent = newDescription;
        inputField.replaceWith(descriptionElement);
    }

    inputField.addEventListener("blur", saveDescription);

    inputField.addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
            saveDescription();
        }
    });
})

// Load hobbies
function loadHobbies() {
    let hobbies = JSON.parse(localStorage.getItem("hobbies"));
    hobbyList.innerHTML = "";
    hobbies.forEach((hobby, index) => {
        const li = document.createElement("li");
        li.textContent = hobby;
        li.setAttribute("data-index", index);
        li.innerHTML = `<span class="hobby-text">${hobby}</span>`;
        hobbyList.appendChild(li);
    });
}

// Add hobbies
function addHobby() {
    let input = document.getElementById("new-hobby");
    let hobbies = JSON.parse(localStorage.getItem("hobbies"));
    if (input.value.trim()) {
        hobbies.push(input.value.trim());
        localStorage.setItem("hobbies", JSON.stringify(hobbies));
        input.value = "";
        loadHobbies();
    }
}

// Edit and delete hobbies v2
hobbyList.addEventListener("click", function(event) {
    let target = event.target.closest("li"); 
    if (!target) return;

    let hobbies = JSON.parse(localStorage.getItem("hobbies")) || [];
    let index = target.getAttribute("data-index");
    let oldHobby = hobbies[index];

    console.log(index);

    let input = document.createElement("input");
    input.type = "text";
    input.value = oldHobby;
    input.style.width = hobbyList.offsetWidth + "px";

    event.target.innerHTML = ""; 
    event.target.appendChild(input);
    input.focus();

    // Khi nhấn Enter, lưu nội dung mới
    input.addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            let newHobby = input.value.trim();
            if (newHobby) {
                hobbies[index] = newHobby;
                localStorage.setItem("hobbies", JSON.stringify(hobbies));
                loadHobbies();
            } else {
                hobbies.splice(index, 1);
                localStorage.setItem("hobbies", JSON.stringify(hobbies));
                loadHobbies();
            }
        }
    });

    // Nếu mất focus thì không thay đổi
    input.addEventListener("blur", function() {
        loadHobbies();
    });
})

loadHobbies();

