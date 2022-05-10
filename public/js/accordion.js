// VARIABLE DE CONFIGURATION
var contentOpenClose = true; 
var closeOtherContent = true;

var contents = document.querySelectorAll(".accordion-content");

for(var i=0; i<contents.length; i++){
}

contents.forEach(content => {
    content.setAttribute("data-height", content.offsetHeight)
    content.style.height = "0px";

});
var titles = document.querySelectorAll(".accordion-title");
titles.forEach(title => {
      title.addEventListener("click",function(){
          var content = this.parentNode.querySelector(".accordion-content"
          );
          if(closeOtherContent==true){
              for(var i=0; i<contents.length; i++){
                  if(contents[i] != content){
                      // Alors on passe sa hauteur à zéro
                      contents[i].style.height = "0px";
                  }
              }
          }


        var h = 0;
        if(content.offsetHeight==0){
            h = content.getAttribute("data-height");
        }
        if(contentOpenClose==false){
            h = content.getAttribute("data-height");
        }
        if(h==0){
        }
      
          content.style.height = h + "px";
      });
});

window.addEventListener("resize", function(){
  console.log("coucou");
contents.forEach( content => {
  content.style.height  = "auto";
  content.setAttribute("data-height", content.offsetHeight);
  content.style.height = "0px";
});
});

