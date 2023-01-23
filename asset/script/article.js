function viewArticle(title, content, image, createdOn) {
  console.log(title + "  " + content + "  " + image);
  document.getElementById("body").innerHTML=`
    <h1>${title}</h1>
    <h3 class="text-light">${createdOn}</h3>
    <img src="${icon}" height="200" width="130">
    <section>
        ${content}

    </section>
  
  
  
  `

  // Ouvrir Modal form
  $("#ModalViewArticle").modal("show");
}

function editArticle(id, title, content, category, icon) {
  document.getElementById("title").value = title;
  CKEDITOR.instances.content.setData(content);
  document.getElementById("category").value = category;
  document.getElementById(
    "hidden"
  ).innerHTML = `<input type="hidden" name="article_id" value="${id}">`;
  document.getElementById(
    "hidden_img"
  ).innerHTML = `<input type="hidden" name="img" value="${icon}">`;
  document.getElementById(
    "img"
  ).innerHTML = `<img src="${icon}" height="200" width="130">`;
  document.getElementById(
    "remove"
  ).innerHTML = `      <label for="exampleInputEmail1" class="form-label">image</label>
    <input type="text" class="form-control" id="icon" name="icon">`;
  // Ouvrir Modal form
  $("#ModalArticle").modal("show");
}

function deleteArticle(id) {
  if (confirm("Are you sure you want to Delete?")) {
    window.location.href = "../article/controller.php?article_id=" + id;
  }
}
