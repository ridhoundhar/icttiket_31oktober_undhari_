<head>
    <link rel="stylesheet" href="assets/css/costum.css">
</head>
    <h2>Form Pendaftaran</h2>
    <?php
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo "<p style='color: green;'>Registrasi berhasil! Anda dapat login sekarang.</p>";
            ?>
            <a href="login.html">login</a>
            <?php 
        }
    ?>
    <form action="proses_daftar.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Daftar">
    </form>

<a href="lupa_pass.php?allow_reset=true">Lupa Password?</a>
