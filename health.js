let counselors = document.querySelectorAll(".team");
let card = document.querySelectorAll(".sreviceCard");

let count = 0;

counselors.forEach(function(card, index) {
    card.style.left = `${index * 100}%`;
});

function myFun() {
    counselors.forEach(function(curValue) {
        curValue.style.transform = `translateX(-${count * 100}%)`;
    });
}

setInterval(function(){
    count++
    if(count==counselors.length){
        count=0;
    }
myFun()
},3000)
//serviceCard
card.forEach(function(curCard){
    curCard.addEventListener("click",function(){
    
    })
})

