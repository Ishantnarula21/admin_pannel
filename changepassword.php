<?php
$connect = mysqli_connect("localhost", "root", "", "adminpannel");
if (!empty($_REQUEST['save'])) {
    $op = $_REQUEST['oldpass'];
    $np = $_REQUEST['newpass'];
    $cnp = $_REQUEST['confirmnewpass'];
    if ($np == $cnp) {
        $query = "select * from login where password='$op' ";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $query = "update login set password='$np' ";
            if (mysqli_query($connect, $query)) {
                echo "Password updated";
            }
        } else {
            echo "old password does not match";
        }
    } else {
        echo "password not matched";
    }
}
?>
<html>

<head>
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.tinymce'
        });
    </script>
</head>

<body>
    <header class="col-md-12">
        <div class="container">
            <div class="col-md-3">
                <image src="images/logo.png" style="margin:15px 0px 5px 0px; float:left">
            </div>
            <div class="col-md-2 col-md-offset-6">
                <a href="login.html" class="logoutbtn">Logout</a>
            </div>
    </header>
    </div>
    <div class="col-md-12" style="background:#1C5978">
        <div class="container">
            <div class="col-md-3">
                <p style="color:white; font-weight:bold; font-family:arial; font-size:12px; margin:7px 0px; float:left; letter-spacing:1; word-spacing:3"><?php echo date('d-m-y') ?></p>
            </div>
        </div>
    </div>
    <aside>
        <div class="container ">
            <div class="col-md-2" style="padding:0px">
                <div class="col-md-12" style="padding:0px">
                    <aside>
                        <?php include('common/navigation.php'); ?>
                    </aside>
                </div>
            </div>
            <div class="col-md-10 main-section">
                <h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">Change Password</h3>
                <hr style="margin:0px; width:600px; margin-bottom:10px" />
                <!--font: font-style font-variant font-weight font-size/line-height font-family -->
                <div style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">Change password</div>
                <form>
                    <table border="1" width="100%" style="text-align: center;">
                        <tr>
                            <td style="padding:8px;">
                                Enter old password
                                <input type="text" name="oldpass" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:8px;">
                                Enter new password
                                <input type="text" name="newpass" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:8px;">
                                confirm new password
                                <input type="text" name="confirmnewpass" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:8px;">
                                <input type="submit" class="savebtn" name="save" value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
    </aside>
    <div class="footer-line" style="margin-top:15px">
        <footer></footer>
    </div>

</body>

</html>