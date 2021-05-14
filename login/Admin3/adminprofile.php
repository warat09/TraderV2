<?php
session_start();
include('db_conn.php');
    $email = mysqli_real_escape_string($conn , $_SESSION['email']);
    $sql =  "SELECT * FROM admins WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $sql);
    $results = mysqli_fetch_assoc($result);
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
            <?php echo "จำนวนเงินที่ฝาก" .$results['money'];?>
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
                </tr>

     
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><label><?php echo $row['NAME'];?></label></td>
                    <td><label><?php echo $row['SURNAME'];?></label></td>
                    <td><label><?php echo $row['EMAIL'];?></label></td>
                    <td><label><?php echo $row['PHONE'];?></label></td>
                    <td><label><?php echo $row['MONEY'];?></label></td>
                   
                    
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
