const navItems = document.querySelectorAll('.navItem');
const linkBtns = document.querySelectorAll('.navItem a');

navItems.forEach((item,index) => {
    item.addEventListener('click',(e)=>{
        linkBtns[index].click();
    })
})