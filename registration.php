
<?php include 'header.php'; ?>

<div class="container">

  <div class="content">
        <div class="registration-form">
            <form action="">
            <p>Kasutajanimi: <input type="text" name="userName" /></p>
            <p>Parool: <input type="password" name="passWord" /></p>
            <p>Email: <input type="text" name="email" /></p>
            <p>Telefon: <input type="text" name="phone" /></p>
            <!--
            <input type="button" value="Tühista" onClick="parent.location='index.html'">
            -->            
            </form>
            <button class="register">Registreeri</button>
            <a href="index.php"><button class="decline">Tühista</button></a>
                        

        </div>
    </div>
</div>
    
<?php include 'footer.php'; ?>
