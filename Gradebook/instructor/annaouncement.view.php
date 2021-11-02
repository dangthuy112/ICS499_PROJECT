<?php include('assets/partials/menu.php')?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Manage Announcements</h1>
        <br /><br />
        <a href="add-announcement.php" class="btn-primary">Add Announcement</a>
        <br /><br />
        <table class="tbl-full">

            <tr>
                <th>#</th>
                <th>Announcement</th>
                <th>Action</th>
            </tr>

            <?php foreach($announcements as $announcement): ?>
            <tr>
                <td>#</td>
                <td><?=$announcement['announcement'];?></td>
                <td>
                    <a href="update-announcement.php?id=<?=$announcement['id'];?>" class="btn-secondary">Update</a>
                    <form method='POST'>
                        <input type=hidden name="id" value="<?=$announcement['id'];?>">
                        <input type="submit" class="btn btn-danger" name="delete" value="Delete"></input>
                    </form>
                </td>
            </tr>
            <?php endforeach;?>

        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>