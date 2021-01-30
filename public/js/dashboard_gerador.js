ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}
ready(() => {

    function GeraHTML(div,conteudo){
        div.innerHTML(conteudo);
    }














});