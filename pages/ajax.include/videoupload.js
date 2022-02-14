if ($("#video")[0].files.length) {
    this.total_files = $("#video")[0].files.length;
    this.start_process = 0;
    $.each($("#video")[0].files, function (i, o) {
        var files = new FormData();
        files.append(1, o);
    });
    $.ajax({
        url: "http://example.com",
        method: "POST",
        contentType: false,
        processData: false,
        data: files,
        async: true,
        xhr: function () {
            if (window.XMLHttpRequest) {
                var xhr = new window.XMLHttpRequest();
                //Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        //Do something with upload progress
                    }
                }, false);
            }
        },
        success: function (data) {
            alert("file uploaded..");
        }
    });
}