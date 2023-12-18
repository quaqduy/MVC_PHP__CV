const modify_btn = document.querySelectorAll('.rightCV_body i');
const passWordModelBtn = document.querySelector('#passWordModelBtn');

console.log(modify_btn);

modify_btn.forEach((btn,index)=>{
    btn.addEventListener('click',(e)=>{
        console.log(index);
        if(passWordModelBtn){
            passWordModelBtn.click();
        }
    })
})