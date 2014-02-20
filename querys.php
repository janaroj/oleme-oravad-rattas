
<?php include 'header.php'; ?>

<div class="container">

    <div class="content">

        <?php include 'sidebar.php'; ?>
    
        <div class="content-small">
            <h1>Siin on sinule tulnud päringud</h1> <br/>
                <table class="data-input-table">
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
                    <td>
                    <button class="approve-query">Vasta päringule</button>
                    <button class="decline-query">Keeldu päringust</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

    
<?php include 'footer.php'; ?>
