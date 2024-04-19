    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
    <?php if(isset($data['cssMDB'])) : ?>
        <script src="<?= BASEURL; ?>/js/mdb.umd.min.js"></script>
        <script>// Initialization for ES Users
            import { Collapse, initMDB } from "mdb-ui-kit";
            initMDB({ Collapse });
        </script>
    <?php endif; ?>

    <footer class="footer mt-auto py-3 mt-4 bg-info-subtle mb-0">
        <div class="container ">
            <p class="text-center text-body-secondary mb-0">© 2024 Kelompok 2 PPLBO</p>
        </div>    
    </footer>
</body>
</html>
