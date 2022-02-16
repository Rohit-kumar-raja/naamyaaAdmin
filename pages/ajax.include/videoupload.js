$(document).ready(function () {
    $("#but_upload").click(function () {
        var fd = new FormData();
        var files = $('#file')[0].files;

        // Check file selected or not
        if (files.length > 0) {
            fd.append('file', files[0]);


            $.ajax({

                xhr: function () {
                    var xhr = new window.XMLHttpRequest();

                    // Upload progress
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //Do something with upload progress
                            //console.log(percentComplete);
                            document.getElementById('progress').style.display = 'block';
                            document.getElementById('progress').style.width = (percentComplete * 100) + '%';
                            document.getElementById('progress').innerText = (parseInt(percentComplete * 100)) + '%';
                        }
                    }, false);

                    return xhr;
                },
                url: '../ajax.include/upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    document.getElementById('link').value = response;
                    if (response != 0) {
                    } else {
                        alert('file not uploaded');
                    }
                },
            });
        } else {
            alert("Please select a file.");
        }
    });
});
