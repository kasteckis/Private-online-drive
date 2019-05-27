
$(function () {
  var files = $("#files");

  $("#fileupload").fileupload({
    url: 'manager',
    dropZone: '#dropZone',
    dataType: 'json',
    autoUpload: false
  }).on('fileuploadadd', function (e, data) {
    var fileTypeNotAllowed = /.\.(html|php)$/i;
    var fileName = data.originalFiles[0]['name'];
    var fileSize = data.originalFiles[0]['size'];
    if (fileTypeNotAllowed.test(fileName))
		{
			document.getElementById('progressBar').style.display = "none";
			document.getElementById('error').style.display = "none";
			document.getElementById('cancel').style.display = "none";
			document.getElementById('progress').style.display = "none";
			document.getElementById('FileLabel').style.display = "none";
			swal ( "Oops" ,  "File type is not supported" ,  "error" );
		}
    else if (fileSize > belekas)
		{
			swal ( "Oops" ,  "Your file is too big! Maximum size: 15 MB" ,  "error" );
			document.getElementById('progressBar').style.display = "none";
			document.getElementById('error').style.display = "none";
			document.getElementById('cancel').style.display = "none";
			document.getElementById('progress').style.display = "none";
			document.getElementById('FileLabel').style.display = "none";
		}
    else {
      $("#error").html("");
      data.submit();
    }

  }).on('fileuploaddone', function (e, data) {
    // on fileuploaddone...

  }).on('fileuploadprogressall', function(e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      var bar = document.getElementById('progressBar');
      $("#progress").html("Completed: " + progress + "%");
      bar.value = progress;
      if (progress == 100)
      {
				document.getElementById('cancel').style.display = "none";
				swal("Great!", "Files Uploaded succesfully!", "success")
				.then((value) => {
				  location.reload(true);
				});
      }
  });
});

			var fileLabelText = document.getElementById("FileLabel");


      function overrideDefault(event) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById('progressBar').style.display = "none";
        document.getElementById('error').style.display = "none";
				document.getElementById('cancel').style.display = "none";
        document.getElementById('progress').style.display = "none";
				document.getElementById('FileLabel').style.display = "none";
        // document.getElementById('img-upload').style.display = "none";
        $("#error").html("");
      }

      function fileHover() {
        dropZone.classList.add("fileHover");
        //document.getElementById('img-upload').style.display = "inline";
      }

      function fileHoverEnd() {
        dropZone.classList.remove("fileHover");
        //document.getElementById('img-upload').style.display = "none";
      }

      function addFiles(event) {
        droppedFiles = event.target.files || event.dataTransfer.files;
        showFiles(droppedFiles);
        document.getElementById('progressBar').style.display = "inline";
        document.getElementById('error').style.display = "inline";
        document.getElementById('progress').style.display = "inline";
				document.getElementById('cancel').style.display = "inline";
      }

			document.getElementById("Click").onclick = function () {

				};

			function Check(event) {
				swal("Great!", "Files Uploaded succesfully!", "success");
			}

      function showFiles(files) {
        if (files.length > 1) {
          FileLabel.innerText = files.length + " files selected";
        } else {
          FileLabel.innerText = files[0].name;
        }
      }
