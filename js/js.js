
const button = document.querySelector("button")
const modal = document.querySelector("dialog")
const buttonClose = document.querySelector("dialog button")

button.onclick = function (){
    modal.showModal()
}

buttonClose.onclick = function() {
    modal.close()
}

function deleteImage(x){
    var  conf = confirm('ok?');
    if(conf == true){
        window.location = "location:../index.php";
    }

}