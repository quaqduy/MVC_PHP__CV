const itemBox_imgs = document.querySelectorAll('.itemBox_img');
const editBtns = document.querySelectorAll('.editBtn');
const deleteBtns = document.querySelectorAll('.deleteBtn');
const addingBtn = document.querySelector('.itemProject_box--adding');

const modelLoginBtn = document.querySelector('#passWordModelBtn');

const projectPage = {
    projectEventHandler(){
        itemBox_imgs.forEach((item) => {
            item.addEventListener('click',(e)=>{
                projectPage.processing('img',e.target);
            })
        })

        editBtns.forEach((item) => {
            item.addEventListener('click',(e)=>{
                projectPage.processing('edit',e.target);
            })
        })

        deleteBtns.forEach((item) => {
            item.addEventListener('click',(e)=>{
                projectPage.processing('delete',e.target);
            })
        })

        addingBtn.addEventListener('click',(e)=>{
            projectPage.processing('add',e.target);
        })
    },
    processing(action,target){
        if(modelLoginBtn){
            modelLoginBtn.click();
        }else{
            if(action === 'add'){
                const addItemBtn = document.querySelector('#addItemBtn');
                addItemBtn.click();
            }else if(action === 'delete'){
                target.parentElement.querySelector('a').click();
            }else if(action === 'edit'){
                const modifyModelBtn = document.querySelector('#modifyModelBtn');
                const editContentForm = document.querySelector('#editContentForm');

                const idItem = target.getAttribute('item_id');
                editContentForm.action = `/MVCPHP/CV/Project/edit/${idItem}`;

                projectPage.fillForm(idItem,editContentForm);

                modifyModelBtn.click();
            }else if(action === 'img'){
                const imgModelBtn = document.querySelector('#imgModelBtn');
                const fileId = document.querySelector('#fileId');
                fileId.value = target.getAttribute('item_id');
                imgModelBtn.click();
            }
        }
    },
    fillForm(itemId,model){
        const itemBoxs = document.querySelectorAll('.itemProject_box');

        let itemBox;

        itemBoxs.forEach((item) => {
            if(item.getAttribute('item_id') == itemId){
                itemBox = item;
            }
        })
        const formData = {
            title : itemBox.querySelector('.itemBox_header').innerText,
            des : itemBox.querySelector('.desFill').innerText,
            linkProduct : itemBox.querySelector('.itemBox_product a').getAttribute('href'),
            linkCode : itemBox.querySelector('.itemBox_link a').getAttribute('href'),
        }

        //set input value
        model.querySelector("input[name = 'title']").value = formData.title;
        model.querySelector("input[name = 'des']").value = formData.des;
        model.querySelector("input[name = 'linkProduct']").value = formData.linkProduct;
        model.querySelector("input[name = 'linkCode']").value = formData.linkCode;
    },
    start(){
        this.projectEventHandler();
    }
}

projectPage.start();