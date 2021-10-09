<template>
    <div class="recomend">
        <div class="container">
            <h3 class="h-heading">
                {{heading}}
            </h3>
            <div class="recomend-slider__inner">
                <div class="recomend-slider">

                    <div class="recomend-slider__item__inner">
                        <div class="recomend-slider__item">
                            <div class="recomend-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="recomend-slider__item__img-img">
                            </div>
                            <div class="recomend-slider__item__description">
                                <div class="recomend-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="recomend-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="recomend-slider__item__inner">
                        <div class="recomend-slider__item">
                            <div class="recomend-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="recomend-slider__item__img-img">
                            </div>
                            <div class="recomend-slider__item__description">
                                <div class="recomend-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="recomend-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="recomend-slider__item__inner">
                        <div class="recomend-slider__item">
                            <div class="recomend-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="recomend-slider__item__img-img">
                            </div>
                            <div class="recomend-slider__item__description">
                                <div class="recomend-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="recomend-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="recomend-slider__item__inner">
                        <div class="recomend-slider__item">
                            <div class="recomend-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="recomend-slider__item__img-img">
                            </div>
                            <div class="recomend-slider__item__description">
                                <div class="recomend-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="recomend-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="recomend-slider__item__inner">
                        <div class="recomend-slider__item">
                            <div class="recomend-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="recomend-slider__item__img-img">
                            </div>
                            <div class="recomend-slider__item__description">
                                <div class="recomend-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="recomend-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="recomend-slider__item__inner">
                        <div class="recomend-slider__item">
                            <div class="recomend-slider__item__img">
                                <img src="/images/popular/popular-1.png" alt="" class="recomend-slider__item__img-img">
                            </div>
                            <div class="recomend-slider__item__description">
                                <div class="recomend-slider__item__name">
                                    Четыре сезона
                                </div>
                                <div class="recomend-slider__item__price">
                                    от 220 ₽
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="recomend-slider__arrow left-arrow">
                    <img src="/images/arrow.png" alt="" class="recomend-slider__arrow__img">
                </div>

                <div class="recomend-slider__arrow right-arrow">
                    <img src="/images/arrow.png" alt="" class="recomend-slider__arrow__img">
                </div>

                <!-- <div class="slick-slider-dots"></div> -->
            </div>
        </div>
    </div>

</template>

<script>
$(document).ready(function(){
	$('.recomend-slider').slick({
        slidesToShow: 4,
        variableWidth: true,
        // dots: true,
        // appendDots: $('.slick-slider-dots'),
        // arrows: false,
        infinite: true,
        speed: 700,
        // autoplay: true,
        autoplaySpeed: 3000,
        prevArrow: $('.recomend-slider__arrow.left-arrow'),
	    nextArrow: $('.recomend-slider__arrow.right-arrow')
	});

});


export default {
  name: 'PopularSlider',
  props: {
      heading: String
  },
  mounted() {
      $(document).ready(function(){
        $('.recomend-slider').slick({
            slidesToShow: 4,
            variableWidth: true,
            // dots: true,
            // appendDots: $('.slick-slider-dots'),
            // arrows: false,
            infinite: true,
            speed: 700,
            // autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: $('.recomend-slider__arrow.left-arrow'),
            nextArrow: $('.recomend-slider__arrow.right-arrow')
        });

    });
  }
}
</script>


<style>
    /*.h-heading{*/
    /*    padding-top: 60px;*/
    /*    margin-bottom: 40px;*/
    /*    margin-top: 0;*/

    /*    font-family: Open Sans;*/
    /*    font-style: normal;*/
    /*    font-weight: normal;*/
    /*    font-size: 24px;*/
    /*    line-height: 125%;*/
    /*    !* identical to box height, or 30px *!*/


    /*    color: #343435;*/
    /*}*/
    .recomend-slider__inner{
        position: relative;
    }
    .recomend-slider{
        /* background: rgba(0, 0, 0, 0.1);
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); */
        padding: 2px 5px 10px;
    }
    .recomend-slider__item__inner{
        width: 300px;
        background: #FFFFFF;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin: 10px;
        cursor: pointer;
    }
    .recomend-slider__item__inner:hover{
        background: #FFFFFF;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
        border-radius: 10px;
    }
    .recomend-slider__item{
        width: 300px;
        padding: 11px 14px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    .recomend-slider__item__img{
        margin-right: 10px;
    }
    .recomend-slider__item__description{
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

    .recomend-slider__arrow.left-arrow{
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
    .recomend-slider__arrow.right-arrow{
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
    /* .recomend-slider__arrows{
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;

        display: flex;
        justify-content: space-between;
        align-items: center;
    } */
</style>
