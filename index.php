<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous">
        <title>Sparkling Water Search</title>
        <style>
            html,
            body {
                background: url(img/bg.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                height: 100%;
                margin: 0;
            }
        #upload{
            border: 3px dashed #0087F7;
            border-radius: 5px;
            background: #F3F4F5;
            cursor: pointer;
        }
        #upload{
            min-height: 150px;
            padding: 54px 54px;
            box-sizing: border-box;
        }
        #upload fileToUpload{
            text-align: center;
            margin: 2em 0;
            font-size: 16px;
            font-weight: bold;
        }
        </style>
    </head>
    <body>
        <div class="d-flex h-100 align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="border border-danger" >
                            <div class=" text-center my-auto p-5" style="background-color:rgba(255, 255, 255, 0.8); ">
                                    <h1>Welcome To</h1>
                                    <h3>Sparkling Water</h3>
                                    <h3>Search</h3>
                                    <br>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div id="upload">
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary">UPLOAD NOW!</button>   
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 
   if (isset($_POST["submit"])) {
       if (!empty($_FILES["fileToUpload"]["name"])) {
            $target_dir = "temp/";
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $uploadOk = 1;
           if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
               $uploadOk = 0;
           } else {
            
               @copy($_FILES["fileToUpload"]["tmp_name"], $target_dir."upload.jpg");
               $ImageFilter = "java -cp weka.jar;imageFilters.jar;lire.jar weka.filters.unsupervised.instance.imagefilter.SimpleColorHistogramFilter -i test.arff -D temp -o temp\data.arff";
               exec($ImageFilter);
               $RemoveString = "java -cp weka.jar weka.filters.unsupervised.attribute.RemoveType -T string -i temp\data.arff -o temp\RemoveString.arff";
               exec($RemoveString);
               $Prediction = "java -cp weka.jar weka.classifiers.trees.RandomForest -T temp\RemoveString.arff -l model.model -p 0";
               exec($Prediction, $output);
               if (!empty($output)) {
                   preg_match('#[[:alpha:]]+#', $output[5], $output);
                   if ($output[0] != "") {
                       if ($output[0] == "cola") {
                           $Imgname = "train/cola_01.jpg";
                           $Name = "Cola";
                           $Link  = "link/cola.php";
                       } elseif ($output[0] == "fruit") {
                           $Imgname = "train/fruit_01.jpg";
                           $Name = "Fruit (น้ำเขียว)";
                           $Link  = "link/fruit.php";
                       } elseif ($output[0] == "lemon") {
                           $Imgname = "train/lemon_01.jpg";
                           $Name = "Lemon (สไปร์ท)";
                           $Link  = "link/lemon.php";
                       } elseif ($output[0] == "orange") {
                           $Imgname = "train/orange_01.jpg";
                           $Name = "Oranges (น้ำส้ม)";
                           $Link  = "link/orange.php";
                       } elseif ($output[0] == "strawberry") {
                           $Imgname = "train/strawberry_01.jpg";
                           $Name = "Strawberry (น้ำแดง)";
                           $Link  = "link/strawberry.php";
                       }
                       header('Location:'.$Link);
                   }
               }
           }
       }
   }
?>