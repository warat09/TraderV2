<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM billing_information WHERE CONCAT(DATEANDHR,EMAIL,DATE, HM,IMAGE) LIKE '%".$valueToSearch."%'";
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
    $query = "SELECT * FROM billing_information";
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
    <style>
            
             tr{cursor: pointer; transition: all .25s ease-in-out}
            .selected{background-color: red; font-weight: bold; color: #fff;}
            
        </style>
        <form method="post">
            <input type="text" name="valueToSearch" placeholder="ช่องค้นหา"><br><br>
            <input type="submit" name="search" value="ค้นหา"><br><br>
            <input type="submit" name="userall" value="ผู้ใช้งานทั้งหมด">
            <input type="submit" name="deposit" value="ฝากเงิน">
            <input type="submit" name="withdrawn" value="ถอนเงิน"><br><br>
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
            
            <table id="table">
                <tr>
                    <th>DATEANDHR</th>
                    <th>EMAIL</th>
                    <th>MONEY</th>
                    <th>DATE</th>
                    <th>HM</th>
                    <th>IMAGE</th>
                </tr>

      <!-- populate table from mysql database -->
               
                <?php while($row = mysqli_fetch_array($search_result)):?>
                    <?php $nameimage = $row['IMAGE'];
                    $TT = "%20"
                    ?>
                <tr>
                    <td><label><?php echo $row['DATEANDHR'];?></label></td>
                    <td><label><?php echo $row['EMAIL'];?></label></td>
                    <td><label><?php echo $row['MONEY'];?></label></td>
                    <td><label><?php echo $row['DATE'];?></label></td>
                    <td><label><?php echo $row['HM'];?></label></td>
                    <td><p onclick="window.location.href='payment/<?php echo  $TT . $nameimage;?>'"><?php echo $row['IMAGE'];?></p></td>
                    <td><a href ="admindeposit_pc.php?datehr=<?php echo $row['DATEANDHR'];?>&email=<?php echo $row['EMAIL'];?>&money=<?php echo $row['MONEY'];?>&date=<?php echo $row['DATE'];?>&hm=<?php echo $row['HM'];?>&image=<?php echo $nameimage;?>"  >ยืนยัน</a></td>
                    
    
                    
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
