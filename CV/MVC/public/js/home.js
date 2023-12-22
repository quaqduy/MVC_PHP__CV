const modify_btn = document.querySelectorAll('.rightCV_body .modify_btn');
const addContent_btn = document.querySelectorAll('.rightCV_body .addContent_btn');
const deleteContent_btn = document.querySelectorAll('.rightCV_body .deleteContent_btn');
const passWordModelBtn = document.querySelector('#passWordModelBtn');
const modifyModelBtn = document.querySelector('#modifyModelBtn');
const editContentForm = document.querySelector('#editContentForm');
const deleteContentForm = document.querySelector('#deleteContentForm');
const deleteModelBtn = document.querySelector('#deleteModelBtn');
const avatar_float = document.querySelector('#avatar_float');
const imgModelBtn = document.querySelector('#imgModelBtn');

const home = {
    content_btn_process(){
        addContent_btn.forEach((btn,index)=>{
            btn.addEventListener('click',(e)=>{
                home.content_handler(e.target,'add');
            })
        })

        avatar_float.addEventListener('click',(e)=>{
            home.content_handler(e.target,'img');
        })
    },
    content_handler(target,action){
        if(passWordModelBtn){
            passWordModelBtn.click();
            //Block a tag
            const aTags = document.querySelectorAll('#rightCV a');
        }else{
            if(action == 'modify'){
                home.modify_process(target);
            }else if(action == 'delete'){
                home.delete_process(target);
            }else if(action == 'img'){
                home.imgHandle();
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
        const contentId = home.take_target_from_btnClick(target,'span',1).getAttribute('content_index');
        let contentType = home.take_target_from_btnClick(target,'span',1).getAttribute('content_type');
        //set textarea value = li tag content
        floatingTextarea2.textContent = current_content;
        //set form action
        if(contentType == '1'){
            contentType = 'Career_objective';
        }else if(contentType == '2'){
            contentType = 'Education';
        }else if(contentType == '3'){
            contentType = 'Technical_proficiencie';
        }
        editContentForm.action = `/mvcphp/CV/home/update/${contentType}/${contentId}`;

        if(modifyModelBtn){
            modifyModelBtn.click();
        }
    },
    delete_process(target){
        const contentId = home.take_target_from_btnClick(target,'span',1).getAttribute('content_index');
        let contentType = home.take_target_from_btnClick(target,'span',1).getAttribute('content_type');
        //set form action
        if(contentType == '1'){
            contentType = 'Career_objective';
        }else if(contentType == '2'){
            contentType = 'Education';
        }else if(contentType == '3'){
            contentType = 'Technical_proficiencie';
        }
        deleteContentForm.action = `/mvcphp/CV/home/delete/${contentType}/${contentId}`;
        if(modifyModelBtn){
            deleteModelBtn.click();
        }
    },
    imgHandle(){
        imgModelBtn.click();
    },
    start(){
        this.content_btn_process();
    }
}

home.start();