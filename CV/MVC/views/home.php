<link rel="stylesheet" href="/MVCPHP/CV/MVC/public\css/home.css"> 
<script src="/MVCPHP/CV/MVC/public/js/home.js" defer></script>

<div class="container">
    <div id='CV' class="row">
        <div id='leftCV' class="col-4">
            <div class="row">
                <div class='col-12'>
                    <div id='avatar_float'>
                        <img id='avatar' src="/MVCPHP/CV/MVC/public/img/avatar.jpg"alt="AVATAR" >
                        <i id='editAvater_icon' class="fa-solid fa-user-pen"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class='col-12'>
                    <ul id='aboutMe'>
                        <h1>About me</h1>
                        <li>Date of birth: 25/09/2001</li>
                        <li>Gender: Male</li>
                        <li>Birth Place: DALAT, LAM DONG</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class='col-12'>
                    <ul id='contact'>
                        <h1>Contact</h1>
                        <table>
                            <tr>
                                <td style='width: 30px;'><i class="fa-solid fa-phone text-white"> </i></td>
                                <td class='text-white'>0836060368</td>
                            </tr>
                            <tr>
                                <td style='width: 30px;'><i class="fa-solid fa-envelope text-white"> </i></td>
                                <td class='text-white'>duycnttdo@gmail.com</td>
                            </tr>
                        </table>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class='col-12'>
                    <ul id='interests'>
                        <h1>interests</h1>
                        <li>Technology and Innovation</li>
                        <li>Books</li>
                        <li>Coffee</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class='col-12'>
                    <ul>
                        <h1>hobbies</h1>
                        <table>
                            <tr>
                                <td style="padding: 20px 40px;"><i class="fa-solid fa-headphones text-white fa-2x"></i></td>
                                <td style="padding: 20px 40px;"><i class="fa-solid fa-video fa-2x text-white"></i></td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 40px;"><i class="fa-solid fa-plane fa-2x text-white"></i></td>
                                <td style="padding: 20px 40px;"><i class="fa-solid fa-futbol fa-2x text-white"></i></td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 40px;"><i class="fa-solid fa-camera-retro fa-2x text-white"></i></td>
                            </tr>
                        </table>
                    </ul>
                </div>
            </div>
        </div>
        <div id='rightCV' class="col-8">
            <div class='row rightCV_header'>
                <h2>Nguyen Quang Duy</h2>
                <div id='major'>
                    <div id='major_title'><div style="width: 200px">Web developer </div> <div id='headerLine'></div></div>
                </div>
            </div>
            <div class='row rightCV_body'>
                <div class='row'>
                    <div class='careerObjective'>
                        <div class='itemBox__title'>
                            <h3>Career Objective</h3>
                            <?php 
                                if(isset($data['isLogin']) && !$data['isLogin']){
                                    ?>
                                    <i class="fa-solid fa-plus addContent_btn"></i>
                                    <?php
                                }else{
                                    ?>
                                    <a href="/MVCPHP/CV/Home/create/Career_objective">
                                        <i class="fa-solid fa-plus addContent_btn"></i>
                                    </a>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class='careerObjective_content itemBox_content'>
                            <ul>
                                <?php 
                                if(isset($data['contents']['career_objectives_arr'])){
                                    foreach ($data['contents']['career_objectives_arr'] as $careerObjective_content) {
                                        ?>
                                            <li>
                                                <span content_type='1' content_index='<?= $careerObjective_content->id ?>' style ='font-style: italic'><?= $careerObjective_content->content ?></span>
                                                <i class="fa-solid fa-pen-to-square modify_btn" onclick="
                                                
                                                    home.content_handler(event.target,'modify');
                                                
                                                "></i>
                                                <i class="fa-solid fa-trash deleteContent_btn" onclick="
                                        
                                                    home.content_handler(event.target,'delete');

                                                "></i>
                                            </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='education'>
                        <div class='itemBox__title'>
                            <h3>education</h3>
                            <?php 
                                if(isset($data['isLogin']) && !$data['isLogin']){
                                    ?>
                                    <i class="fa-solid fa-plus addContent_btn"></i>
                                    <?php
                                }else{
                                    ?>
                                     <a href="/MVCPHP/CV/Home/create/Education"><i class="fa-solid fa-plus addContent_btn"></i></a>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class='education_content itemBox_content'>
                            <ul>
                            <?php 
                            if(isset($data['contents']['educations_arr'])){
                                foreach ($data['contents']['educations_arr'] as $education_content) {
                                    ?>
                                        <li>
                                            <span content_type='2' content_index='<?= $education_content->id ?>' style ='font-style: italic'><?= $education_content->content ?></span>
                                            <i class="fa-solid fa-pen-to-square modify_btn" onclick="
                                            
                                                home.content_handler(event.target,'modify');
                                            
                                            "></i>
                                            <i class="fa-solid fa-trash deleteContent_btn" onclick="
                                            
                                                home.content_handler(event.target,'delete');
    
                                            "></i>
                                        </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='tech-proficiencies'>
                        <div class='itemBox__title'>
                            <h3>technical proficiencies</h3>
                            <?php 
                                if(isset($data['isLogin']) && !$data['isLogin']){
                                    ?>
                                    <i class="fa-solid fa-plus addContent_btn"></i>                                     
                                    <?php
                                }else{
                                    ?>
                                    <a href="/MVCPHP/CV/Home/create/Technical_proficiencie"><i class="fa-solid fa-plus addContent_btn"></i></a>
                                    <?php
                                }
                            ?>                            
                        </div>
                        <div class='tech-proficiencies_content itemBox_content'>
                            <ul>
                            <?php 
                            if(isset($data['contents']['technical_proficiencies_arr'])){
                                foreach ($data['contents']['technical_proficiencies_arr'] as $tech_proficiencies_content) {
                                    ?>
                                        <li>
                                            <span content_type='3' content_index='<?= $tech_proficiencies_content->id ?>' style ='font-style: italic'><?= $tech_proficiencies_content->content ?></span>
                                            <i class="fa-solid fa-pen-to-square modify_btn" onclick="
                                            
                                                home.content_handler(event.target,'modify');
                                            
                                            "></i>
                                            <i class="fa-solid fa-trash deleteContent_btn" onclick="
                                            
                                                home.content_handler(event.target,'delete');
    
                                            "></i>
                                        </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
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
    <button id='deleteModelBtn' type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modelDeleteContent"></button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit content here</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <textarea name='newContent' content_id='' class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Contents</label>
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

    <!-- confirm delete Modal -->
    <form id='deleteContentForm' action="" method="POST">
        <div class="modal fade" id="modelDeleteContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            Do you want to delete this content ??
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-dark">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Img Upload Modal -->
    <form id='modelImg' action="/MVCPHP/CV/Home/update_profile_image" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modelImgContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload new profile picture here !!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <div class="mb-3">
                                <input name='avatar' class="form-control" type="file" id="formFile" accept="image/*">
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
</div> 