let modify_btn = document.querySelectorAll('.rightCV_body .modify_btn');
const addContent_btn = document.querySelectorAll('.rightCV_body .addContent_btn');
const deleteContent_btn = document.querySelectorAll('.rightCV_body .deleteContent_btn');
const passWordModelBtn = document.querySelector('#passWordModelBtn');
const modifyModelBtn = document.querySelector('#modifyModelBtn');
const editContentForm = document.querySelector('#editContentForm');

const home = {
    content_btn_process(){
        addContent_btn.forEach((btn,index)=>{
            btn.addEventListener('click',(e)=>{
                home.content_handler(e.target,'add');
            })
        })

        deleteContent_btn.forEach((btn,index)=>{
            btn.addEventListener('click',(e)=>{
                home.content_handler(e.target,'delete');
            })
        })
    },
    content_handler(target,action){
        if(passWordModelBtn){
            passWordModelBtn.click();
        }else{
            if(action == 'modify'){
                home.modify_process(target);
            }else if(action == 'delete'){
                home.delete_process(target);
            }
        }
    },
    take_target_from_btnClick(target,type,parent_level){
        let parentElement = null;
        let currentTarget = target;
        for(let i = 0; i < parent_level ; i++){
            parentElement = currentTarget.parentNode;
            currentTarget = parentElement;
        }
        const child_target = parentElement.querySelector(`.itemBox_content ${type}`);
        return child_target;
    },
    modify_process(target){
        const current_content = home.take_target_from_btnClick(target,'span',1).innerHTML;
        //set textarea value = li tag content
        floatingTextarea2.textContent = current_content;
        //set form action
        editContentForm.action = "/mvcphp/CV/home/update/";


        if(modifyModelBtn){
            modifyModelBtn.click();
        }
    },
    delete_process(){

    },
    start(){
        this.content_btn_process();
    }
}

home.start();