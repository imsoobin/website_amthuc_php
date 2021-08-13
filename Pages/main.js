
// function slideShow(){
//     setTimeout(slideShow, 1000);
// }
// slideShow();

// var slide_img = document.querySelector('.imgs');
// var images = ['banner-6.jpg', 'banner-2.jpg', 'banner-1.jpg', 'banner-3.jpg', 'banner-4.jpg', 'banner-5.jpg','banner-7.jpg'];
// var i = 0;

// function prev(){  
//     if(i <= 0)
//     i = images.length;
//     i--;
//     return setImg();
    
// }
// function next(){
//     if(i >= images.length - 1) 
//     i = -1;
//     i++;
//     return setImg();
// }
// function setImg(){
//     return slide_img.setAttribute('src', '../images/' + images[i]);
// }

var indexVl = 0;
function slideShow(){
    setTimeout(slideShow, 3000);
    var x ;
    const img = document.querySelectorAll(".imgs");
    for(x = 0; x < img.length; x++){
        img[x].style.display = "none";
    }
    indexVl ++;
    if(indexVl > img.length){
        indexVl = 1;
    }
    img[indexVl - 1].style.display = 'block';
}
slideShow();
