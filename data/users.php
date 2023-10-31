<?php
    if(isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p class='alert alert-success'>Data Berhasil di Hapus!";
    }

    $conn = mysqli_connect("localhost", "root", "root", "tiket");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM admin";

    $result = mysqli_query($conn, $sql);
    $no = 1;
    if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no ++ . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td><p class='bi bi-trash' onclick='deleteRow(" . $row['id'] . ")'></p></td>";
            echo "</tr>";
        }

        echo "<script>
                function deleteRow(id) {
                    var confirmation = confirm('Apakah Yakin Ingin Mnghapus Data Ini?');
                    if (confirmation) {
                        window.location = 'delete_users.php?id=' + id;
                    }
                }
            </script>";

        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
