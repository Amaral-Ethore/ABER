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
// chkfunc.addEventListener('click', () => {
//         alert(getchk());
// });
function alteraName(obj){
        let inputmail = document.getElementById('mail');
        let inputsenha = document.getElementById('senha');
        if (obj == "cliente") {
                inputmail.setAttribute('name', "mailclie");
                inputsenha.setAttribute('name', "senhaclie")
        }
        if(obj == "funcionario"){
                inputmail.setAttribute('name', "mailfunc");
                inputsenha.setAttribute('name', "senhafunc")        
        }
        alert(obj);
}
chkfunc.addEventListener('click',() => {
        alteraName(getchk());
})
