setInterval(() => {
  if(window.sessionStorage.getItem("encrypt")==null){
    switchEncrypt();
  }
  if(window.sessionStorage.getItem("upload")==null){
    switchUpload();
  }
}, 0);


function saveState() {
  if (window.sessionStorage.getItem("encrypt")==1) {
    switchEncrypt();
  }
  else if(window.sessionStorage.getItem("encrypt")==0){
    switchDecrypt();
  }
  
  if (window.sessionStorage.getItem("upload")==1) {
    switchUpload();
  }
  else if(window.sessionStorage.getItem("upload")==0){
    switchPaste();
  }
  
}

setInterval(() => {
  if (window.sessionStorage.getItem("encrypt") == 1) {
    $(".btn-dark-small").html("<i class='fa fa-lock'></i>Encrypt");
    $(".c-enkey").prop('required',true);
    $(".c-enkey").css({
      display: 'block'
    });
    $(".form").attr({
      action: 'encrypt.php'
    });
  } else {
    $(".btn-dark-small").html("<i class='fa fa-unlock'></i>Decrypt");
    $(".c-enkey").prop('required',false);
    $(".c-enkey").css({
      display: 'none'
    });
    $(".form").attr({
      action: 'decrypt.php'
    });
  }

}, 0);

function switchEncrypt(){
  $(".switch-encrypt").removeClass("btn-dark");
  $(".switch-encrypt").addClass("btn-light");
  $(".switch-decrypt").addClass("btn-dark");
  window.sessionStorage.setItem("encrypt", 1);
}

function switchDecrypt(){
  $(".switch-decrypt").removeClass("btn-dark");
  $(".switch-decrypt").addClass("btn-light");
  $(".switch-encrypt").addClass("btn-dark");
  window.sessionStorage.setItem("encrypt", 0);
}

function switchUpload(){
  $(".paste").addClass("hide");
  $(".upload").removeClass("hide");
  $(".switch-paste").removeClass("btn-dark");
  $(".switch-paste").addClass("btn-light");
  $(".switch-upload").addClass("btn-dark");
  window.sessionStorage.setItem("upload", 1);
}

function switchPaste() {
  $(".upload").addClass("hide");
  $(".paste").removeClass("hide");
  $(".switch-upload").removeClass("btn-dark");
  $(".switch-upload").addClass("btn-light");
  $(".switch-paste").addClass("btn-dark");
  window.sessionStorage.setItem("upload", 0);
}


const dropArea = document.querySelector(".drag-area"),
  dragText = dropArea.querySelector(".drag-area-context"),
  button = dropArea.querySelector(".a-choose-file"),
  input = dropArea.querySelector(".upload-file");
let file;

button.onclick = () => {
  input.click();
}

input.addEventListener("change", function () {
  file = this.files[0];
  dropArea.classList.add("active");
  $(".btn-dark-small").removeClass("disabled");
  showFile();
});


dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea.classList.add("active");
  dragText.textContent = "Release to Upload File";
  $(".choose-file").css({
    display: 'block'
  });
  $(".drag-area").css({
    border: '2px solid black'
  });
});

dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("active");
  dragText.textContent = "Drag & Drop to Upload File";
  $(".drag-area").css({
    border: '2px dashed #666666ff'
  });
});

dropArea.addEventListener("drop", (event) => {
  event.preventDefault();
  file = event.dataTransfer.files[0];
  showFile();
});

function showFile() {
  let fileType = file.type;
  let validExtensions = ["text/plain"];
  if (validExtensions.includes(fileType)) {
    $(".drag-area").css({
      border: '2px solid green'
    });
    dragText.textContent = "File Uploaded Successfully";
    $(".choose-file").css({
      display: 'none'
    });
  } else {
    dropArea.classList.remove("active");
    $(".btn-dark-small").addClass("disabled");
    dragText.textContent = "Drag & Drop to Upload File";
    $(".choose-file").css({
      display: 'block'
    });
    $(".drag-area").css({
      border: '2px solid red'
    });
    Swal.fire(
      'Oops!',
      'Please upload the text file',
      'error'
    );
  }
}

saveState();