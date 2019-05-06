$(function () {
  var files = $("#files");

  $("#fileupload").fileupload({
    url: 'manager',
    dropZone: '#dropZone',
    dataType: 'json',
    autoUpload: false
  }).on('fileuploadadd', function (e, data) {
/*    var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
    var fileName = data.originalFiles[0]['name'];
    var fileSize = data.originalFiles[0]['size'];
    if (!fileTypeAllowed.test(fileName))
      $("#error").html("Only images are allowed");
    else if (fileSize > 500000)
      $("#error").html("Your file is too big!")
    else {
      $("#error").html("");
      data.submit();
    } */

    data.submit();
  }).on('fileuploaddone', function (e, data) {
    // on fileuploaddone...
  }).on('fileuploadprogressall', function(e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      var bar = document.getElementById('progressBar');
      $("#progress").html("Completed: " + progress + "%");
      bar.value = progress;
      if (progress == 100)
      {
        $("#error").html("Uploaded succesfully!");
      }
  });
});

      function overrideDefault(event) {
        event.preventDefault();
        event.stopPropagation();
        document.getElementById('progressBar').style.display = "none";
        document.getElementById('error').style.display = "none";
        document.getElementById('progress').style.display = "none";
        $("#error").html("");
      }

      function fileHover() {
        dropZone.classList.add("fileHover");
      }

      function fileHoverEnd() {
        dropZone.classList.remove("fileHover");
      }

      function addFiles(event) {
        droppedFiles = event.target.files || event.dataTransfer.files;
        showFiles(droppedFiles);
        document.getElementById('progressBar').style.display = "inline";
        document.getElementById('error').style.display = "inline";
        document.getElementById('progress').style.display = "inline";
      }

      function showFiles(files) {
        if (files.length > 1) {
          fileLabelText.innerText = files.length + " files selected";
        } else {
          fileLabelText.innerText = files[0].name;
        }
      }
