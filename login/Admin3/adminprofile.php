<?php
session_start();
include('db_conn.php');
    //id admin warat
$emailadmin1 = "beebacorporation@gmail.com";
$emailwarat = mysqli_real_escape_string($conn , $emailadmin1);
$sqladmin1 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin1'";
$resultadmin1 = mysqli_query($conn, $sqladmin1);
$resultsadmin1 = mysqli_fetch_assoc($resultadmin1);

//id admin opal
$emailadmin2 = "afterlevisp@hotmail.com";
$emailopal = mysqli_real_escape_string($conn , $emailadmin2);
$sqladmin2 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin2'";
$resultadmin2 = mysqli_query($conn, $sqladmin2);
$resultsadmin2 = mysqli_fetch_assoc($resultadmin2);

//id admin SiGz
$emailadmin3 = "mrsilent7797@gmail.com";
$emailsigz = mysqli_real_escape_string($conn , $emailadmin3);
$sqladmin3 =  "SELECT * FROM admins WHERE EMAIL='$emailadmin3'";
$resultadmin3 = mysqli_query($conn, $sqladmin3);
$resultsadmin3 = mysqli_fetch_assoc($resultadmin3);

$investall = $resultsadmin1['money']+$resultsadmin2['money']+$resultsadmin3['money'];

$resultsum = mysqli_query($conn, "SELECT SUM(MONEY) AS total FROM users"); 
$row = mysqli_fetch_assoc($resultsum); 
$sum = $row['total'];

$idport1 = "SELECT count(*) AS totalport1 FROM users WHERE INVESTMONEY >='100000'";
$resultport1 = mysqli_query($conn,$idport1);
$valuesport1 = mysqli_fetch_assoc($resultport1);
$countport1 = $valuesport1['totalport1'];

$sumport1 = "SELECT SUM(INVESTMONEY) AS sumport1 FROM users WHERE INVESTMONEY >='100000'";
$resultsumport1 = mysqli_query($conn,$sumport1);
$valuesSumport1 = mysqli_fetch_assoc($resultsumport1);
$countsumport1 = $valuesSumport1['sumport1'];

$sumprofit = "SELECT SUM(INVESTMONEY*0.09) AS sumprofit FROM users WHERE INVESTMONEY >='100000'";
$resultsumprofit = mysqli_query($conn,$sumprofit);
$valuesSumprofit = mysqli_fetch_assoc($resultsumprofit);
$countsumprofit = $valuesSumprofit['sumprofit'];
    
    if(!isset($_SESSION['email'])){
        $_SESSION['error'] = "กรุณาเข้าสู่ระบบ";
        header('location: ../login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        unset($_SESSION['email']);
        header('location: ../login.php');
    }

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM users WHERE CONCAT(ID, NAME, SURNAME, EMAIL, PASSWORD, PHONE,MONEY) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
else if(isset($_POST['userall']))
{
    header('location: adminprofile.php');
    
}
else if(isset($_POST['deposit']))
{
    header('location: admindeposit.php');
    
}
else if(isset($_POST['withdrawn']))
{
    header('location: adminwithdrawn.php');
    
}
 else {
    $query = "SELECT * FROM users";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "mistersig", "TraderV2", "beebacop");
    $filter_Result = mysqli_query($connect, $query);
    if(mysqli_num_rows($filter_Result)==0){ 
        $_SESSION['error'] = "หาข้อมูลไม่พบ";
        return $filter_Result;
    }
    else{
        return $filter_Result;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form method="post">
            <input type="text" name="valueToSearch" placeholder="ช่องค้นหา"><br><br>
            <input type="submit" name="search" value="ค้นหา"><br><br>
            <input type="submit" name="userall" value="ผู้ใช้งานทั้งหมด">
            <input type="submit" name="deposit" value="ฝากเงิน">
            <input type="submit" name="withdrawn" value="ถอนเงิน"><br><br>
            <?php echo "จำนวนเงินที่จะลงทุนพอร์ต1 " .$resultsadmin1['money']. " บาท";?><br>
            <?php echo "จำนวนเงินที่จะลงทุนพอร์ต2 " .$resultsadmin2['money']. " บาท";?><br>
            <?php echo "จำนวนเงินที่จะลงทุนพอร์ต3 " .$resultsadmin3['money']. " บาท";?><br>
            <?php echo "จำนวนเงินที่จะลงทุนทั้งหมด " .$investall. " บาท";?><br>
            <?php echo "จำนวนเงินที่ฝาก " .$sum. " บาท";?><br> 
            <input type="number" name="profit" placeholder="กำไรที่ได้"><input type="submit" name="submitprofit" value="ยืนยัน" >
            <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                        <h3 style="color:red">
                             <?php 
                                 echo $_SESSION['error'];
                                 unset($_SESSION['error']);
                            ?>
                        </h3>
                        </div>
                        <?php endif ?>  
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Money</th>
                    <th>เงินลงทุน</th>
                    
                </tr>

     
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><label><?php echo $row['NAME'];?></label></td>
                    <td><label><?php echo $row['SURNAME'];?></label></td>
                    <td><label><?php echo $row['EMAIL'];?></label></td>
                    <td><label><?php echo $row['PHONE'];?></label></td>
                    <td><label><?php echo $row['MONEY'];?></label></td>
                    <td><label><?php echo $row['INVESTMONEY'];?></label></td>
                   
                    
                </tr>
                <?php endwhile;?>

                
            </table>
        </form>
        
    </body>
</html>

<?php
if(isset($_POST['submitprofit'])){
    $inputprofit = $_POST['profit'];
    if($_SESSION['email']==$emailadmin1){
        $suminvest = $countsumport1;
        $adminprofit = $resultsadmin1['money']+$inputprofit;

        mysqli_query($conn, "UPDATE admins SET money=money+'$inputprofit' WHERE email = '$emailadmin1'");

        echo $countsumprofit." ";
        echo $inputprofit;
        for($i = 0.09;$i>0;$i-=0.01){
            $sumprofit = "SELECT SUM(INVESTMONEY*$i) AS sumprofit FROM users WHERE INVESTMONEY >='100000'";
            $resultsumprofit = mysqli_query($conn,$sumprofit);
            $valuesSumprofit = mysqli_fetch_assoc($resultsumprofit);
            $countsumprofit = $valuesSumprofit['sumprofit'];
            if($adminprofit+$countsumprofit>=$countsumprofit+$suminvest){
                $sqlmoneyuser = "UPDATE users SET MONEY=INVESTMONEY+MONEY+(INVESTMONEY*$i),INVESTMONEY=0 WHERE INVESTMONEY >= '100000'";
                $update = mysqli_query($conn, $sqlmoneyuser);
                mysqli_query($conn, "UPDATE admins SET money=money-('$suminvest'+'$countsumprofit') WHERE email = '$emailadmin1'");
                //แอดมิน-=$suminvest+$countsumprofit
                break;
            }
        }
    }
    else if($_SESSION['email']==$emailadmin2){
        $suminvest = $countsumport1;
        $adminprofit = $resultsadmin1['money']+$inputprofit;

        mysqli_query($conn, "UPDATE admins SET money=money+'$inputprofit' WHERE email = '$emailadmin2'");

        echo $countsumprofit." ";
        echo $inputprofit;
        for($i = 0.09;$i>0;$i-=0.01){
            $sumprofit = "SELECT SUM(INVESTMONEY*$i) AS sumprofit FROM users WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
            $resultsumprofit = mysqli_query($conn,$sumprofit);
            $valuesSumprofit = mysqli_fetch_assoc($resultsumprofit);
            $countsumprofit = $valuesSumprofit['sumprofit'];
            if($adminprofit+$countsumprofit>=$countsumprofit+$suminvest){
                $sqlmoneyuser = "UPDATE users SET MONEY=INVESTMONEY+MONEY+(INVESTMONEY*$i),INVESTMONEY=0 WHERE INVESTMONEY >='10000'AND INVESTMONEY<'100000'";
                $update = mysqli_query($conn, $sqlmoneyuser);
                mysqli_query($conn, "UPDATE admins SET money=money-('$suminvest'+'$countsumprofit') WHERE email = '$emailadmin2'");
                //แอดมิน-=$suminvest+$countsumprofit
                break;
            }
        }
    }
    else if($_SESSION['email']==$emailadmin3){
        $suminvest = $countsumport1;
        $adminprofit = $resultsadmin1['money']+$inputprofit;

        mysqli_query($conn, "UPDATE admins SET money=money+'$inputprofit' WHERE email = '$emailadmin3'");

        echo $countsumprofit." ";
        echo $inputprofit;
        for($i = 0.09;$i>0;$i-=0.01){
            $sumprofit = "SELECT SUM(INVESTMONEY*$i) AS sumprofit FROM users WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
            $resultsumprofit = mysqli_query($conn,$sumprofit);
            $valuesSumprofit = mysqli_fetch_assoc($resultsumprofit);
            $countsumprofit = $valuesSumprofit['sumprofit'];
            if($adminprofit+$countsumprofit>=$countsumprofit+$suminvest){
                $sqlmoneyuser = "UPDATE users SET MONEY=INVESTMONEY+MONEY+(INVESTMONEY*$i),INVESTMONEY=0 WHERE INVESTMONEY >='1000'AND INVESTMONEY<'10000'";
                $update = mysqli_query($conn, $sqlmoneyuser);
                mysqli_query($conn, "UPDATE admins SET money=money-('$suminvest'+'$countsumprofit') WHERE email = '$emailadmin3'");
                //แอดมิน-=$suminvest+$countsumprofit
                break;
            }
        }
    }
    
}
?>