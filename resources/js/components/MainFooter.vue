<template>


    <div class="footer" id="footer">
        <div class="container">
            <div class="footer__inner">

                <div class="footer__content">

                    <div class="footer__content__img">
                        <img src="/images/footer-img.png" alt="" class="footer__content__img-img">
                    </div>

                    <div class="footer__content__text">
                        <div class="footer-block">
                            <span>Доставка пиццы</span>
                            <span class="span-orange">№1 в Донецке</span>
                        </div>
                        <div class="footer-block">
                            <span>г. Донецк</span>
                            <span>ул. Университетская 101В</span>
                        </div>
                        <div class="footer-block">
                            <span>Телефон доставки</span>
                            <span class="span-orange">
                                <a class="span-orange" href="tel:0715000111">(071) 500 -01-11</a>
                            </span>
                        </div>
                    </div>

                </div>

                <router-link class="footer__back-btn" to="/">
                    <img class="left-arrow-back" src="/images/left-arrow-back.png" alt="">
                    Назад в меню
                </router-link>

                <div class="footer__social-btns">
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

            </div>
        </div>

        <div class="footer__line"></div>

        <div class="container copyright">
            <div class="footer__water-mark">
                Peppe Pizza © 2021
            </div>
        </div>
    </div>


</template>

<script>



export default {
  name: 'MainFooter',

}
</script>

<style>
    .footer{
        background: #F3F3F3;
    }
    .footer .container{
        padding: 22px 0;
    }
    .footer__inner{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .footer__content{
        display: flex;
    }
    .footer__content__img{
        margin-right: 30px;
    }
    .footer__content__img,
    .footer__content__img-img{
        width: 214px;
        height: 214px;
    }
    .footer__content__text{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }
    .footer-block{
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

    .footer-block span{
        font-family: Montserrat;
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        line-height: 125%;
        /* or 20px */


        color: #343435;
    }

    .footer__back-btn{
        width: 195px;
        height: 48px;
        background: #EB5C27;
        border-radius: 20px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 125%;
        /* identical to box height, or 22px */
        color: #FFFFFF;

        position: relative;

        padding: 12px 12px 12px 50px;
        cursor: pointer;
    }
    .left-arrow-back{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 22px;
        margin: auto 0;
    }
    .footer__social-btns{
        display: flex;
        align-items: center;
    }
    .footer__social-btn__item{
        cursor: pointer;
    }
    .footer__social-btn__item+.footer__social-btn__item{
        margin-left: 10px;
    }

    .footer__line{
        width: 100%;
        height: 1px;
        background: #C4C4C4;
    }
    .footer__water-mark{
        font-family: Montserrat;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 125%;
        /* identical to box height, or 20px */


        color: #B0B0B0;
    }
</style>


<style>
@media(max-width: 767px){
    .footer .container{
        padding: 22px 15px 0;
    }
    .footer__inner{
        flex-direction: column;
        align-items: flex-start;
    }
    .footer__content__img,
    .footer__back-btn,
    .footer__line{
        display: none;
    }
    .footer__content__text{
        margin-bottom: 30px;
    }
    .footer__social-btns{
        display: flex;
        align-items: center;
        align-self: center;
    }
    .footer .container.copyright{
        display: flex;
        justify-content: center;
    }
    .footer-block{
        padding-top: 30px;
    }
    .footer-block+.footer-block{
        padding-top: 20px;
    }

    .footer-block span.span-orange a.span-orange{
        font-size: 22px;
    }
    .footer__water-mark{
        padding-bottom: 15px;
    }

}
    @media(max-width: 375px){
        .footer .container{
            padding: 22px 15px 0;
        }
        .footer__inner{
            flex-direction: column;
            align-items: flex-start;
        }
        .footer__content__img,
        .footer__back-btn,
        .footer__line{
            display: none;
        }
        .footer__content__text{
            margin-bottom: 30px;
        }
        .footer__social-btns{
            display: flex;
            align-items: center;
            align-self: center;
        }
        .footer .container.copyright{
            display: flex;
            justify-content: center;
        }
        .footer-block{
            padding-top: 30px;
        }
        .footer-block+.footer-block{
            padding-top: 20px;
        }

        .footer-block span.span-orange a.span-orange{
            font-size: 22px;
        }
        .footer__water-mark{
            padding-bottom: 15px;
        }

    }
</style>



