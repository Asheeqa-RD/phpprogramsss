<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Amstrong number</h1>
    <form method="get">
        <label>Enter the number</label>
        <input type ="number" name="num">
        <button  type="submit"> Check Number</button>
    </form> 

    <?php 
    if($_GET){
        $num=$_GET['num'];
        $sum=0;
        $n=strlen(string)$num;
        $number=$num;

        while($num!=0){
            $rem=$num % 10;
            $sum=$sum+pow($rem,$n);
            $num = ($num/10);
        }

        if($num==$number){
            echo "$number is an amstrong number"
        }else{
             echo "$number is  not an amstrong number"
        }
    }
    ?>
</body>
</html>