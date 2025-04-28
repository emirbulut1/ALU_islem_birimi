<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="alustyle.css">
</head>
<body>
    <div class="container">
    <div class="menu">
    <h1>ALU İŞLEM BİRİMİ</h1>
    <P>Yapmak istediğiniz işlemi <cite><b>"boşluk karakteri"</b></cite> ile ayırarak sayı işlem sayı şeklinde giriniz</P>
    <p>not işleminde biçimi <cite><b>"sayı ! "</b></cite> şeklinde ünlemden sonra bir boşluk bırakarak giriniz</p>
    <ul>Desteklenen işlemler
      <li>toplama = +</li>
      <li>çıkarma = -</li>
      <li>çarpma = *</li>
      <li>bölme = /</li>
      <li>and = &&</li>
      <li>or = ||</li>
      <li>not = !</li>
      <li>xor = ^</li>
      <li>xnor = !^</li>
    </ul>

    <form method="post">
        <p><input type="text" class="textbox" name="s1">
        <input type="submit" class="button" value="HESAPLA" name="hesapla"></p>
    </form>
    </div>
    </div>

    <?php
    if(isset($_POST["hesapla"])){
        $islem=$_POST["s1"];
        $islemdizi=explode(" ",$islem);
        $sonuc=$islemdizi[0];

        for($i=1;$i<count($islemdizi);$i+=2){
            $s1=$islemdizi[$i+1];
            $islem=$islemdizi[$i];
            $sonuc=islemyap($islem,$sonuc,$s1);
        }
        echo "<p class=menu> Sonuç: $sonuc </p>";
    }
    function islemyap($islem,$s1,$s2){
        $sonuc=0;
        if($islem=="+"){
            $sonuc=$s1+$s2;
        }
        else if($islem=="-"){
            $sonuc=$s1-$s2;
        }
        else if($islem=="*"){
            $sonuc=$s1*$s2;
        }
        else if($islem=="/"){
            $sonuc=$s1/$s2;
        }
        else if($islem=="&&"){
            if($s1!=0 && $s2!=0){
                return 1;
            }
            else{
                return 0;
            }
        }
        else if($islem=="||"){
            if($s1==0 && $s2==0){
                return 0;
            }
            else{
                return 1;
            }
        }
        else if($islem=="!"){
            if($s1==0){
                return 1;
            }
            else{
                return 0;
            }
        }
        else if($islem=="^"){
            if($s1==$s2 && $s1==0){
                return 0;
            }else if($s1!=0 && $s2!=0){
                return 0;
            }
            else{return 1;}
        }
        else if($islem=="!^"){
            if($s1==$s2 && $s1==0){
                return 1;
            }else if($s1!=0 && $s2!=0){
                return 1;
            }
            else{return 0;}
        }
        else{
            echo "yapmak istenilen işlem algılanamadı";
        }
        return $sonuc;
    }


    ?>
</body>
</html>