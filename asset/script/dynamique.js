$(document).ready(function () {
    $(".add_item_btn").click(function (e) {
      e.preventDefault();
      $("#show_item").prepend(
        `         <div class="d-flex flex-column pe-5 bg-light append_item">
        <div class="ps-5 pt-3" id="show_item">
            <label for="exampleInputEmail1" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title[]">
        </div>
        <div class="ps-5" id="remove">
            <label for="exampleInputEmail1" class="form-label">icon</label>
            <input type="file" class="form-control" id="icon" name="icon[]">
        </div>
        <div class="ps-5">
            <label for="exampleInputEmail1" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content[]"></textarea>
            <script>
                CKEDITOR.replace('content');
            </script>
        </div>
        <div class="ps-5">
            <label for="exampleInputEmail1" class="form-label">category</label>
            <select class="form-select form-select-sm cart shadow-sm" name="category[]" id="category">
            <option value="1">php</option>
            <option value="2">java</option>
            <option value="3">spring</option>
            </select>
        </div>
        <div class="ps-5 pb-3">
            <button class="btn btn-danger remove_item_btn">Remove</button>
        </div>
    </div>
  `
      );
    });
    $(document).on("click", ".remove_item_btn", function (e) {
      e.preventDefault();
      let row_item = $(this).parent().parent();
      $(row_item).remove();
    });
  });
  
  
  function filtrerType() {
  
      var filtre, table, cellule, i, text;
      filtre = document.getElementById("type").value;
      table = document.getElementsByName("table");
      console.log(table.length);
      for (i = 0; i < table.length; i++) {
      console.log(table[i]);
      cellule = table[i].getElementsByTagName("h2")[0];
        if (cellule) {
          
            text = cellule.innerText;
            console.log(text);
            console.log(filtre);
            console.log(text==filtre);
            if (text == filtre) {
              console.log("remove");
                table[i].classList.remove("d-none")
            } else {
              console.log("add");
                table[i].classList.add("d-none")
            }
        }
      }
      
      }
      
      function filtrer() {
        var filtre,ligne, cellule, i, text;
        filtre = document.getElementById("recherche").value.toUpperCase();
        ligne = document.getElementsByName("ligne");
        console.log(ligne.length)
        for (i = 0; i < ligne.length; i++) {
            cellule = ligne[i].querySelectorAll(".joke")[0];
            console.log(cellule)
            if (cellule) {
                text = cellule.innerText;
                if (text.toUpperCase().indexOf(filtre) > -1) {
                  console.log("remove")
                    ligne[i].classList.remove("d-none")
                } else {
                  console.log("add")
                    ligne[i].classList.add("d-none")
                }
            }
        }
      }
      
      function search() {
      
        var input_name = document.getElementById("search");
        if (input_name.classList.contains('d-none')) {
            console.log("hiii");
            input_name.classList.remove('d-none');
            console.log(input_name.style.display);
        } else {
            input_name.classList.add('d-none');
        }
      }