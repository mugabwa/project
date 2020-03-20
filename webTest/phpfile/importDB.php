<?php
if(isset($_POST["submit"]))
{

    $url='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"proposal");
    if(!$conn){
        die('Could not Connect MySql:' .mysqli_error());
    }
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
//    while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
//    {
//        $fname = $filesop[1];
//        $lname = $filesop[2];
//        $id = $filesop[0];
//        $sql = "insert into Student(studentID,firstName,lastName) values ('$id','$fname','$lname')";
//        $stmt = mysqli_prepare($conn,$sql);
//        mysqli_stmt_execute($stmt);
//
//        $c = $c + 1;
//    }
    for ($i=0;$i<1;$i++){
        $filesop = fgetcsv($handle, 1000, " ");

        foreach ($filesop as $value){

            $list = explode(" ",$value);
            print_r($list);
        }
    }


//    if($sql){
//        echo "sucess";
//    }
//    else
//    {
//        echo "Sorry! Unable to impo.";
//    }

}
?>
<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>
</body>
</html>