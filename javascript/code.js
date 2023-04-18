chkfunc = document.getElementById('chkfunc');
function getchk() {
        if (chkfunc.checked) {
                return "funcionario";
        }
        else {
                return "cliente";
        }
}

function alteraName(obj) {
        let tipo = document.getElementById('tipo');
        if (obj == "cliente") {
                tipo.setAttribute('value', "cliente");
        }
        if (obj == "funcionario") {
                tipo.setAttribute('value', "funcionario");
        }
}

window.addEventListener('load', () => {
        alteraName(getchk());
})

chkfunc.addEventListener('click', () => {
        alteraName(getchk());
})
