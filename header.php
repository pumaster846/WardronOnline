<?php
    if ( $_SESSION['authorization'] == true ) {
        $sql = "SELECT * FROM `users`
        WHERE `userID` = ".$_SESSION['userID'];
        $data = $pdo->query($sql);
        $userData = $data->fetchAll();

        $sql5 = "SELECT * FROM `users`
        INNER JOIN `user_works` ON `users`.`userID` = `user_works`.`userID`
        INNER JOIN `clothes` ON `user_works`.`clothesID` = `clothes`.`clothesID`
        WHERE `user_works`.`userID` = ".$_SESSION['userID'];
        $data5 = $pdo->query($sql5);
        $userWorks = $data5->fetchAll();
    }
?>
<style>
.header-menu {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 18px;
}
.menu-item {
    display: flex;
    align-items: center;
    color: #fff;
    max-height: 60px;
}
.menu-item > span {
    margin: 0 5px;
}
.menu-link {
    position: relative;
    text-transform: uppercase;
}
.menu-link:hover > a {
    text-decoration: underline;
}
.menu-link > .fa-caret-right {
    font-size: 16px;
    transition: transform .4s;
}
.menu-item > .menu-link:not(:first-child) {
    margin-left: 80px;
}
.fa-caret-right.active {
    transform: rotate(90deg);
}
.menu-catalog {
    display: none;
    position: absolute;
    width: 200px;
    background-color: #000;
    left: 0;
    padding: 3px;
}
.menu-catalog.active {
    display: block;
    animation: active-modal 0.6s forwards;
}
.menu-catalog-item:not(:first-child) {
    margin-top: 5px;
}
.menu-catalog-item {
    display: flex;
    justify-content: space-between;
    padding: 3px 10px;
    border-radius: 3px;
    cursor: pointer;
}
.menu-catalog-item:hover > .fa-angle-right {
    animation: hover-catalog-item 0.6s;
}
@keyframes hover-catalog-item {
    0% { transform: translateX(0); }
    50% { transform: translateX(5px); }
}
.item-link {
    text-transform: none;
}

.authorization-btns {
    display: flex;
    align-items: center;
}
.private-office,
.logout,
.login {
    cursor: pointer;
    padding: 5px;
}
.private-office:hover,
.logout:hover,
.login:hover {
    border-radius: 5px;
    background-color: #555;
}
.logout {
    margin-left: 10px;
}

.personal-data {
    display: flex;
    margin-bottom: 8px;
}
.personal-data-title {
    font-size: 18px;
    margin-right: 6px;
}
.personal-data-gender {
}
.personal-data-parametres-block {
    padding: 3px;
    margin: 0;
    border: 0;
    background-color: rgba(204, 204, 204, 0.3);
}
.user-input-block {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 3px;
    padding: 0 5px;
    font-weight: 600;
}
.user-input-block:hover > .fa-angle-right {
    color: #c2552e;
}
.user-size-input {
    width: 45px;
    border-radius: 5px;
}
.personal-data-buttons-block {
    margin-top: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.btn-save-data {
    font-size: 15px;
    border: none;
    cursor: pointer;
    padding: 5px 10px;
    border-radius: 3px;
    color: #fff;
    background-color: #c2552e;
}
.btn-save-data:hover {
    background-color: #F86A38;
}
.btn-delete-account {
    font-size: 15px;
    border: none;
    cursor: pointer;
    border-radius: 3px;
    color: #000;
    background-color: #a00000;
    opacity: 60%;
}
.btn-delete-account:hover {
    color: #fff;
    background-color: rgb(145, 1, 1);
    opacity: 100%;
}

.user-works-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, 190px);
    gap: 10px;
}
.work-block {
    outline: 1px solid #555;
    border-radius: 3px;
}
.work-preview-img {
    height: 150px;
}
.work-buttons-panel {
    display: flex;
    border-top: 1px solid #000;
}
.panel-btn {
    width: 100%;
    cursor: pointer;
    height: 20px;
}
.user-personal-data-block {
    width: 200px;
    border-right: 2px solid #F86A38;
}
.content-title {
    font-size: 24px;
    text-align: center;
    font-family: "VelaSans", sans-serif;
    padding: 0 0 8px;
}
.user-works-block {
    width: 600px;
    margin-left: 10px;
}

.modal-dialog,
.privat-office {
    display: none;
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 2;
}
.modal-dialog.active,
.privat-office.active  {
    display: block;
    animation: active-modal 0.6s forwards;
}
@keyframes active-modal {
    from { opacity: 0; }
    to { opacity: 100%; }
}
.modal-content.visible {
    display: block;
}
.modal-content.unvisible {
    display: none;
}
.modal-content,
.private-office-content {
    width: 400px;
	position: relative;
	margin: 15% auto;
	border-radius: 10px;
    background-color: #fff;
    padding: 10px;
}
.private-office-content {
    display: flex;
    width: 800px;
}
.modal-header {
    font-size: 24px;
    text-align: center;
    font-family: "VelaSans", sans-serif;
    border-bottom: 2px solid #F86A38;
    padding: 0 0 8px;
}
.modal-body {
    margin-top: 16px;
}
.modal-body > fieldset {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.input-auth-block {
    margin-top: 8px;
    padding: 5px;
    outline: 1px solid #555;
    border-radius: 3px;
}
.input-auth-block.focus {
    outline: 2px solid #F86A38;
}
.authorization-icon {
    margin-right: 5px;
    font-size: 18px;
    color: #555;
    border-right: 1px solid #ccc;
}
.input-text {
    border: none;
    outline: none;
    font-size: 18px;
}

.btn-authorization {
    margin-top: 8px;
    padding: 10px 20px;
    border: 1px solid #555;
    border-radius: 3px;
    background: none;
    font-weight: 700;
    text-transform: uppercase;
    cursor: pointer;
}
.btn-authorization:hover {
    color:#000;
    animation: hover-btn 1s forwards;
}
@keyframes hover-btn {
    50% { padding: 10px 50px; border-radius: 20px; color: #fff; }
    100% { background-color: #F86A38; color: #fff; }
}
.subheader {
    border-top: 2px dotted #ccc;
    padding: 6px 0;
    margin-top: 8px;
    font-size: 18px;
}
.modal-error-message,
.modal-private-office-error-message {
    margin-top: 8px;
    color: #a00000;
    text-align: center;
}
@media screen and (max-width: 768px) {
    .private-office-content {
        width: 600px;
    }
    .btn-save-data {
        padding: 5px;
        font-size: 12px;
    }
}
@media screen and (max-width: 650px) {
    .menu-item > .menu-link:not(:first-child) {
        margin-left: 15px;
    }
    .private-office-content {
        width:350px;
    }
}
@media screen and (max-width: 515px) {
    .menu-item > a > svg {
        display: none;
    }
    .header-menu {
        padding: 10px 0;
    }
}
@media screen and (max-width: 410px) {
    .menu-link {
        font-size: 14px;
    }
    .modal-content, .private-office-content {
        width: 300px;
    }
    .user-works-container {
        grid-template-columns: repeat(auto-fit, 150px)
    }
    .work-preview-img > svg {
        width: 150px;
        height: 150px;
    }
}
</style>

<div class="modal-dialog" id="widgetAuthorization">
    <div class="modal-content" id="logInBlock">
        <div class="modal-header">Авторизация</div>
        <div class="modal-body">
            <fieldset>
                <div class="input-auth-block">
                    <span class="authorization-icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" class="input-text" placeholder="Логин" id="userLogin" autocomplete="off">
                </div>
                <div class="input-auth-block">
                    <span class="authorization-icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" class="input-text" placeholder="Пароль" id="userPassword">
                </div>
                <button class="btn-authorization" id="logIn">Войти</button>
                <div class="subheader">Еще нет аккаунта?</div>
                <button class="btn-authorization" id="signUp">Зарегистрироваться</button>
            </fieldset>
        </div>
        <div class="modal-error-message"></div>
    </div>
    <div class="modal-content unvisible" id="signUpBlock">
        <div class="modal-header">Регистрация</div>
        <div class="modal-body">
            <fieldset>
                <div class="input-auth-block">
                    <span class="authorization-icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" class="input-text" placeholder="Логин" id="userLoginReg" autocomplete="off">
                </div>
                <div class="input-auth-block">
                    <span class="authorization-icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" class="input-text" placeholder="Пароль" id="userPasswordReg">
                </div>
                <div class="input-auth-block">
                    <span class="authorization-icon">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" class="input-text" placeholder="Повторите пароль" id="userPasswordRepeatReg">
                </div>
                <div class="input-auth-block">
                    <span class="authorization-icon">
                        <i class="fa-solid fa-person-half-dress"></i>
                    </span>
                    <select id="userGenderReg">
                        <option selected disabled>Укажите ваш пол</option>
                        <option value="female">Женский</option>
                        <option value="male">Мужской</option>
                    </select>
                </div>
                <button class="btn-authorization" id="signUpReg">Зарегистрироваться</button>
                <div class="subheader">Уже есть аккаунт?</div>
                <button class="btn-authorization" id="logInReg">Войти</button>
            </fieldset>
        </div>
        <div class="modal-error-message"></div>
    </div>
</div>
<div class="privat-office" id="widgetPrivatOffice">
    <div class="private-office-content">

        
            <div class="user-personal-data-block">
                <div class="content-title">Ваши данные</div>
                <div class="personal-data">
                    <div class="personal-data-title">Логин:</div>
                    <?=$_SESSION['userName']?>
                </div>

                <div class="personal-data">
                    <? foreach ( $userData as $n ) : ?>
                        <div class="personal-data-title">Пол:
                            <?php
                                if ( $n['userGender'] == 'female') { echo 'Женский'; }
                                if ( $n['userGender'] == 'male') { echo 'Мужской'; }
                            ?>
                        </div>
                    <? endforeach; ?>
                </div>
                <button class="btn-delete-account" id="deleteAccountPrivateOffice">Удалить аккаунт</button>

                <div class="personal-data-title">Параметры <sup>см</sup></div>
                <fieldset class="personal-data-parametres-block">
                    <?php foreach ( $userData as $n ) : ?>
                        <div class="user-input-block">
                            <label for="userBreastGirth">Обхват груди</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userBreastGirth" min="0" step="0.1" value="<?= $n['userBreast']; ?>">
                        </div>
                        <div class="user-input-block">
                            <label for="userWaistGirth">Обхват талии</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userWaistGirth" min="0" step="0.1" value="<?= $n['userWaist']; ?>">
                        </div>
                        <div class="user-input-block">
                            <label for="userHipGirth">Обхват бедер</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userHipGirth" min="0" step="0.1" value="<?= $n['userHip']; ?>">
                        </div>
                        <div class="user-input-block">
                            <label for="userShouldersWidth">Ширина плеч</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userShouldersWidth" min="0" step="0.1" value="<?= $n['userShouldersW']; ?>">
                        </div>
                        <div class="user-input-block">
                            <label for="userNeckGirth">Обхват шеи</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userNeckGirth" min="0" step="0.1" value="<?= $n['userNeck']; ?>">
                        </div>
                        <div class="user-input-block">
                            <label for="userShouldersGirth">Обхват плеч</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userShouldersGirth" min="0" step="0.1" value="<?= $n['userShouldersG']; ?>">
                        </div>
                        <div class="user-input-block">
                            <label for="userSleeveLength">Длина рукава</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userSleeveLength" min="0" step="0.1" value="<?= $n['userSleeveLength']; ?>">
                        </div>
                        <div class="user-input-block">
                            <label for="userProductLength">Длина изделия</label>
                            <i class="fa-solid fa-angle-right"></i>
                            <input class="user-size-input" type="number" id="userProductLength" min="0" step="0.1" value="<?= $n['userProdLength']; ?>">
                        </div>
                    <? endforeach;?>
                </fieldset>
                <div class="personal-data-buttons-block">
                    <button class="btn-save-data" id="saveUserDataPrivateOffice">Сохранить изменения</button>
                </div>
                <div class="modal-private-office-error-message"></div>
            </div>

        <div class="user-works-block">
            <div class="content-title">Ваши работы</div>
            <div class="user-works-container">
            <? foreach($userWorks as $n) :?>
                <div class="user-works">
                    <div class="work-block">
                        <div class="work-preview-img">
                            <svg width="200" height="150"><?=$n['userWorkSVG']?></svg>
                        </div>
                        <div class="work-buttons-panel">
                            <button class="panel-btn editSaveSVG" data-gender="<?=$n['clothesGender']?>" data-id="<?=$n['userWorkID']?>">
                                <i class="fa-solid fa-square-pen"></i>
                            </button>
                            <button class="panel-btn deleteSaveSVG" data-id="<?=$n['userWorkID']?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
            </div>
        </div>
    </div>
</div>
<header class="header">
    <div class="header-menu">
        <div class="menu-item">
            <a href="index.php">
                <svg width="100" height="60" viewBox="0 0 145 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M79.37 42.708C78.952 42.708 78.5848 42.6299 78.2684 42.4736C77.952 42.3174 77.6844 42.0986 77.4657 41.8174C77.0282 41.251 76.8094 40.5088 76.8094 39.5908C76.8094 38.6299 77.1063 37.8799 77.7001 37.3408C78.2391 36.8525 78.9188 36.6084 79.7391 36.6084H79.7567C80.5223 36.6084 81.1376 36.8994 81.6024 37.4814C82.0477 38.0361 82.2704 38.7549 82.2704 39.6377C82.2704 40.6221 81.9969 41.3877 81.4501 41.9346C80.9344 42.4502 80.2411 42.708 79.37 42.708ZM78.5204 37.9209C78.3719 38.0771 78.2489 38.292 78.1512 38.5654C78.0575 38.835 78.0106 39.167 78.0106 39.5615C78.0106 39.96 78.0477 40.2978 78.1219 40.5752C78.2001 40.8486 78.3055 41.0752 78.4383 41.2549C78.7079 41.6221 79.0809 41.8057 79.5575 41.8057C80.0497 41.8057 80.4305 41.5908 80.7001 41.1611C80.9462 40.7705 81.0692 40.2588 81.0692 39.626C81.0653 38.5674 80.7548 37.9033 80.1376 37.6338C79.9501 37.5518 79.7606 37.5107 79.5692 37.5107C79.3739 37.5107 79.1864 37.54 79.0067 37.5986C78.8309 37.6572 78.6688 37.7646 78.5204 37.9209ZM87.2215 42.5908C87.12 42.5908 87.0692 42.4717 87.0692 42.2334C87.0692 42.0459 87.0985 41.9209 87.1571 41.8584C87.2157 41.7959 87.2665 41.7646 87.3094 41.7646C87.7157 41.7646 87.9188 41.6807 87.9188 41.5127V39.7725C87.9188 39.0146 87.8758 38.5185 87.7899 38.2842C87.704 38.0459 87.5926 37.8779 87.4559 37.7803C87.3231 37.6787 87.1415 37.6279 86.911 37.6279C86.4774 37.6279 85.9423 37.8799 85.3055 38.3838V41.7646H86.2899C86.3915 41.7646 86.4423 41.8838 86.4423 42.1221C86.4423 42.3096 86.413 42.4346 86.3544 42.4971C86.2958 42.5596 86.245 42.5908 86.202 42.5908H83.2137C83.1122 42.5908 83.0614 42.4717 83.0614 42.2334C83.0614 42.0459 83.0907 41.9209 83.1493 41.8584C83.2079 41.7959 83.2587 41.7646 83.3016 41.7646H83.3602C83.8094 41.7646 84.0653 41.7197 84.1278 41.6299C84.1512 41.5986 84.163 41.5596 84.163 41.5127V37.6279H83.1317C83.0106 37.624 82.9344 37.5283 82.9032 37.3408C82.8954 37.2861 82.8915 37.2295 82.8915 37.1709C82.8915 36.9912 82.9423 36.8818 83.0438 36.8428C83.1493 36.7998 83.2821 36.7627 83.4423 36.7314C83.6024 36.7002 83.7704 36.6768 83.9462 36.6611C84.2977 36.6221 84.5614 36.6025 84.7372 36.6025H84.7606C84.9325 36.6064 85.036 36.626 85.0712 36.6611C85.1102 36.7002 85.1376 36.751 85.1532 36.8135C85.1727 36.8799 85.1825 37.0185 85.1825 37.2295V37.3408C85.7723 37.0127 86.3094 36.7881 86.7938 36.667C86.9501 36.6279 87.1493 36.6084 87.3915 36.6084C87.6298 36.6084 87.87 36.6611 88.1122 36.7666C88.3544 36.8682 88.5458 37.0166 88.6864 37.2119C88.9364 37.5557 89.0614 38.1025 89.0614 38.8525V41.7646H89.9696C90.0751 41.7646 90.1278 41.8838 90.1278 42.1221C90.1278 42.3096 90.0985 42.4346 90.0399 42.4971C89.9813 42.5596 89.9305 42.5908 89.8876 42.5908H87.2215ZM90.5321 42.5908C90.4305 42.5908 90.3798 42.4717 90.3798 42.2334C90.3798 42.0459 90.409 41.9209 90.4676 41.8584C90.5262 41.7959 90.577 41.7646 90.62 41.7646H90.6786C91.1317 41.7646 91.3876 41.7197 91.4462 41.6299C91.4696 41.5986 91.4813 41.5596 91.4813 41.5127V34.335H90.4501C90.3407 34.331 90.2665 34.2314 90.2274 34.0361C90.2196 33.9814 90.2137 33.9248 90.2098 33.8662C90.2098 33.6865 90.2626 33.5771 90.368 33.5381C90.4735 33.4951 90.6122 33.46 90.784 33.4326C90.9598 33.4053 91.1415 33.3838 91.329 33.3682C91.6883 33.3369 92.0321 33.3193 92.3602 33.3154C92.5243 33.3154 92.6102 33.4814 92.618 33.8135C92.618 33.9111 92.62 34.0127 92.6239 34.1182V41.7646H93.6083C93.7098 41.7646 93.7606 41.8838 93.7606 42.1221C93.7606 42.3096 93.7313 42.4346 93.6727 42.4971C93.6141 42.5596 93.5633 42.5908 93.5204 42.5908H90.5321ZM95.8114 35.1377C95.4481 35.1377 95.2001 34.9775 95.0673 34.6572C95.0282 34.5596 95.0087 34.4521 95.0087 34.335C95.0087 33.9639 95.1708 33.7119 95.495 33.5791C95.5926 33.54 95.6981 33.5205 95.8114 33.5205C96.038 33.5205 96.2274 33.5986 96.3798 33.7549C96.536 33.9072 96.6141 34.1006 96.6141 34.335C96.6141 34.5654 96.536 34.7588 96.3798 34.915C96.2313 35.0635 96.0419 35.1377 95.8114 35.1377ZM94.4169 42.5908C94.3153 42.5908 94.2645 42.4717 94.2645 42.2334C94.2645 42.0459 94.2938 41.9209 94.3524 41.8584C94.411 41.7959 94.4618 41.7646 94.5048 41.7646H94.5633C95.0204 41.7646 95.2782 41.7197 95.3368 41.6299C95.3563 41.6025 95.3661 41.5693 95.3661 41.5303V37.6279H94.3348C94.2215 37.624 94.1454 37.5244 94.1063 37.3291C94.0985 37.2744 94.0946 37.2178 94.0946 37.1592C94.0946 36.9795 94.1473 36.8701 94.2528 36.831C94.3583 36.7881 94.4969 36.7529 94.6688 36.7256C94.8407 36.6982 95.0204 36.6768 95.2079 36.6611C95.5673 36.6299 95.913 36.6123 96.245 36.6084H96.2508C96.4149 36.6084 96.5008 36.7744 96.5087 37.1064V41.7646H97.493C97.5946 41.7646 97.6454 41.8838 97.6454 42.1221C97.6454 42.3096 97.6161 42.4346 97.5575 42.4971C97.4989 42.5596 97.4481 42.5908 97.4051 42.5908H94.4169ZM102.304 42.5908C102.202 42.5908 102.151 42.4717 102.151 42.2334C102.151 42.0459 102.181 41.9209 102.239 41.8584C102.298 41.7959 102.349 41.7646 102.391 41.7646C102.798 41.7646 103.001 41.6807 103.001 41.5127V39.7725C103.001 39.0146 102.958 38.5185 102.872 38.2842C102.786 38.0459 102.675 37.8779 102.538 37.7803C102.405 37.6787 102.224 37.6279 101.993 37.6279C101.559 37.6279 101.024 37.8799 100.388 38.3838V41.7646H101.372C101.474 41.7646 101.524 41.8838 101.524 42.1221C101.524 42.3096 101.495 42.4346 101.436 42.4971C101.378 42.5596 101.327 42.5908 101.284 42.5908H98.2958C98.1942 42.5908 98.1434 42.4717 98.1434 42.2334C98.1434 42.0459 98.1727 41.9209 98.2313 41.8584C98.2899 41.7959 98.3407 41.7646 98.3837 41.7646H98.4423C98.8915 41.7646 99.1473 41.7197 99.2098 41.6299C99.2333 41.5986 99.245 41.5596 99.245 41.5127V37.6279H98.2137C98.0926 37.624 98.0165 37.5283 97.9852 37.3408C97.9774 37.2861 97.9735 37.2295 97.9735 37.1709C97.9735 36.9912 98.0243 36.8818 98.1258 36.8428C98.2313 36.7998 98.3641 36.7627 98.5243 36.7314C98.6844 36.7002 98.8524 36.6768 99.0282 36.6611C99.3798 36.6221 99.6434 36.6025 99.8192 36.6025H99.8426C100.015 36.6064 100.118 36.626 100.153 36.6611C100.192 36.7002 100.22 36.751 100.235 36.8135C100.255 36.8799 100.265 37.0185 100.265 37.2295V37.3408C100.854 37.0127 101.391 36.7881 101.876 36.667C102.032 36.6279 102.231 36.6084 102.474 36.6084C102.712 36.6084 102.952 36.6611 103.194 36.7666C103.436 36.8682 103.628 37.0166 103.768 37.2119C104.018 37.5557 104.143 38.1025 104.143 38.8525V41.7646H105.052C105.157 41.7646 105.21 41.8838 105.21 42.1221C105.21 42.3096 105.181 42.4346 105.122 42.4971C105.063 42.5596 105.013 42.5908 104.97 42.5908H102.304ZM105.761 39.5791C105.761 39.0947 105.841 38.665 106.001 38.29C106.157 37.9228 106.368 37.6143 106.634 37.3643C107.173 36.8643 107.839 36.6123 108.632 36.6084H108.649C109.376 36.6084 109.936 36.8369 110.331 37.2939C110.725 37.7471 110.923 38.4014 110.923 39.2568C110.923 39.4404 110.839 39.5986 110.671 39.7314C110.507 39.8603 110.3 39.9248 110.05 39.9248H106.962C107.032 40.8389 107.35 41.4248 107.917 41.6826C108.097 41.7646 108.286 41.8057 108.485 41.8057C108.684 41.8057 108.862 41.7842 109.018 41.7412C109.175 41.6943 109.325 41.6377 109.47 41.5713C109.614 41.501 109.755 41.4228 109.891 41.3369C110.177 41.1572 110.345 41.0674 110.395 41.0674C110.442 41.0713 110.493 41.0947 110.548 41.1377C110.595 41.1846 110.641 41.2393 110.688 41.3018C110.79 41.4502 110.843 41.5752 110.847 41.6768V41.6885C110.847 41.7822 110.825 41.8447 110.782 41.876C110.067 42.4307 109.255 42.708 108.345 42.708C107.528 42.708 106.891 42.4228 106.434 41.8525C105.985 41.2978 105.761 40.54 105.761 39.5791ZM109.722 39.0459V39.0225C109.722 38.249 109.497 37.7725 109.048 37.5928C108.907 37.5381 108.751 37.5107 108.579 37.5107C108.407 37.5107 108.227 37.542 108.04 37.6045C107.852 37.6709 107.681 37.7666 107.524 37.8916C107.177 38.1768 106.989 38.5615 106.962 39.0459H109.722Z" fill="white"/>
                    <path d="M67.4987 51.1923C67.6126 51.1923 67.6696 51.3222 67.6696 51.582C67.6696 51.8189 67.6149 51.9921 67.5055 52.1015C67.469 52.1379 67.387 52.1562 67.2594 52.1562C66.9222 52.1562 66.7011 52.2861 66.5963 52.5458L63.7936 61.4804C63.7662 61.5715 63.6728 61.6171 63.5133 61.6171C63.1897 61.6171 63.0097 61.5715 62.9733 61.4804L60.7106 55.6835L58.817 61.4804C58.7897 61.5715 58.6644 61.6171 58.4411 61.6171C58.2177 61.6171 58.0833 61.5715 58.0377 61.4804L54.3395 52.1562H53.5944C53.4759 52.1562 53.4166 52.0195 53.4166 51.746C53.4166 51.5227 53.4485 51.3746 53.5123 51.3017C53.5761 51.2288 53.6331 51.1923 53.6832 51.1923H56.9987C57.1126 51.1923 57.1696 51.3176 57.1696 51.5683C57.1696 51.8098 57.1331 51.9693 57.0602 52.0468C56.9918 52.1197 56.9349 52.1562 56.8893 52.1562C56.3242 52.1562 56.0416 52.2109 56.0416 52.3202C56.0416 52.3613 56.0599 52.4182 56.0963 52.4911L58.5573 58.9101L60.1227 54.1865L59.3297 52.1562H58.5299C58.4114 52.1562 58.3522 52.0195 58.3522 51.746C58.3522 51.5227 58.3841 51.3746 58.4479 51.3017C58.5117 51.2288 58.5687 51.1923 58.6188 51.1923H61.9342C62.0481 51.1923 62.1051 51.3176 62.1051 51.5683C62.1051 51.8098 62.0687 51.9693 61.9957 52.0468C61.9274 52.1197 61.8704 52.1562 61.8248 52.1562C61.2597 52.1562 60.9772 52.2109 60.9772 52.3202C60.9772 52.3613 60.9954 52.4182 61.0319 52.4911L63.486 58.9101L65.5162 52.1562H64.4498C64.3314 52.1562 64.2721 52.024 64.2721 51.7597C64.2721 51.5227 64.3017 51.37 64.361 51.3017C64.4248 51.2288 64.4772 51.1923 64.5182 51.1923H67.4987ZM67.0612 61.4804C66.9472 61.4804 66.8903 61.3505 66.8903 61.0907C66.8903 60.8538 66.945 60.6806 67.0543 60.5712C67.0908 60.5348 67.1728 60.5165 67.3004 60.5165C67.6377 60.5165 67.8587 60.3866 67.9635 60.1269L71.443 51.1923C71.4795 51.1012 71.5683 51.0556 71.7096 51.0556C72.0149 51.0556 72.1858 51.1012 72.2223 51.1923L75.8659 60.5165H76.6657C76.7842 60.5165 76.8434 60.6532 76.8434 60.9267C76.8434 61.1545 76.8092 61.3049 76.7409 61.3779C76.6771 61.4462 76.6224 61.4804 76.5768 61.4804H73.2614C73.1474 61.4804 73.0905 61.3551 73.0905 61.1044C73.0905 60.8674 73.1246 60.7102 73.193 60.6327C73.2614 60.5553 73.3206 60.5165 73.3707 60.5165C73.9358 60.5165 74.2184 60.4618 74.2184 60.3525C74.2184 60.3115 74.2002 60.2545 74.1637 60.1816L73.3502 58.0693H69.8844L68.9342 60.5165H70.11C70.2285 60.5165 70.2877 60.6487 70.2877 60.913C70.2877 61.15 70.2558 61.3049 70.192 61.3779C70.1328 61.4462 70.0827 61.4804 70.0416 61.4804H67.0612ZM70.2877 57.0165H72.9469L71.6276 53.5712L70.2877 57.0165ZM81.6559 60.5165C81.7744 60.5165 81.8336 60.6555 81.8336 60.9335C81.8336 61.1523 81.7994 61.2981 81.7311 61.371C81.6627 61.4439 81.6035 61.4804 81.5534 61.4804H77.5475C77.4381 61.4804 77.3834 61.3528 77.3834 61.0976V61.0771C77.3834 60.8583 77.445 60.6874 77.568 60.5644C77.6045 60.5279 77.6774 60.5097 77.7868 60.5097H77.8073C77.8255 60.5143 77.846 60.5165 77.8688 60.5165C77.9736 60.5165 78.0807 60.5097 78.1901 60.496C78.3222 60.4869 78.4248 60.471 78.4977 60.4482C78.6253 60.4072 78.6891 60.332 78.6891 60.2226V52.2587C78.6891 52.1904 78.6595 52.1562 78.6002 52.1562H77.486C77.3584 52.1562 77.2718 52.0331 77.2262 51.787C77.2171 51.7232 77.2103 51.6594 77.2057 51.5956C77.2057 51.3268 77.2672 51.1923 77.3903 51.1923H81.1911C82.2438 51.1969 83.08 51.4498 83.6998 51.9511C84.3242 52.457 84.6364 53.1497 84.6364 54.0292C84.6364 55.4055 83.9733 56.3352 82.6471 56.8183L84.5612 59.9081C84.6979 60.1314 84.8711 60.2887 85.0807 60.3798C85.2903 60.471 85.5547 60.5165 85.8737 60.5165C85.983 60.5165 86.0377 60.6646 86.0377 60.9609C86.0377 61.1751 86.0036 61.3163 85.9352 61.3847C85.8714 61.4485 85.8167 61.4804 85.7711 61.4804H84.609C84.2627 61.4804 83.9414 61.3437 83.6452 61.0702C83.554 60.9882 83.4765 60.8925 83.4127 60.7831L81.1705 57.1327C80.8834 57.1646 80.5371 57.1806 80.1315 57.1806V60.5165H81.6559ZM80.1315 56.1279C81.0885 56.1233 81.7812 56.0071 82.2096 55.7792C82.7656 55.483 83.0436 54.9589 83.0436 54.207V54.1865C83.0436 53.4299 82.818 52.9127 82.3668 52.6347C81.9476 52.3749 81.2024 52.245 80.1315 52.245V56.1279ZM86.4752 51.623C86.4752 51.3359 86.5345 51.1923 86.653 51.1923H90.6315C92.4316 51.1923 93.7282 51.6253 94.5211 52.4911C95.2594 53.2978 95.6308 54.567 95.6354 56.2988V56.3193C95.6354 58.051 95.1136 59.3704 94.07 60.2773C93.1494 61.0748 92.0032 61.4758 90.6315 61.4804H86.8512C86.7282 61.4804 86.6666 61.3505 86.6666 61.0907C86.6666 60.8811 86.7259 60.7079 86.8444 60.5712C86.8763 60.5348 86.9537 60.5165 87.0768 60.5165C87.1953 60.5165 87.3206 60.5097 87.4528 60.496C87.5895 60.4869 87.6943 60.471 87.7672 60.4482C87.8948 60.4072 87.9586 60.332 87.9586 60.2226V52.2519C87.9586 52.1881 87.9313 52.1562 87.8766 52.1562H86.7555C86.6279 52.1562 86.5413 52.0377 86.4957 51.8007C86.4866 51.7369 86.4798 51.6777 86.4752 51.623ZM89.401 60.4277H90.4059C91.3812 60.4277 92.2106 60.1109 92.8942 59.4775C93.6598 58.762 94.0426 57.7822 94.0426 56.538C94.0426 54.4052 93.3772 53.0631 92.0465 52.5116C91.6181 52.3339 91.1282 52.245 90.5768 52.245H89.401V60.4277ZM101.056 60.5165C101.175 60.5165 101.234 60.6555 101.234 60.9335C101.234 61.1523 101.2 61.2981 101.131 61.371C101.063 61.4439 101.004 61.4804 100.954 61.4804H96.9479C96.8385 61.4804 96.7838 61.3528 96.7838 61.0976V61.0771C96.7838 60.8583 96.8453 60.6874 96.9684 60.5644C97.0049 60.5279 97.0778 60.5097 97.1871 60.5097H97.2077C97.2259 60.5143 97.2464 60.5165 97.2692 60.5165C97.374 60.5165 97.4811 60.5097 97.5905 60.496C97.7226 60.4869 97.8252 60.471 97.8981 60.4482C98.0257 60.4072 98.0895 60.332 98.0895 60.2226V52.2587C98.0895 52.1904 98.0599 52.1562 98.0006 52.1562H96.8864C96.7588 52.1562 96.6722 52.0331 96.6266 51.787C96.6175 51.7232 96.6106 51.6594 96.6061 51.5956C96.6061 51.3268 96.6676 51.1923 96.7907 51.1923H100.591C101.644 51.1969 102.48 51.4498 103.1 51.9511C103.725 52.457 104.037 53.1497 104.037 54.0292C104.037 55.4055 103.374 56.3352 102.047 56.8183L103.962 59.9081C104.098 60.1314 104.271 60.2887 104.481 60.3798C104.691 60.471 104.955 60.5165 105.274 60.5165C105.383 60.5165 105.438 60.6646 105.438 60.9609C105.438 61.1751 105.404 61.3163 105.336 61.3847C105.272 61.4485 105.217 61.4804 105.172 61.4804H104.009C103.663 61.4804 103.342 61.3437 103.046 61.0702C102.954 60.9882 102.877 60.8925 102.813 60.7831L100.571 57.1327C100.284 57.1646 99.9375 57.1806 99.5319 57.1806V60.5165H101.056ZM99.5319 56.1279C100.489 56.1233 101.182 56.0071 101.61 55.7792C102.166 55.483 102.444 54.9589 102.444 54.207V54.1865C102.444 53.4299 102.218 52.9127 101.767 52.6347C101.348 52.3749 100.603 52.245 99.5319 52.245V56.1279ZM110.271 61.6171C109.67 61.6171 109.109 61.5169 108.589 61.3163C108.07 61.1113 107.614 60.7991 107.222 60.3798C106.375 59.4684 105.951 58.1695 105.951 56.4833C105.951 54.7242 106.388 53.3639 107.263 52.4023C108.079 51.5045 109.173 51.0556 110.545 51.0556C111.925 51.0601 112.985 51.5501 113.723 52.5253C114.448 53.4823 114.81 54.8359 114.81 56.5859C114.81 58.2538 114.354 59.5344 113.443 60.4277C112.641 61.2206 111.584 61.6171 110.271 61.6171ZM109.225 60.2021C109.59 60.3935 109.982 60.4892 110.401 60.4892C110.816 60.4892 111.189 60.4208 111.522 60.2841C111.855 60.1428 112.149 59.9172 112.404 59.6073C112.96 58.9283 113.238 57.8915 113.238 56.497C113.238 55.2893 112.96 54.2708 112.404 53.4413C111.839 52.6028 111.144 52.1835 110.319 52.1835C109.521 52.1835 108.863 52.5139 108.343 53.1747C107.797 53.8629 107.523 54.7561 107.523 55.8544C107.523 58.1559 108.09 59.6051 109.225 60.2021ZM119.964 61.5488L118.249 61.4804H116.184C116.07 61.4804 116.013 61.3505 116.013 61.0907C116.013 60.8674 116.077 60.692 116.205 60.5644C116.241 60.5279 116.312 60.5097 116.417 60.5097H116.444C116.462 60.5143 116.48 60.5165 116.499 60.5165C116.603 60.5165 116.711 60.5097 116.82 60.496C116.952 60.4869 117.055 60.471 117.128 60.4482C117.255 60.4072 117.319 60.332 117.319 60.2226V52.2656C117.319 52.1926 117.289 52.1562 117.23 52.1562H116.116C115.984 52.1562 115.895 52.0331 115.849 51.787C115.84 51.7232 115.836 51.6594 115.836 51.5956C115.836 51.3268 115.895 51.1923 116.013 51.1923H119.527C122.002 51.1923 123.239 52.0309 123.239 53.7079C123.239 54.2275 123.052 54.6946 122.678 55.1093C122.318 55.5058 121.876 55.7747 121.352 55.9159C122.122 56.0253 122.735 56.3079 123.191 56.7636C123.642 57.2193 123.868 57.7935 123.868 58.4863C123.868 59.9355 123.148 60.8811 121.708 61.3232C121.215 61.4736 120.634 61.5488 119.964 61.5488ZM118.761 59.4433C118.761 59.8033 118.85 60.0699 119.028 60.2431C119.21 60.4117 119.516 60.496 119.944 60.496C120.368 60.496 120.726 60.4641 121.017 60.4003C121.309 60.3365 121.548 60.2271 121.735 60.0722C122.095 59.776 122.275 59.2496 122.275 58.4931C122.275 57.8414 121.974 57.3287 121.373 56.955C120.858 56.6314 120.233 56.4697 119.5 56.4697H118.761V59.4433ZM119.807 55.4169C120.655 55.4169 121.215 55.148 121.489 54.6103C121.594 54.4052 121.646 54.1363 121.646 53.8036C121.646 53.471 121.582 53.1998 121.455 52.9902C121.327 52.7805 121.14 52.621 120.894 52.5116C120.498 52.3339 119.787 52.245 118.761 52.245V55.4169H119.807ZM130.861 57.6728C130.861 57.8596 130.697 57.9531 130.369 57.9531C130.041 57.9531 129.877 57.8915 129.877 57.7685V56.7363H127.696V60.4277H131.319L131.839 59.4091C131.884 59.3225 131.971 59.2792 132.098 59.2792C132.221 59.2792 132.317 59.2861 132.385 59.2997C132.454 59.3134 132.515 59.3316 132.57 59.3544C132.693 59.4045 132.755 59.4729 132.755 59.5595C132.755 59.5823 132.752 59.5982 132.748 59.6073L132.119 61.4804H125.146C125.023 61.4804 124.962 61.346 124.962 61.0771C124.966 60.8447 125.023 60.6738 125.132 60.5644C125.169 60.5279 125.242 60.5097 125.351 60.5097H125.372C125.39 60.5143 125.41 60.5165 125.433 60.5165C125.538 60.5165 125.645 60.5097 125.755 60.496C125.887 60.4869 125.989 60.471 126.062 60.4482C126.19 60.4072 126.254 60.332 126.254 60.2226V52.2519C126.254 52.1881 126.226 52.1562 126.172 52.1562H125.05C124.923 52.1562 124.836 52.0377 124.791 51.8007C124.782 51.7369 124.775 51.6777 124.77 51.623C124.77 51.3359 124.829 51.1923 124.948 51.1923H132.467V53.1816C132.467 53.3365 132.308 53.414 131.989 53.414C131.665 53.414 131.504 53.3639 131.504 53.2636C131.504 52.8808 131.453 52.6347 131.353 52.5253C131.175 52.3385 130.852 52.245 130.382 52.245H127.696V55.6835H129.432C129.642 55.6835 129.765 55.6334 129.801 55.5331C129.861 55.3873 129.89 55.0934 129.89 54.6513C129.89 54.5465 130.027 54.4941 130.3 54.4941C130.537 54.4941 130.69 54.526 130.758 54.5898C130.827 54.6536 130.861 54.706 130.861 54.747V57.6728Z" fill="white"/>
                    <path d="M34.4722 38.5394L34.0805 59.3698L25.6515 50.5314L16.8973 58.9906L17.289 38.1602C7.74054 43.4413 4.27574 55.5279 9.55016 65.1564C14.8246 74.7848 26.8409 78.309 36.3894 73.0279C45.9379 67.7468 49.4027 55.6603 44.1283 46.0318C44.1283 46.0318 74.0166 46.0767 93.1677 46.1055C112.319 46.1343 142.207 46.1792 142.207 46.1792L140.244 53.9082" stroke="<? if($color != '') { echo $color; } else { echo '#F86A38'; } ?>" stroke-width="3"/>
                </svg>
            </a>
            <div class="menu-link">
                <a href="catalog.php?gender=female">женское</a>
                <i class="fa-solid fa-caret-right"></i>
                
                <ul class="menu-catalog">

                    <? foreach ($clothes as $n) : if ( $n['clothesGender'] == 'female' ) : ?>
                        <a href="work-page.php?clothes=<?= $n['clothesID'] ?>&gender=<?= $n['clothesGender'] ?>" class="item-link">
                            <li class="menu-catalog-item">
                                <?= $n['clothesName']; ?>
                                <i class="fa-solid fa-angle-right"></i>
                            </li>
                        </a>
                    <? endif; endforeach; ?>

                </ul>
            </div>
            <div class="menu-link">
                <a href="catalog.php?gender=male">мужское</a>
                <i class="fa-solid fa-caret-right"></i>
                
                <ul class="menu-catalog">

                    <? foreach ($clothes as $n) : if ( $n['clothesGender'] == 'male' ) : ?>
                        <a href="work-page.php?clothes=<?= $n['clothesID'] ?>&gender=<?= $n['clothesGender'] ?>" class="item-link">
                            <li class="menu-catalog-item">
                                <?= $n['clothesName']; ?>
                                <i class="fa-solid fa-angle-right"></i>
                            </li>
                        </a>
                    <? endif; endforeach; ?>

                </ul>
            </div>
        </div>
        <div class="menu-item">
            <? if ($_SESSION['authorization'] == true) : ?>
               <div class="authorization-btns">
                    <span class="private-office" id="showPrivatOffice">
                        <?=$_SESSION['userName']?>
                        <i class="fa-solid fa-user-gear"></i>
                    </span>
                    <div class="logout" id="logOut">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </div>
               </div>
            <? else : ?>
               <div class="authorization-btns">
                    <div class="login" id="showAutorizBlock">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </div>
                </div>
            <? endif; ?>
        </div>
    </div>

<script>
    $('.fa-caret-right').on('click', function(){
        $(this).toggleClass('active');
        $(this).next('.menu-catalog').toggleClass('active');
    });

    $('#showAutorizBlock').on('click', function(){
        $('.modal-dialog').addClass('active');
    });

    $('#showPrivatOffice').on('click', function(){
        $('.privat-office').addClass('active');
    });

    $('#saveUserDataPrivateOffice').on('click', function() {
        var 
            $userBreastGirth    = $('#userBreastGirth').val(),
            $userWaistGirth     = $('#userWaistGirth').val(),
            $userHipGirth       = $('#userHipGirth').val(),
            $userShouldersWidth = $('#userShouldersWidth').val(),
            $userNeckGirth      = $('#userNeckGirth').val(),
            $userShouldersGirth = $('#userShouldersGirth').val(),
            $userSleeveLength   = $('#userSleeveLength').val(),
            $userProductLength  = $('#userProductLength').val();

        $.ajax({
            url: "assets/php/updateUserData/updatedata.php",
            type: 'POST',
            data: {
                'userBreastGirth': $userBreastGirth,
                'userWaistGirth': $userWaistGirth,
                'userHipGirth': $userHipGirth,
                'userShouldersWidth': $userShouldersWidth,
                'userNeckGirth': $userNeckGirth,
                'userShouldersGirth': $userShouldersGirth,
                'userSleeveLength': $userSleeveLength,
                'userProductLength': $userProductLength
            },
            success: function(data) {
                if(data == 'dataUpdate-ok') {
                    alert('Данные сохранены успешно');
                    location.reload();
                } else {
                    $('.modal-private-office-error-message').text("Ошибка: " + data);
                }
            }
        });
    });

    $('#deleteAccountPrivateOffice').on('click', function() {
        if(confirm('Вы уверены, что хотите удалить аккаунт?')) {
            $.ajax({
                url: "assets/php/updateUserData/deleteaccount.php",
                type: 'POST',
                success: function(data) {
                    if(data == 'deleteAccount-ok') {
                        location.reload();
                    }
                }
            });
        }
    });

    var modal = document.getElementById('widgetAuthorization');
    var modal2 = document.getElementById('widgetPrivatOffice');
    window.onclick = function(event) {
        if (event.target == modal) {
            $('.modal-dialog').removeClass('active');
        }
        if (event.target == modal2) {
            $('.privat-office').removeClass('active');
        }
    }

    $('input.input-text').focus( function() {
        $(this).parent('div.input-auth-block').addClass('focus');
    });
    $('input.input-text').focusout( function() {
        $(this).parent('div.input-auth-block').removeClass('focus');
    });

    $('#logIn').on('click', function(){
        var 
            $userLogin = $('input#userLogin').val(),
            $userPassword = $('input#userPassword').val();

        $.ajax({
            url: "assets/php/authorization/login.php",
            type: 'POST',
            data: {
                'userLogin': $userLogin,
                'userPassword': $userPassword
            },
            success: function(data) {
                if(data == 'authorization-ok') {
                    location.reload();
                } else {
                    $('.modal-error-message').text("Ошибка: " + data);
                }
            }
        });
    });

    $('#signUpReg').on('click', function() {
        var
            $userLogin = $('#userLoginReg').val(),
            $userPassword = $('#userPasswordReg').val(),
            $userPasswordRepeat = $('#userPasswordRepeatReg').val(),
            $userGenderReg = $('#userGenderReg option:selected').val();
        
        $.ajax({
            url: "assets/php/authorization/signup.php",
            type: 'POST',
            data: {
                'userLogin': $userLogin,
                'userPassword': $userPassword,
                'userPasswordRepeat': $userPasswordRepeat,
                'userGenderReg': $userGenderReg
            },
            success: function(data) {
                if(data == 'registration-ok') {
                    location.reload();
                } else {
                    $('.modal-error-message').text("Ошибка: " + data);
                }
            }
        });
    });

    $('#logOut').on('click', function(){
        var $logoutCheck = 1;

        $.ajax({
            url: "assets/php/authorization/logout.php",
            type: 'POST',
            data: {
                'logoutCheck': $logoutCheck
            },
            success: function(data) {
                if(data == 'session-destroyed') {
                    location.reload();
                }
            }
        });
    });

    $('#signUp').on('click', function() {
        $('#signUpBlock').removeClass('unvisible');
        $('#logInBlock').addClass('unvisible');
        $('#signUpBlock').addClass('visible');
    });
    $('#logInReg').on('click', function() {
        $('#logInBlock').removeClass('unvisible');
        $('#signUpBlock').addClass('unvisible');
        $('#logInBlock').addClass('visible');
    });

    $('.deleteSaveSVG').on('click', function() {
        $userWorkID = $(this).attr('data-id');
        if (confirm('Вы уверены, что хотите удалить макет?')) {
            $.ajax({
                url: "assets/php/updateUserData/deleteUserSvg.php",
                type: 'POST',
                data: {
                    'userWorkID': $userWorkID
                },
                success: function(data) {
                    if(data == 'userWorkDelete-ok') {
                        location.reload();
                    }
                }
            });
        }
    });

    $('.editSaveSVG').on('click', function() {
        $userWorkID = $(this).attr('data-id');
        $.ajax({
            url: "./work-page.php",
            type: 'POST',
            data: {
                'userWorkID': $userWorkID
            },
            success: function(data) {
                location.href = './work-page.php?gender=female&userWorkID=' + $userWorkID;
            }
        });
    });

</script>