<?php

require("../../functions/functions.php");

$id = $_POST["checkbox"];
$id = explode(",", $id);
if (isset($id)) {
    deleteGalleryTravel($id);
}
// $datas = query("SELECT * FROM gallery");

?>

<!-- <table class="table table-hover  table-bordered ">
    <thead>
        <tr>
            <th class="text-center">Paket Travel</th>
            <th class="text-center">Gallery</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datas as $data) : ?>
        <?php

            $idpaket = $data["paket_travel_id"];

            $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title FROM paket_travel WHERE id=$idpaket"));
            // var_dump($result);
        ?>
        <tr id="<?= $data["id"]  ?>">
            <td align="center"> <?= $result["title"]  ?> </td>
            <td align="center"><img src="../img/paket/<?= $data["image"]; ?> " style="width: 150px; height: 100px;">
            </td>
            <td align="center">
                <button class="btn btn-sm btn-secondary">
                    <a href="edit.php?id=<?= $data["id"] ?>" style="color: white; ">
                        <i class="fas fa-pencil-alt fa-2x"></i></a>
                </button>

                <button class="btn btn-sm btn-danger btn-delete" name="delete" type="submit"><a href=""
                        style="color: white;">
                        <i class="fas fa-trash-alt fa-2x"></i></a>

                </button>
                <div class="form-check-inline" style=" margin-top: 5px; position: absolute; margin-left: 5px;">
                    <input class="form-check-input" type="checkbox" value="<?= $data["id"] ?>" name="checkbox[]"
                        style="width: 25px; height: 25px;">
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table> -->