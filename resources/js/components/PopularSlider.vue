<template>
    <div class="popular">
        <div class="container">
            <h3 class="h-heading">
                {{heading}}
            </h3>
            <div class="popular-slider__inner">
                <div class="popular-slider">

                    <div class="popular-slider__item__inner" @click="pizzaPopUp()">
                        <div class="popular-slider__item">
                            <div class="popular-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="popular-slider__item__img-img">
                                <div class="popular-slider__item__discount--new discount">-70%</div>
                                <div class="popular-slider__item__discount--new new">NEW</div>
                            </div>
                            <div class="popular-slider__item__description">
                                <div class="popular-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="popular-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="popular-slider__item__inner" @click="pizzaPopUp()">
                        <div class="popular-slider__item">
                            <div class="popular-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="popular-slider__item__img-img">
                                <div class="popular-slider__item__discount--new discount">-70%</div>
                                <div class="popular-slider__item__discount--new new">NEW</div>
                            </div>
                            <div class="popular-slider__item__description">
                                <div class="popular-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="popular-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="popular-slider__item__inner" @click="pizzaPopUp()">
                        <div class="popular-slider__item">
                            <div class="popular-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="popular-slider__item__img-img">
                                <div class="popular-slider__item__discount--new discount">-70%</div>
                                <div class="popular-slider__item__discount--new new">NEW</div>
                            </div>
                            <div class="popular-slider__item__description">
                                <div class="popular-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="popular-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="popular-slider__item__inner" @click="pizzaPopUp()">
                        <div class="popular-slider__item">
                            <div class="popular-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="popular-slider__item__img-img">
                                <div class="popular-slider__item__discount--new discount">-70%</div>
                                <div class="popular-slider__item__discount--new new">NEW</div>
                            </div>
                            <div class="popular-slider__item__description">
                                <div class="popular-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="popular-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="popular-slider__item__inner" @click="pizzaPopUp()">
                        <div class="popular-slider__item">
                            <div class="popular-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="popular-slider__item__img-img">
                                <div class="popular-slider__item__discount--new discount">-70%</div>
                                <div class="popular-slider__item__discount--new new">NEW</div>
                            </div>
                            <div class="popular-slider__item__description">
                                <div class="popular-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="popular-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="popular-slider__item__inner" @click="pizzaPopUp()">
                        <div class="popular-slider__item">
                            <div class="popular-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="popular-slider__item__img-img">
                                <div class="popular-slider__item__discount--new discount">-70%</div>
                                <div class="popular-slider__item__discount--new new">NEW</div>
                            </div>
                            <div class="popular-slider__item__description">
                                <div class="popular-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="popular-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="popular-slider__arrow left-arrow">
                    <img src="/images/arrow.png" alt="" class="popular-slider__arrow__img">
                </div>

                <div class="popular-slider__arrow right-arrow">
                    <img src="/images/arrow.png" alt="" class="popular-slider__arrow__img">
                </div>

                <!-- <div class="slick-slider-dots"></div> -->
            </div>
        </div>
    </div>

</template>

<script>
$(document).ready(function(){
	$('.popular-slider').slick({
        slidesToShow: 4,
        variableWidth: true,
        // dots: true,
        // appendDots: $('.slick-slider-dots'),
        // arrows: false,
        infinite: true,
        speed: 700,
        // autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: $('.popular-slider__arrow.left-arrow'),
	    nextArrow: $('.popular-slider__arrow.right-arrow'),
        responsive: [
            {
                breakpoint: 375,
                settings: {
                    dots: false,
                    arrows: false
                }
            },
        ],
	});

});


export default {
  name: 'PopularSlider',
  props: {
      heading: String
  },
  methods: {
      pizzaPopUp(){
        $('body').addClass('open');
        $('.pizza__pop-up').css('display', 'flex');
      }
  }
}
</script>

<style>
    .popular-slider__item__discount--new{
        width: 35px;
        height: 15px;
        background: linear-gradient(180deg, #C060E1 0%, #B537E2 100%);
        border-radius: 17px;

        display: flex;
        justify-content: center;
        align-items: center;

        position: absolute;
        right: -10px;
        top: 3px;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 8px;
        line-height: 125%;
        /* identical to box height, or 20px */
        color: #FFFFFF;
    }
    .popular-slider__item__discount--new.discount{
        background: linear-gradient(180deg, #C060E1 0%, #B537E2 100%);
    }
    .popular-slider__item__discount--new.new{
        background: linear-gradient(180deg, #FA5656 0%, #F90606 100%);
    }
</style>


<style>
    .h-heading{
        padding-top: 60px;
        margin-bottom: 40px;
        margin-top: 0;

        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 125%;
        /* identical to box height, or 30px */


        color: #343435;
    }
    .popular-slider__inner{
        position: relative;
    }
    .popular-slider{
        /* background: rgba(0, 0, 0, 0.1);
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); */
        padding: 2px 5px 10px;
    }
    .popular-slider__item__inner{
        width: 300px;
        background: #FFFFFF;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin: 10px;
        cursor: pointer;
    }
    .popular-slider__item__inner:hover{
        background: #FFFFFF;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
        border-radius: 10px;
    }
    .popular-slider__item{
        width: 300px;
        padding: 11px 14px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    .popular-slider__item__img{
        margin-right: 10px;

        position: relative;
    }
    .popular-slider__item__description{
        display: flex;
        flex-direction: column;
        justify-content: space-around;

        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 110%;
        /* identical to box height, or 18px */


        color: #343435;
    }

    .popular-slider__arrow.left-arrow{
        display: flex;
        cursor: pointer;
        width: 25px;
        height: 25px;

        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        margin: auto 0;
    }
    .popular-slider__arrow.right-arrow{
        display: flex;
        cursor: pointer;
        transform: rotate(180deg);
        width: 25px;
        height: 25px;

        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        margin: auto 0;

    }
    /* .popular-slider__arrows{
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;

        display: flex;
        justify-content: space-between;
        align-items: center;
    } */


    /*body {*/
    /*    overflow-x: hidden;*/
    /*}*/


    .popular .container{
        padding: 0 0 0 auto;
    }
    /*.slick-slider {*/
    /*    touch-action: auto;*/
    /*    -ms-touch-action: auto;*/
    /*}*/

    /*.popular .slick-list {*/
    /*    width: 30000px;*/
    /*}*/
</style>

<style>
@media(max-width: 767px) {
    .h-heading{
        padding-top: 20px;
        margin-bottom: 15px;
    }
    .popular-slider__arrow{
        display: none !important;
    }
    .popular .container{
        padding: 0 0 0 15px;
    }
    .popular-slider{
        padding: 0;
        /*width: 30000px;*/
    }
    .popular-slider__item__inner,
    .popular-slider__item{
        width: 198px;
    }
    .popular-slider__item__img-img{
        width: 55px;
        height: 55px;
    }
    .popular-slider__item__description{
        font-size: 13px;
        line-height: 110%;
    }

    /*.popular-slider.slick-initialized.slick-slider{*/
    /*    width: auto !important;*/
    /*}*/

    /*.popular .slick-list {*/
    /*    width: auto !important;*/
    /*}*/



}
    @media(max-width: 375px) {
        .h-heading{
            padding-top: 20px;
            margin-bottom: 15px;
        }
        .popular-slider__arrow{
            display: none !important;
        }
        .popular .container{
            padding: 0 0 0 15px;
        }
        .popular-slider{
            padding: 0;
            /*width: 30000px;*/
        }
        .popular-slider__item__inner,
        .popular-slider__item{
            width: 198px;
        }
        .popular-slider__item__img-img{
            width: 55px;
            height: 55px;
        }
        .popular-slider__item__description{
            font-size: 13px;
            line-height: 110%;
        }

        /*.popular-slider.slick-initialized.slick-slider{*/
        /*    width: auto !important;*/
        /*}*/

        /*.popular .slick-list {*/
        /*    width: auto !important;*/
        /*}*/



    }
</style>
