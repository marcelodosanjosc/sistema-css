


let cont = 0;

let like = document.querySelector('.like');
let qtd = document.querySelector('.qtd-like');

if (like) {
    like.addEventListener('click', () => {
        if (qtd.classList.contains('qtd-like-on')) {
            cont++;
            qtd.classList.remove('qtd-like-on');
            qtd.innerHTML = cont;
            like.querySelector('i').style.color = "#396eea";
        } else {
            qtd.classList.add('qtd-like-on');
            like.querySelector('i').style.color = "#000";
            cont--;
            qtd.innerHTML = '';
        }
    });
}

/* Comentario */

let comentario = document.querySelector('.comentario');

if(comentario){
    comentario.addEventListener('click', ()=>{
       if(document.querySelector('.comentar').classList.contains('comentario-off')){
        document.querySelector('.comentar').classList.remove('comentario-off');
       }else{
        document.querySelector('.comentar').classList.add('comentario-off');
       }
    }); 
}