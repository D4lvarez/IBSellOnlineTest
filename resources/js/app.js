const { default: axios } = require("axios");

require("./bootstrap");

async function onSubmit(event) {
    event.preventDefault();
    let username = event.target.form.username.value;
    let email = event.target.form.email.value;
    let phone = event.target.form.phone.value;
    let imageUser = event.target.form.imageUser.files[0];
    let allowedExtensions = /(.jpg|.jpeg)$/i;

    if (username === "" || email === "" || imageUser === "" || phone === "") {
        alert("Todos los campos deben ser llenados");
        return;
    }

    if (!allowedExtensions.exec(event.target.form.imageUser.value)) {
        alert("Please upload file having extensions .jpeg/.jpg/ only.");
        event.target.form.imageUser.value.value = "";
        return;
    }

    const data = new FormData();
    data.append("username", username);
    data.append("email", email);
    data.append("phone", phone);
    data.append("imageUser", imageUser);

    const response = await axios.post("/", data, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });

    console.log(response);
    username = "";
    email = "";
    imageUser = "";
}

async function refreshUsers() {
    const table = document.querySelector("#table-body");

    const data = await axios.get("/users");
    console.log(data.data);

    const users = data.data;

    if (users.length === 0) {
        return;
    }

    const newRow = table.insertRow();
    users.forEach((item) => {
        newRow.innerHTML = `<tr>
        <th scope="row">${item.id}</th>
        <td>${item.username}</td>
        <td>${item.email}</td>
    </tr>`;
    });
}

const button = document.querySelector(".btn");

button.addEventListener("click", async function () {
    onSubmit(event);
    setTimeout(await refreshUsers(), 500);
});
