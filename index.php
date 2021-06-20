<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Images</title>

    <!-- css Framworks -->
    <link rel="stylesheet" href="./css/dropzone.min.css" main>
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Javascript Libreries -->
    <script src="./js/jquery.js"></script>
    <script src="./js/dropzone.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="alert alert-warning">
        <h2 class="text-center">Upload Multiple Images With AJAX</h2>
    </div>
    <div>
        <div class="container">
            <form class="dropzone" id="file_upload">
            </form>
            <button class="btn btn-primary mt-3" id="btnupload">Upload</button>
        </div>
    </div>

    <!-- Message -->

    <div class="container">
        <div class="toast-container" style="position:absolute; top:40px;left:20px;">
            <div class="toast " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">KRM Says...</strong>
                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <div class="msg"></div>
                </div>
            </div>
        </div>

        <!-- Javascript Codes -->
        <script>
            Dropzone.autoDiscover = false;

            var myDropzone = new Dropzone("#file_upload", {
                url: "upload.php",
                parallelUploads: 10,
                uploadMultiple: true,
                acceptedFiles: '.jpg,.jpeg,.png',
                autoProcessQueue: false,
                success: function(file, response) {
                    $(".toast").toast("show");
                    if (response == true) {
                        $(".msg").html("File Uploaded Succesfully");
                    } else {
                        $(".msg").css("color:red;");
                        $(".msg").html(response);
                    }
                }
            });

            $("#btnupload").click(function() {
                myDropzone.processQueue();
            });

            $(".btn-close").on("click", function() {
                $(".toast").hide();
            });
        </script>
</body>

</html>