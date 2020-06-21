<?php


require("../../functions/functions.php");

$id = $_POST["id"];

$datas = query("SELECT * FROM transaksi WHERE id='$id'");
?>

<table class="table table-bordered">
    <?php foreach ($datas as $data) : ?>
    <?php
        $iduser = $data["user_id"];
        $nama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM users WHERE id='$iduser'"));
        ?>
    <tr>
        <th>ID Transaksi</th>
        <td><?= $data["id"]; ?></td>
    </tr>
    <tr>
        <th>ID Pembeli</th>
        <td><?= $data["user_id"]; ?></td>
    </tr>
    <tr>

        <th>Nama Pembeli</th>
        <td><?= $nama["username"]; ?></td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td><?= $data["total_transaksi"]; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?= $data["status"]; ?></td>
    </tr>
    <tr>
        <th>Pembelian</th>
        <td>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Paket Travel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        global $datas;
                        ?>
                    <?php foreach ($datas as $data) : ?>
                    <?php
                            $id_transaksi = $data["id"];
                            $result = mysqli_query($conn, "SELECT paket_travel_id FROM transaksi_detail WHERE transaksi_id='$id_transaksi'");

                            $id_paket = [];
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id_paket[] = $row;
                            }
                            ?>
                    <?php foreach ($id_paket as $paket_name) : ?>
                    <?php
                                $id_paket = $paket_name["paket_travel_id"];
                                $nama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title FROM paket_travel WHERE id='$id_paket'"))
                                ?>
                    <tr>
                        <td>
                            <?= $nama["title"]; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </td>
    </tr>
    <?php endforeach; ?>
</table>