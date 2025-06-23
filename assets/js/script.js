let modalData = document.querySelector(".modal-data");
modalData.style.display = "flax";
setTimeout(()=>{
    modalData.style.display = "none";
},5000);


let addNewNote = document.querySelector("#addNewNote");
let Addbtn = document.querySelector("#Addbtn");
let cancel = document.querySelector("#cancel");

Addbtn.addEventListener("click",showHide);
cancel.addEventListener("click",showHide);
function showHide(){
    if(addNewNote.style.display === "flex"){
        addNewNote.style.display = "none";
    } else{
        addNewNote.style.display = "flex";
    }
}