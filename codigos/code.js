document.getElementById('dropbtn').addEventListener('click',() =>{
        let dropdown = document.getElementById('myDropdown');
        dropdown.style.transform = "translate(-145px, 40px)";
}); 

chkfunc = document.getElementById('chkfunc');
function getchk(){
        if(chkfunc.checked){
                return "funcionario";
        }
        else{
                return "cliente";
        }
}
function alteraName(obj){
        let tipo = document.getElementById('tipo');
        if (obj == "cliente") {
                tipo.setAttribute('name', "cliente");
        }
        if(obj == "funcionario"){
                tipo.setAttribute('name', "funcionario");      
        }
}
window.addEventListener('load',() => {
        alteraName(getchk());
})
chkfunc.addEventListener('click',() => {
        alteraName(getchk());
})
