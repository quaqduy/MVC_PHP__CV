<link rel="stylesheet" href="/MVCPHP/CV/MVC/public\css/home.css"> 
<script src="/MVCPHP/CV/MVC/public/js/home.js" defer></script>

<div class="container">
    <div id='CV' class="row">
        <div id='leftCV' class="col-4">
            <div class="row">
                <div class='col-12'>
                    <img id='avatar' src="/MVCPHP/CV/MVC/public/img/avatar.jpg"alt="AVATAR" >
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
                                <td>0836060368</td>
                            </tr>
                            <tr>
                                <td style='width: 30px;'><i class="fa-solid fa-envelope text-white"> </i></td>
                                <td>duycnttdo@gmail.com</td>
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
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                        <div class='careerObjective_content'>
                            dfkldjfkdklfjksjdfjsjdflkljlj
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='education'>
                        <div class='itemBox__title'>
                            <h3>education</h3>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                        <div class='education_content'>
                            sdsdsdsdsdsdsdsds
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='tech-proficiencies'>
                        <div class='itemBox__title'>
                            <h3>technical proficiencies</h3>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                        <div class='tech-proficiencies_content'>
                            sdsdsdsdsdsdsdsds
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Model -->
    <!-- Button trigger modal -->
    <?php 

        if(isset($_SESSION["password"])){
            if($_SESSION['password'] === ''){
                ?>
                    <button id='passWordModelBtn' type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modelCheckPass"></button>
                <?php
            }
        }

    ?>

    <!-- Modal -->
    <form action="/mvcphp/CV/home/login" method="POST">
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
                        <button type="submit" class="btn btn-outline-dark">SEND</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>  