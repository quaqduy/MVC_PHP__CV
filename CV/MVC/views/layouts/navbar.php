<link rel="stylesheet" href="/MVCPHP/CV/MVC/public/css/css_layouts/leftNavbar.css">
<script src="/MVCPHP/CV/MVC/public/js/navbar.js" defer></script>

<div id="left-nav">
    <h1 class='navbar_title'>
        <img src="/MVCPHP/CV/MVC/public/img/logo/dashBoard.png" alt="dashBoardLogo">
        <span style='
                margin-left:-55px;

        '>My</span>
        <span style='
                color: #fd3978;
                
        '>CV</span>
    </h1> 
    <div id='nav_list'>
        <div class="navItem">
            <table>
                <tr>
                    <td style='width: 30px;'><i class="fa-solid fa-house"></i></td>
                    <td>
                        <a href="/MVCPHP/CV/Home">DashBoard</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="navItem">
            <table>
                <tr>
                    <td style='width: 30px;'><i class="fa-solid fa-file"></i></td>
                    <td>
                        <a href="/MVCPHP/CV/Project">Projects</a>
                    </td>
                </tr>
            </table>
        </div>

        <?php

            if(isset($data['isLogin']) && $data['isLogin']){
                ?>
                    <div class="navItem">
                        <table>
                            <tr>
                                <td style='width: 30px;'><i class="fa-solid fa-right-from-bracket"></i></td>
                                <td>
                                    <a href="/MVCPHP/CV/Home/logout">Logout</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php
            }

        ?>
    </div>
</div>