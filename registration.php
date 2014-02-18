
<?php include 'header.php'; ?>

<div class="container">

  <div class="content">
        <div class="registration-form">
            <form>
            Kasutajanimi: <input type="text" name="userName"><br>
            Parool: <input type="password" name="passWord"><br>
            Email: <input type="email" name="email"><br>
            Telefon: <input type="number" name="phone"><br>
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
