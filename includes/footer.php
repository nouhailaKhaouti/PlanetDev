<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BEGIN parsley js -->
    <script src="../asset/script/parsley.js"></script>
    <!-- END parsley js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };

        CKEDITOR.replace('content[]');
    </script>
    <script src="../asset/script/dynamique.js"></script>
    <script src="../asset/script/article.js"></script>
    <script src="../asset/script/category.js"></script>
    <script src="../asset/script/user.js"></script>


</body>

</html>