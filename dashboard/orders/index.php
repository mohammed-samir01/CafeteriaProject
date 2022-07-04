<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <script>
        let ajax= new XMLHttpRequest();
        let methode = "GET";
        let url = "order.php";
        let async = true;
        ajax.open(methode,url,async);
        ajax.send();
        ajax.onreadystatechange= function(){
            if(this.readyState == 4 && this.status == 200){
                alert(this.responseText);
            }
        }
    </script> -->
    <?php
    header('location:order.php')
    ?>
</body>
</html>