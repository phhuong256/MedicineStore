const comment = document.querySelector(".comment-field");
const idProduct = document.querySelector("#idProduct");
const commentArea = document.querySelector(".comment-area-product");

function typeComment() {
    if(comment.value.trim() === "") {
        alert("Please fill out the fields!");
        return;
    }
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            const cmt = JSON.parse(this.responseText);
            let listComment = "";
            for (let i = 0; i < cmt.length; i++) {
                listComment += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                    ${cmt[i].content}
                                    <span class="badge bg-primary rounded-pill">${cmt[i].email.split("@")[0]}</span>
                                </li>`;
            }
            commentArea.innerHTML = listComment;
        }
    }
    xhr.open("POST", "../comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`comments=&content=${comment.value.trim()}&id=${idProduct.value}`);
}