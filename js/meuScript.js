let usuario = document.querySelector('.usuario').value;
let senha = document.querySelector('.senha').value

console.log(usuario)
console.log(senha)

let login = ()=>{

if(usuario === "Matheus" && senha === "1234"){
    //window.location.href ='pesquisarOcorrencia.php';
    alert('chegou aqui')
}else{
    alert('Deu merda');
}
}

document.querySelector('.botao button').addEventListener('click', ()=>{
    alert("clicou");
})



