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

function deleteComment(target) {
    let conf = confirm("Do you want to delete it?");
    if(conf) {
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                const cmt = JSON.parse(this.responseText);
                console.log(cmt);
                let listComment = "";
                for (let i = 0; i < cmt.length; i++) {
                    listComment += `<li class="list-group-item d-flex justify-content-between align-items-center">
                                        ${cmt[i].content}
                                        <span class="badge bg-primary rounded-pill">${cmt[i].email.split("@")[0]}</span>
                                        <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="idProduct" name="idProduct" value="${cmt[i].id_product}">
                                            <button type="button" value="${cmt[i].id_user}" onclick="deleteComment(this)" class="delete-comment btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </li>`;
                }
                commentArea.innerHTML = listComment;
            }
        }
        xhr.open("POST", "../deleteComment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(`delete=&idUser=${target.value}&id=${idProduct.value}`);
    }
}