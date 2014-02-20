
<?php include 'header.php'; ?>

<div class="container">

    <div class="content">
        <div class="side-nav">
  
            <button class="add-car">Lisa auto</button>
            <button class="change-car">Muuda oma autosid</button>                        
            <button class="car">Auto 1</button>
            <button class="car">Auto 2</button>
            <button class="car">Auto 3</button>
            <button class="my-querys">Vaata minule tehtud päringuid</button>
            <button class="change-settings">Muuda oma kasutaja seadeid</button>
            <a href="index.php">Logi välja</a>
            </div>
        <div class="content-small l-car">
            <h1>Siin saad sa oma auto kohta muuta ja lisada infot ja pilte</h1>
            <h3>Sisesta andmed tabelisse</h3>
            <div class="data-input-table">
            <table>
                <tr><td>Värvus</td><td class="insert"><input type="text" /></td></tr>
                <tr><td>Värvus</td><td class="insert"><input type="text" /></td></tr>
                <tr><td>Värvus</td><td class="insert"><input type="text" /></td></tr>
                <tr><td>Värvus</td><td class="insert"><input type="text" /></td></tr>
                <tr><td>Värvus</td><td class="insert"><input type="text" /></td></tr>
                <tr><td>Värvus</td><td class="insert"><input type="text" /></td></tr>
            </table>
            </div>
            <h3>Sisesta vabatekst</h3>
            <div class="data-input-content">
            <p>
                Riigikogu juhatuse valimised kuu aja pärast on üheks põhjuseks, miks Reformierakonnal on läinud peaministrivahetusega kiireks. Kui pärast Andrus Ansipi lahkumist teeb Reformierakond koalitsiooni mõne teise erakonnaga peale IRLi, siis jääb Ene Ergma tõenäoliselt riigikogu esimehe kohast ilma ning sellele kohale valitakse Reformierakonna uue sõbra välja pakutud poliitik.
                </p><p>
                Euroopa Komisjoni volinik Siim Kallas teatas eelmisel nädalal, et on valmis hakkama Eesti peaministriks, oma järeltulijaks Euroopa Komisjonis pidas ta Ansipit. Kuna peaministri vahetumisel astub tagasi kogu valitsus, on õhus ka võimalus, et Reformierakond teeb koalitsiooni kellegi teisega peale IRLi.
            </p>
            </div>

            <h3>Lisa pildid</h3>
            <p>Vali üleslaadimise kaust <input type="text" /></p>
            <button >Salvesta</button>
            <button class="l-reset">Hülga muudatused</button>
        </div>
        <div class="content-small l-seaded">
            <h1>Siin saad sa oma seadeid muuta</h1>
                <p>Email<input type="text" /></p>
                <p>Telefon<input type="text"/></p>
                <p>Parool<input type="text" /></p>
                <button>Salvesta muudatused</button>
                <button>Tühista</button>
        </div>
        <div class="content-small l-querys">
            <h1>Siin on sinule tulnud päringud</h1> <br/>
                <table class="l-query-table">
                <tr>
                    <th>Id</th>
                    <th>Auto</th>
                    <th>Nimi</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Lisainfo</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Opel</td>
                    <td>Janar</td>
                    <td>j@n.com</td>
                    <td>5252525</td>
                    <td>mock</td>
                </tr>
            </table>
        </div>
    </div>
</div>

    
<?php include 'footer.php'; ?>
