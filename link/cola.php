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
                background: url(../img/bg.jpg) no-repeat center center fixed; 
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
                            <div class=" text-center my-auto p-5" style="background-color:rgba(255, 255, 255, 0.8);">
                              <h1>ผลเปรียบเทียบ</h1>   
                            <div class="row ">
                              <div class ="col-5 mx-auto ">
                              <img src="../temp/upload.jpg" class="border border-danger"  style="height:300px;width:220px">
                               <h4> รูปของคุณ  </h4>
                               </div>
                               <div class ="col-5 mx-auto">
                               <img src="../img/cola.jpg" class=" border border-danger"  style="height:300px;width:220px">
                               <h4> ผลลัพท์  </h4>
                               </div>
                             </div>
                             <hr>
							<h4>Cola (โคล่า) </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>