const myDropdown = document.getElementById('myDropdown')
myDropdown.addEventListener('show.bs.dropdown', event => {
  console.log(event);
})
document.getElementById('dropbtn').addEventListener('click',() =>{
        let dropdown = document.getElementById('myDropdown');
        dropdown.style.transform = "translate(-145px, 22px)";
        console.log(dropdown);    
})