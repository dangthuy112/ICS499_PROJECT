<?php include('assets/partials/menu.php')?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Edit Announcement</h1>
        <br /><br />

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Select course to receive this announcement</td>
                    <td>
                        <select name="courseID">
                            <?php foreach($courses as $course): ?>
                            <option value="<?= $course['courseID']; ?>"
                                <?php if ($course['courseID'] == $record['courseID']) { echo 'selected';}?>>
                                <?=$course['subject']; ?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Announcement: </td>
                    <td>
                        <textarea name="announcement" id="" cols="30" rows="6"><?= $record['announcement'];?></textarea>
                    </td>
                </tr>

                <td colspan="2">
                    <input type="submit" name="submit" value="Update Announcement" class="btn-primary">
                </td>
            </table>
        </form>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>