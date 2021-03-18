<!doctype html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="script.js" type="text/javascript"></script>
		<style>
		.upload-area{
              width: 70%;
              height: 200px;
              border: 2px solid lightgray;
              border-radius: 3px;
              margin: 0 auto;
              margin-top: 100px;
              text-align: center;
              overflow: auto;
        }

        .upload-area:hover{
              cursor: pointer;
        }

       .upload-area h1{
            text-align: center;
            font-weight: normal;
            font-family: sans-serif;
            line-height: 50px;
            color: darkslategray;
        }

        #file{
            display: none;
        }

        /* Thumbnail */
        .thumbnail{
            width: 80px;
            height: 80px;
            padding: 2px;
            border: 2px solid lightgray;
            border-radius: 3px;
            float: left;
        }

        .size{
           font-size:12px;
        }

		</style>
    </head>
    <body >

        <div class="container" >
            <input type="file" name="file" id="file">
            
            <!-- Drag and Drop container-->
            <div class="upload-area"  id="uploadfile">
                <h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
            </div>
        </div>

    </body>
</html>