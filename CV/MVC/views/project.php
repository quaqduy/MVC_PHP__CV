<link rel="stylesheet" href="/MVCPHP/CV/MVC/public/css/project.css">
<script src="/MVCPHP/CV/MVC/public/js/project.js" defer></script>
<div class='container'>
    <div class='page_header'>MY PROJECTS</div>
    <div class='page_header'>My Github profile: <a href="https://github.com/quaqduy">https://github.com/quaqduy</a></div>
    <div class='row'>
        <?php 
            
            if(isset($data['projects'])){
                foreach($data['projects'] as $project){
                    $project_id = $project->id;
                    $project_pathImg = $project->pathImg;
                    $project_title = $project->title;
                    $project_des = $project->des;
                    $project_linkProduct = $project->linkProduct;
                    $project_linkCode = $project->linkCode;
                    ?>
                        <div class='col-4 '>
                            <div item_id = '<?= $project_id ?>' class='itemProject_box'>
                                <div item_id = '<?= $project_id ?>' class='itemBox_img'>
                                    <div class="editImgBtn">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </div>
                                    <img item_id = '<?= $project_id ?>' src="<?= $project_pathImg ?>" alt="">
                                </div>
                                <div class='itemBox_header'>
                                    <?= $project_title ?>
                                </div>
                                <div class='itemBox_des'>
                                    <b><i>Description: </i></b> <span class='desFill'><?= $project_des ?></span>
                                </div>
                                <div class='itemBox_product'>
                                    <b><i>Product: </i><a href="<?= $project_linkProduct ?>"> My product</a></b>
                                </div>
                                <div class='itemBox_link'>
                                    <b><i>Link project: </i><a href="<?= $project_linkCode ?>"> My code</a></b>
                                </div>
                                <div class='itemProject_box--handle'>
                                    <button item_id = '<?= $project_id ?>' type="button" class="btn btn-secondary editBtn">Edit</button>
                                    <button type="button" class="btn btn-danger deleteBtn">Delete</button>
                                    <a class='d-none' href="/MVCPHP/CV/Project/delete/<?= $project_id ?>"></a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }
        
        ?>
        <div class='col-4 '>
            <div class='itemProject_box--adding'>
                <div class="itemProject_box--horizontal"></div>
                <div class="itemProject_box--vertical"></div>
            </div>
            <a id='addItemBtn' class='d-none' href="/MVCPHP/CV/Project/create"></a>
        </div>
    </div>
</div>
<!-- Model -->
    <!-- Button trigger modal -->
    <?php 
        if(isset($data['isLogin']) && !$data['isLogin']){
            ?>
                <button id='passWordModelBtn' type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modelCheckPass"></button>
            <?php
        }

    ?>
    <button id='modifyModelBtn' type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modelModifyContent"></button>
    <button id='imgModelBtn' type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modelImgContent"></button>

    <!-- login Modal -->
    <form action="/MVCPHP/CV/Home/login" method="POST">
        <div class="modal fade" id="modelCheckPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please enter your password to change CV information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" type="password" name="password" value="" placeholder="Password here">
                        <?php 
                            if(isset($data["errorContent"]) && $data["errorContent"] !== ''){
                                ?>
                                    <div class='text-danger fw-medium'><?= $data["errorContent"] ?></div>
                                    <script>
                                        document.querySelector('#passWordModelBtn').click();
                                    </script>
                                <?php 
                            } 
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-dark">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- edit Modal -->
    <form id='editContentForm' action="" method="POST">
        <div class="modal fade" id="modelModifyContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit project information here</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Title</span>
                            <input type="text" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1" name='title'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Description</span>
                            <input type="text" class="form-control" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1" name='des'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Link Product</span>
                            <input type="text" class="form-control" placeholder="Link Product" aria-label="Username" aria-describedby="basic-addon1" name='linkProduct'>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Link code</span>
                            <input type="text" class="form-control" placeholder="Link code" aria-label="Username" aria-describedby="basic-addon1" name='linkCode'>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-dark">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Img Upload Modal -->
    <form id='modelImg' action="/MVCPHP/CV/Project/update_project_image" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modelImgContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload new project picture here !!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <div class="mb-3">
                                <input name='projectImg' class="form-control" type="file" id="formFile" accept="image/*">
                                <input name='id' class="form-control d-none" type="text" id="fileId">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-dark">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </form>