var menuPosition = "right";
var menu = document.querySelector("#menu");
var bt = document.querySelector("#hamburger_icon");

initMenu();
bt.addEventListener("click", function(){
    if ( menu.style.display=="none"){
        menu.style.display = "block";
        menu.querySelector('li').style.marginTop = (bt.offsetTop + bt.offsetHeight + 10)+ "px";
        this.classList.add("open");
        this.classList.add(".bt-menu-open");
    } else {
        menu.style.display = "none";
        this.classList.remove(".bt-menu-open");
        this.classList.remove("open");


    };
});

window.onload = function(){
    console.log("chargement ok");   


    
}
// bt.classList.add("open");
function initMenu(){
    if (window.innerWidth<992){
        menu.style.display = "none";
        bt.style.display = "inline-block";
        menu.classList.add('full-screen-menu');
        menu.querySelector('li').style.marginTop = "none";
    }else{
        bt.style.display = "none";
        menu.style.display = "block";
        menu.classList.remove('full-screen-menu')

    }
}

window.addEventListener("resize", function(){
    initMenu();
});