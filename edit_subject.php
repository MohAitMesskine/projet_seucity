
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
if(isset($_POST["btn_update"]))
{
    extract($_POST);
    
      $q1="UPDATE `tbl_subject` SET `subjectname`='$subjectname',`class_id`='$class_id' WHERE `id`='".$_GET['id']."'";
 
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_subject.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_subject.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `tbl_subject` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
   
    extract($row);
$fname = $row['subjectname'];
$class_id = $row['class_id'];

}

?> 


   


 
        <div class="page-wrapper">
         
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text"  style="color: #135297">Gestion des Modules</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Acceuil</a></li>
                        <li class="breadcrumb-item active">Modifier le Module</li>
                    </ol>
                </div>
            </div>
         
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="subjectform">

                                
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Filière</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="class_id" class="form-control"   placeholder="Class" required=""  style="color: #135297">
                                                        <option value="">--Selectionnez Filiére--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `tbl_class`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>" <?php if($row["id"]==$class_id){ echo "selected"; } ?>>
                                                                        <?php echo $row['classname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"  style="color: #135297">Nom du Module</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="subjectname" class="form-control" placeholder="Saisire Le nom du Module" id="event" onkeydown="return alphaOnly(event);" value="<?php echo $subjectname; ?>" required=""  style="color: #135297">
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <button type="submit" name="btn_update" style="background-color: #135297;color: white" class="btn btn-flat m-b-30 m-t-30">Modifier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
   
<?php include('footer.php');?>

