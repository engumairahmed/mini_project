<?php
require "header.php";

$query="SELECT * FROM slider";
$res=mysqli_query($conn,$query);

if(isset($_GET["did"])){
    $id=$_GET["did"];   
  $delete="DELETE FROM `slider` WHERE sli_id=$id";
    $query="SELECT * FROM slider WHERE sli_id=$id";
  $path=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($path);

    file_exists('front/'.$row["sli_image"]);
  unlink('front/'.$row["sli_image"]);
  mysqli_query($conn,$delete);
  
  echo '<script type="text/javascript">
        window.location = "slider.php";
        </script> ';    
  };

  if(isset($_GET["uid"])){
    $uid=$_GET["uid"];
    $query="SELECT * FROM slider WHERE sli_id=$uid";
    $res=mysqli_query($conn,$query);
    $dt=mysqli_fetch_assoc($res);
};

if(isset($_POST["updSlide"])){
    $name=$_POST["upd_name"];
    $heading=$_POST["upd_heading"];
    $parag=$_POST["upd_parag"];
    $imgName=$_FILES["upd_image"]["name"];
    $tmpfile=$_FILES["upd_image"]["tmp_name"];
    $path='assets/img/'.time().$imgName;
    $imgPath='front/'.$path;
    $uid=$_GET["uid"];
    $xt=explode('.',$imgName);
    $type=end($xt);
    $ext=array('jpg','jpeg','png','jfif');

    $query="UPDATE `slider` SET `sli_name`='$name',`sli_image`='$path',`sli_heading`='$heading',`sli_parag`='$parag' WHERE sli_id=$uid";

    if(in_array($type,$ext)){
    
        mysqli_query($conn,$query);        
        move_uploaded_file($tmpfile,$imgPath);
        echo '<script type="text/javascript">
        window.location = "slider.php";
        </script> ';
    }else{
        echo "<script>alert('Invalid File Type.!')</script>";
    };
};

if(isset($_POST["addSlide"])){
    $name=$_POST["sli_name"];
    $heading=$_POST["sli_heading"];
    $parag=$_POST["sli_parag"];
    $imgName=$_FILES["sli_image"]["name"];
    $tmpfile=$_FILES["sli_image"]["tmp_name"];
    $path='assets/img/'.time().$imgName;
    $imgPath='front/'.$path;
    $xt=explode('.',$imgName);
    $type=end($xt);
    $ext=array('jpg','jpeg','png','jfif');
    $query="INSERT INTO slider VALUES (NULL,'$name','$path','$heading','$parag')";
    if(in_array($type,$ext)){
        mysqli_query($conn,$query);        
        move_uploaded_file($tmpfile,$imgPath);
    }else{
        echo "<script>alert('Invalid File Type.!')</script>";
    };
};

?>

<div class="container">  
    

            <?php
                if(isset($_GET["uid"])){
                    echo '<h1 class="h3 mb-2 text-gray-800">Edit Image Slider</h1>
                    <form class="user" method="post" enctype="multipart/form-data" class="form-control">
                        <input type="text" name="upd_name" value="'.$dt["sli_name"].'" class="form-control mt-3 w-50" id="" placeholder="Slide Name">
                        <input type="text" name="upd_heading" value="'.$dt["sli_heading"].'" class="form-control mt-3 w-50" id="" placeholder="Slide Heading">
                        <textarea class="form-control mt-3 w-50" value="'.$dt["sli_parag"].'" name="upd_parag" id="exampleFormControlTextarea1" rows="3" placeholder="'.$dt["sli_parag"].'"></textarea>
                        <input type="file" name="upd_image" class="form-control mt-3 w-50" id="">
                                <input type="submit" name="updSlide" class="btn btn-warning mt-3" value="Update">                                        
                                <hr>                                        
                    </form>';
                } else{
                    echo '
                    <h1 class="h3 mb-2 text-gray-800">Add Image for Slider</h1>
            <form class="user" method="post" enctype="multipart/form-data" class="form-control">
                <input type="text" name="sli_name" class="form-control mt-3 w-50" id="" placeholder="Slide Name">
                <input type="text" name="sli_heading" class="form-control mt-3 w-50" id="" placeholder="Slide Heading">
                <textarea class="form-control mt-3 w-50" name="sli_parag" id="exampleFormControlTextarea1" rows="3" placeholder="Detailed info"></textarea>
                <input type="file" name="sli_image" class="form-control mt-3 w-50" id="">
                        <input type="submit" name="addSlide" class="btn btn-primary mt-3" value="Add">                                        
                        <hr>                                        
            </form>
                    ';
                };
            ?>
        
        </div>

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">View Hotels</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Information</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Slide Name</th>
                        <th>Heading</th>
                        <th>Paragraph</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>                                    
                <tbody>
                    <?php
                    $query="SELECT * FROM slider;";
                    $res=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($res)){
                        echo   '<tr><th>'.$row["sli_name"].'</th>
                                <th>'.$row["sli_heading"].'</th>
                                <th>'.$row["sli_parag"].'</th>
                                <th><img src="front/'.$row["sli_image"].'" width=100px></td>           
           <th><a class="btn btn-danger" href="slider.php?did='.$row["sli_id"].'">Delete</a></th>
           <th><a class="btn btn-warning" href="slider.php?uid='.$row["sli_id"].'&path='.$row["sli_image"].'">Update</a></th>';
                        };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php

require "footer.php"

?>