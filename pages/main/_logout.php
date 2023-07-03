<script type="text/javascript">

    document.getElementById("logout-admin").addEventListener("click", () => {
        <?php 
            session_start();
            unset($_SESSION["admin"]);
            header("Location: ../../pages/main/login");            
        ?>
    });

</script> 