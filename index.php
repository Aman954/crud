<?php
require_once("inc/connection.php");

?>

<!DOCTYPE html>
<html lan="en">
<meta charset="UTF-8">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Tenali+Ramakrishna&display=swap" rel="stylesheet">
<title>
  crud
</title>
</head>
  
</head>
<body>
  <nav class='h-30 p-20 bg-primary' style="padding:2px;">
    <center>
      <h1 style='color:white;'>CRUD SYSTEM</h1>
    </center>
    
  </nav>
  
  <?php
  
  if(isset($_POST['submit']))
  {
  
  
  $name=$_POST['name'];
  $course=$_POST['course'];
  $mail=$_POST['mail'];
  $aname=$conn->real_escape_string($name);
  $acourse=$conn->real_escape_string($course);
  $amail=$conn->real_escape_string($mail);

  if(empty($name) || empty($mail))
  {
    $err="please! fill all entries";
  }
  else
  {
  $sql2="INSERT INTO cruding(name,course,mail) VALUES('$aname','$acourse','$amail')";
  $suc=$conn->query($sql2);
  if($suc)
  {
    $succ="data inserted successfully";
  }
  else{
    $err="something went wrong";
  }
}
  
  
  
  }
  
  
  
  
  
  ?>
  
  
  
  
  
  
  
  
  
  
<div class="row" class="w-100" style='width:100%;'>
    <div class="container" style="padding:50px;">
    <form method="post" action="">
      
    
    <div class="form-group" >
      <?php
      if(isset($err))
       {
        ?>
        <span style='color:red;float:right'><?php echo $err;?></span>
        <?php 
      }
      
      if(isset($succ))
      {?>
        <span style='color:red;float:right;'><?php echo $succ; ?></span>
        <?php
      }
      
      ?>
    
      <label for="name">Name:</label>
      <input type="text" class="form-control name" placeholder="your name is here.." name="name" id="name" >
    </div>
    <div class="form-group">
      <label for="course">Course:</label><br>
      <select class="course form-control" id="course" name="course" width="100%">
        <option>c.s.e</option>
        <option>m.e</option>
        <option>aerospace engg</option>
        <option>e.e</option>
      </select>
    </div>
    <div class="form-group" >
      <label for="mail">Mail id:</label>
      <input type="email" class="form-control mail" name="mail" placeholder="your mail.." id="mail">
    </div>
    <input type="submit" value="submit" class="btn btn-primary" name="submit">
  </div>
   </form>
   
   
  
  
   
   
   
   
   
   
 </div>
  
  
  <hr>
  
  
  <?php
  
  if(isset($_POST['edit2']))
  {
  
   $cname=$_POST['names'];
   $ccourses=$_POST['courses'];
   $cmail=$_POST['mails'];   
   $cid=$_POST['cid'];
   if(empty($cname) || empty($cmail))
   {
     $emsg="please fill empty fields";
   }
   else
   {
     
     $uq="UPDATE cruding SET name='$cname',course='$ccourses',mail='$cmail' where id=$cid";
     $uc=$conn->query($uq);
     if($uc)
     {
       $esuc="updated sucessfully";
     }
     else
     {
       $emsg="try again!";
     }
     
     
   }
  
    
    
    
  }
  
  
  ?>
  
  
    
  
  
  
  
  
  
  
  
  
 <?php
 
 if(isset($_POST['edit']))
 {
   $pid=$_POST['id2'];
   $pq="select * from cruding where id=$pid";
   $pr=$conn->query($pq);
   $rw=$pr->fetch_assoc();
   $pname=$rw['name'];    
   $pmail=$rw['mail'];
   $pcourse=$rw['course'];
   ?>
   <div class="container" style="padding:35px;">
     
     
     
     
  

     
   <form method="POST" action="" >
     
   
   <div class="form-group" >
     <?php
     if(isset($emsg))
      {
       ?>
       <span style='color:red;'><?php echo $emsg;?></span>
       <?php 
     }
     
     if(isset($esuc))
     {?>
       <span style='color:red;'><?php echo $esuc; ?></span>
       <?php
     }
     
     ?>
   <input type="hidden" value="<?php echo $pid; ?>" name="cid" >
     <label for="names">Name:</label>
     <input type="text" class="form-control names" placeholder="your name is here.." name="names" id="names" value="<?php if(isset($pname)){ echo $pname;} ?>">
   </div>
   <div class="form-group">
     <label for="courses">Course:</label><br>
     <select class="courses form-control" id="courses" name="courses" width="100%">
       <option <?php if($pcourse==="c.s.e"){ echo "selected";} ?>>c.s.e</option>
       <option <?php if($pcourse==="m.e"){ echo "selected"; }?>>m.e</option>
       <option <?php if($pcourse==="aerospace engg"){ echo "selected";} ?>>aerospace engg</option>
       <option <?php if($pcourse==="e.e"){ echo "selected";}?>>e.e</option>
     </select>
   </div>
   <div class="form-group" >
     <label for="mails">Mail id:</label>
     <input type="email" class="form-control mails" name="mails" placeholder="your mail.." id="mails" value="<?php if(isset($pmail)){ echo $pmail;}?>"> 
   </div>
   <input type="submit" value="edit" class="btn btn-primary" name="edit2">
 </div>
  </form>
  <hr>
  
</div>

   <?php
   
 }
 
 
 
 

 
 ?>
 
 
 
 
 
 
  
  
  
  
  
  
  
  
  
</div>    
  
  
  
  
</div>

  
  
  
  
  
  
  <div class="container">
    
    
    <?php
    
     if(isset($_POST['delete']))
     {
      $rid1=$_POST['id1'];
      $dq="DELETE FROM cruding where id=$rid1";
      $ds=$conn->query($dq);
      if($ds)
      {
        $msg="delete sucessfully";
      }
      else
      {
        $error="try again!";
      } 
       
       
     }
    
    
    
    
    
    ?>
    
    
  
    
    
    
  <?php
  
  $sql3="select * from cruding";
  $sel=$conn->query($sql3);
  
  if($sel->num_rows>0)
  {
    if(isset($msg))
    {
      echo "<span style='float:right;color:green;'>$msg</span>";
    }
    if(isset($error))
    {
      echo "<span style='float:right;color:green;'>$error</span>";
    }
  ?>  <br>
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Course</th>
        <th>Mail</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row=$sel->fetch_assoc())
      {
      ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td><?php echo $row['mail']; ?></td>
        <td>
          
        
          
        <form method="POST" action="">
          <input type="hidden" value="<?php echo $row['id']; ?>"  name="id1" >
          <input type="submit" class="btn btn-danger" value="delete" name='delete'>
        </form>
        </td>
        <td>
        <form method="POST" action="">
          <input type="hidden" value="<?php echo $row['id']; ?>" name="id2">
          <input type="submit" class="btn btn-primary" value="edit" name="edit">
        </form>
        </td>


      </tr>
    <?php } ?>
    </tbody>
  </table>    
    
<?php    }      


else
{

echo "<center><h1>No data available</h1></center>";
  
}


?>
    
  </div>
  
  
  
  
  
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
</body>
</html>






