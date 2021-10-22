<?php include('assets/partials/menu.php'); ?>

<div class="admin-manage">
    <div class="wrapper">
        <h1>Manage Students</h1>

        <table class="tbl-full" >
            <tr> 
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
            </tr>

            <?php
            $connection = mysqli_connect("localhost", "root", "", "ics499");
            if ($connection-> connect_error) {
                die("Connection Failed:". $connection-> connect_error);
            }
                   
            $sql = "SELECT sid, name from students";
            $result = $connection->query($sql);

            while ($row = $result-> fetch_assoc()) {
                echo "<tr><td>" . $row["sid"] . "</td><td>" . $row["name"] . "</td></tr>";
            }
            echo "</table>";

            $connection->close();
            ?>

            <tr>
                <td></td>
            </tr>
        </table>

    </div>
</div>

<?php include('assets/partials/footer.php'); ?>

