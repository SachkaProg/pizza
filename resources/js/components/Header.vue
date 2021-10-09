<template>

        <div class="header">
            <div class="container">
                <div class="header__inner">
                    <div class="header-block">
                        <a href="/" class="logo">
                            <img src="/images/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="header-block">
                        <span>Доставка пиццы</span>
                        <span class="span-orange">№1 в Донецке</span>
                    </div>
                    <div class="header-block mob-hide">
                        <span>г. Донецк</span>
                        <span>ул. Университетская 101В</span>
                    </div>
                    <div class="header-block mob-hide">
                        <span>Телефон доставки</span>
                        <span class="span-orange">
                            <a class="span-orange" href="tel:0715000111">(071) 500 -01-11</a>
                        </span>
                    </div>

                    <div class="menu-burger" @click="openMobMenu()">
                        <span class="menu-burger-span mbs-1"></span>
                        <span class="menu-burger-span mbs-2"></span>
                        <span class="menu-burger-span mbs-3"></span>
                    </div>
                </div>
            </div>

            <div class="mob-menu__pop-up" id="mob-menu__pop-up">
                <img src="/images/mmp-cross.svg" alt="" class="mmp-cross"
                @click="closeMobMenu()">
                <div class="mob-menu__pop-up__address">
                    г. Донецк <br>
                    ул. Университетская 101В
                </div>
                <div class="mob-menu__pop-up__phone">
                    <p>
                        Телефон доставки
                    </p>
                    <a href="tel:0715000111" class="mob-menu__pop-up__phone-number">
                        (071) 500 -01-11
                    </a>
                </div>
<!--                <div class="mob-menu__pop-up__social">-->
<!--                    <a href="" class="mob-menu__pop-up__social-btn"><img src="" alt=""></a>-->
<!--                    <a href="" class="mob-menu__pop-up__social-btn"><img src="" alt=""></a>-->
<!--                    <a href="" class="mob-menu__pop-up__social-btn"><img src="" alt=""></a>-->
<!--                </div>-->
                <div class="footer__social-btns mmp-social">
                    <div class="footer__social-btn__item">
                        <img src="/images/social/tg.svg" alt="">
                    </div>
                    <div class="footer__social-btn__item">
                        <img src="/images/social/vk.svg" alt="">
                    </div>
                    <div class="footer__social-btn__item">
                        <img src="/images/social/inst.svg" alt="">
                    </div>
                </div>

                <div class="mob-menu__pop-up__copyright">
                    Peppe Pizza © 2021
                </div>
            </div>
        </div>


</template>

<script>


export default {
    name: 'Header',
    methods: {
        openMobMenu(){
            document.getElementById("mob-menu__pop-up").classList.add("active");
            if(!document.getElementById("mob-menu__pop-up").classList.contains('sliding')){
                document.getElementById("mob-menu__pop-up").classList.add("sliding");
            }
        },
        closeMobMenu(){
            document.getElementById("mob-menu__pop-up").classList.remove("active");
        },
    }
}
</script>

<style>
    *{
        box-sizing: border-box;
    }
    .container{
        max-width: 988px;
        margin: 0 auto;
        padding: 0 15px;
    }

    p,h1,h2,h3,h4,h5,h6{
        margin: 0;
        padding: 0;
    }

    a {
        text-decoration: none;
        color: #343435;
    }
</style>

<style>
    .header{
        padding-top: 20px;
    }
    .header__inner{
        display: flex;
        align-items: center;
        position: relative;
    }
    .header-block{
        display: flex;
        flex-direction: column;

        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 125%;
        /* or 20px */


        color: #343435;
    }

    .header-block span{
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 125%;
        /* or 20px */


        color: #343435;
    }
    span.span-orange,
    .span-orange{
        color: #EB5C27;
    }
    .header-block+.header-block{
        margin-left: 30px;
    }
</style>

<style>
    .menu-burger{

        width: 20px;
        height: 12px;
        /*display: flex;*/
        display: none;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;
        position: absolute;
        right: 0;
    }
    .menu-burger-span{
        width: 20px;
        height: 2px;
        background: #343435;
        border-radius: 8px;
    }
    .mbs-2{
        width: 17px;
    }
    .mbs-3{
        width: 13px;
    }
</style>

<style>
    .mob-menu__pop-up{
        position: fixed;
        top: -100%;
        right: 0;
        left: 0;
        background: #343435;
        padding-top: 75px;
        z-index: 50;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Montserrat;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 125%;
        /* or 22px */

        text-align: center;

        color: #FFFFFF;
        border-radius: 0px 0px 25px 25px;

        /*animation-duration: 3s;*/
        /*animation-name: mmp-slideOut;*/
    }
    .mob-menu__pop-up.sliding{
        animation-duration: 1s;
        animation-name: mmp-slideOut;
    }
    .mob-menu__pop-up.active{
        top: 0;
        animation-duration: 1s;
        animation-name: mmp-slideIn;
    }

    .mob-menu__pop-up__address{
        margin-bottom: 60px;
    }
    .mob-menu__pop-up__phone p{
        margin-bottom: 5px;
    }
    .mob-menu__pop-up__phone-number{
        color: #EB5C27;
        font-size: 24px;
    }
    .mob-menu__pop-up__phone{
        margin-bottom: 60px;
    }
    .mmp-social{
        margin-bottom: 20px;
    }
    .mob-menu__pop-up__copyright{
        font-family: Montserrat;
        font-style: normal;
        font-weight: normal;
        font-size: 13px;
        line-height: 125%;
        /* or 16px */
        color: #636363;
        margin-bottom: 60px;
    }
    .mmp-cross{
        position: absolute;
        right: 15px;
        top: 40px;
    }


    @keyframes mmp-slideIn {
        from {
            top: -100%;
        }

        to {
            top: 0;
        }
    }
    @keyframes mmp-slideOut {
        from {
            top: 0;
        }

        to {
            top: -100%;
        }
    }
</style>

<style>
@media(max-width: 767px){
    .container{
        padding: 0 15px;
    }

    .mob-hide{
        display: none;
    }
    .logo img{
        width: 50px;
        height: 50px;
    }
    .header-block{
        font-size: 15px;
        line-height: 125%;
    }
    .menu-burger{
        display: flex;
    }


}
@media(max-width: 375px){
    .container{
        padding: 0 15px;
    }

    .mob-hide{
        display: none;
    }
    .logo img{
        width: 50px;
        height: 50px;
    }
    .header-block{
        font-size: 15px;
        line-height: 125%;
    }
    .menu-burger{
        display: flex;
    }


}
</style>




