<script type="text/javascript">

    document.getElementById("logout-user").addEventListener("click", () => {
        <?php 
            session_start();
            unset($_SESSION["user"]);
            header("Location: ../../pages/main/login");            
        ?>
    });

</script> 