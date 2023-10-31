<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Tiket | <?php echo $pageTitle; ?> </title>
    <link rel="shortcut icon" href="../assets/img/sp.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300&display=swap" rel="stylesheet">
    <!-- chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
        body {
          position: relative;
          margin:3rem;
          padding: 0 1rem;
          font-family: var(--body-font);
          font-size: var(--normal-font-size);
          transition: 0.5s;
        }
        a {
          text-decoration: none;
        }
        .header {
          width: 100%;
          height: 3rem;
          position: fixed;
          top: 0;
          left: 0;
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 0 1rem;
          background-color: var(--first-color);
          z-index: var(--z-fixed);
          transition: 0.5s;
        }
        .header_toggle {
          
          color: black;
          font-size: 2rem;
          cursor: pointer;
        }
        .header_img {
          width: 35px;
          height: 35px;
          display: flex;
          justify-content: center;
          border-radius: 50%;
          overflow: hidden;
        }
        .header_img img {
          width: 40px;
        }
        
        .sidebar {
          position: fixed;
          border-radius: 10px;
          top: 10px;
          margin-left: 10px;
          bottom: 10px;
          left: 10px;
          width: 68px;
          background: var(--first-color);
          padding: 0.5rem 1rem 0 0;
          transition: 0.5s;
          z-index: var(--z-fixed);
        }
        .nav {
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          overflow: hidden;
        }
        .nav_logo{
          padding: 0.5rem 0 0.5rem 1.2rem;
        }
        .nav_link {
          display: grid;
          grid-template-columns: max-content max-content;
          align-items: center;
          column-gap: 1rem;
          border-radius: 2px;
          padding: 0.5rem 0 0.5rem 1rem;
        }
        .ulnav {
          border-radius: 6px;
          background-color: #b5b9bd;
        }
        .nav_logo {
          margin-bottom: 2rem;
        }
        .nav_logo-icon {
          font-size: 1.25rem;
          color: black;
        }
        .nav_logo-name {
          color: black;
          font-weight: 700;
        }
        .nav_link {
          position: relative;
          color: var(--first-color-light);
          margin-bottom: 1.5rem;
          transition: 0.3s;
        }
        .nav_link:hover {
          color: black;
        }
        .nav_icon {
          font-size: 1.25rem;
        }
        .show {
          left: 0;
        }
        .body-pd {
          padding-left: calc(var(--nav-width) + 1rem);
        }
        .active {
          color: black;
        }
        .active::before {
          content: "";
          position: absolute;
          left: 0;
          width: 2px;
          height: 32px;
          background-color: var(--white-color);
        }
        .height-100 {
          height: 100vh;
        }
        @media screen and (min-width: 768px) {
          body {
            margin: calc(var(--3rem) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem);
          }
          .header {
            height: calc(var(--3rem) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
          }
          
          .header_img {
            width: 40px;
            height: 40px;
          }
          .header_img img {
            width: 45px;
          }
          .show {
            width: calc(var(--nav-width) + 156px);
          }
          .body-pd {
            padding-left: calc(var(--nav-width) + 188px);
          }
        }        
                
        .conten-m {
            margin-top: 60px;
        }
    </style>
  </head>
  <body>
    <?php include 'sidebard.php' ?>
  </body>
</html>
