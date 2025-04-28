let accordion =document.querySelector(".accordion");
let accordionItems = accordion.querySelectorAll(".item");
for(let i=0; i<accordionItems.length; i++){
    let questionItem=accordionItems[i].querySelector(".question");
    questionItem.addEventListener("click",function(){

        if(accordionItems[i].classList.contains("active")){
            accordionItems[i].classList.remove("active")

        }
        else{
            try{
                accordion.querySelector(".active").classList.remove("active");
            }catch(msg){}
            accordionItems[i].classList.add("active");
        }

    });

}