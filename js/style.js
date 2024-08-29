
function shownavcard(){
    var subnav = document.getElementById('nav-card')
    
    if(subnav.style.display=="none"){
        subnav.style.display="block"
    }else{
        subnav.style.display="none"
    }
}
function shownavcard2(){
    var subnav = document.getElementById('nav-card-2')
    
    if(subnav.style.display=="none"){
        subnav.style.display="block"
    }else{
        subnav.style.display="none"
    }
}
function showDetail(){
    var detail = document.getElementById("mail-details")
    if(detail.style.display=="none"){
        detail.style.display="block"
    }else{
        detail.style.display="none"
    }
}

// back to top
let myButton=document.getElementById('btn-back-to-top')
window.onscroll=function(){
    scrollFunction()
}
function scrollFunction(){
    if(document.body.scrollTop >20 || document.documentElement.scrollTop >20){
        myButton.style.display='block'
    }else{
        myButton.style.display='none'
    }
}

function showHide(){
    var menu = document.getElementById("showhide")
    if(menu.style.display==="none"){
        menu.style.display="block"
    }else{
        menu.style.display="none"
    }
}
document.getElementById('btn-back-to-top').onclick=function(){
    document.body.scrollTop=0   
    document.documentElement.scrollTop=0
}
// input type date
document.getElementById('input-date').onclick=function(){
    document.getElementById('input-date').setAttribute("type", "date")
}
// input type date
document.getElementById('input-date-2').onclick=function(){
    document.getElementById('input-date-2').setAttribute("type", "date")
}
// end




// show tour details
document.getElementById('btn_detail').onclick=function(){
    document.getElementById('detail').style.display='block'
    document.getElementById('itiranary').style.display='none'
    document.getElementById('tour_image').style.display='none'
}
// show tour iterinary
document.getElementById('btn_iterinary').onclick=function(){
    document.getElementById('detail').style.display='none'
    document.getElementById('itiranary').style.display='block'
    document.getElementById('tour_image').style.display='none'
}
// show tour images
document.getElementById('btn_photo').onclick=function(){
    document.getElementById('detail').style.display='none'
    document.getElementById('itiranary').style.display='none'
    document.getElementById('tour_image').style.display='block'
}