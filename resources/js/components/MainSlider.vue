<template>
    <div class="slider__inner">
        <div class="main-slider">
            <div v-for="(item,index) in this.banners" :key="index" class="main-slider__item"><a :href="item.link"><img class="main-slider__item__img" :src="item.img" :alt="item.name"></a></div>
<!--            <div class="main-slider__item"><img class="main-slider__item__img" src="/images/slider/slider-1.jpg" alt=""></div>-->
<!--            <div class="main-slider__item"><img class="main-slider__item__img" src="/images/slider/slider-1.jpg" alt=""></div>-->
<!--            <div class="main-slider__item"><img class="main-slider__item__img" src="/images/slider/slider-1.jpg" alt=""></div>-->
<!--            <div class="main-slider__item"><img class="main-slider__item__img" src="/images/slider/slider-1.jpg" alt=""></div>-->
<!--            <div class="main-slider__item"><img class="main-slider__item__img" src="/images/slider/slider-1.jpg" alt=""></div>-->
<!--            <div class="main-slider__item"><img class="main-slider__item__img" src="/images/slider/slider-1.jpg" alt=""></div>-->
        </div>
        <div class="slick-slider-dots"></div>
    </div>
</template>

<script>
// $(document).ready(function(){
// 	$('.main-slider').not('.slick-initialized').slick({
//         slidesToShow: 1,
// 		centerMode: true,
//         centerPadding: '60px',
//         variableWidth: true,
//         dots: true,
//         appendDots: $('.slick-slider-dots'),
//         arrows: false,
//         infinite: true,
//         speed: 1000,
//         autoplay: true,
//         autoplaySpeed: 3000,
//         responsive: [
//             {
//                 breakpoint: 375,
//                 settings: {
//                     dots: false
//                 }
//             },
//         ],
// 	});
//
// });


export default {
    name: 'MainSlider',
    data: () => ({
        banners: [],

    }),
    mounted() {
        this.loadBanners();



    },
    methods: {

        loadBanners() {
            axios.get('api/get-banners')
                .then(res => {
                    this.banners = res.data;
                    console.log(res.data);
                    setTimeout(()=>{
                        $('.main-slider').slick("unslick");
                        $('.main-slider').not('.slick-initialized').slick({
                            slidesToShow: 1,
                            centerMode: true,
                            centerPadding: '60px',
                            variableWidth: true,
                            dots: true,
                            appendDots: $('.slick-slider-dots'),
                            arrows: false,
                            infinite: true,
                            speed: 1000,
                            autoplay: true,
                            autoplaySpeed: 3000,
                            responsive: [
                                {
                                    breakpoint: 375,
                                    settings: {
                                        dots: false
                                    }
                                },
                            ],
                        });
                    }, 0);


                })
        },





    }
}
</script>

<style>
    .main-slider{
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) -71.8%, rgba(255, 255, 255, 0.3) 22%);
        filter: drop-shadow(0px 4px 25px rgba(0, 0, 0, 0.22));
    }
    .main-slider__item,
    .main-slider__item__img{
        width: 990px;

        /* filter: drop-shadow(0px 4px 25px rgba(0, 0, 0, 0.2));
        border-radius: 18px; */
    }

    .main-slider__item[aria-hidden="true"] .main-slider__item__img{
        opacity: 0.5;
        /* background: linear-gradient(90deg, rgba(255, 255, 255, 0.216) 67.5%, rgba(255, 255, 255, 0) 151.36%);
        filter: drop-shadow(0px 4px 25px rgba(0, 0, 0, 0.22)); */
    }

    .slick-current{
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) -71.8%, rgba(255, 255, 255, 0.3) 22%);
        filter: drop-shadow(0px 4px 25px rgba(0, 0, 0, 0.22));
    }
</style>

<style>
    .slider__inner{
        position: relative;
    }
    .slick-slider-dots{
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
    }

    .slick-slider-dots ul {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .slick-slider-dots ul li {
            margin: 0 5px;
    }
    .slick-slider-dots ul li button {
                background: #EB5C27;
                height: 10px;
                width: 10px;
                overflow: hidden;
                color: #EB5C27;
                border: none;
                border-radius: 50%;
    }

    .slick-slider-dots ul li.slick-active button {
                    background: #fff;
                    color: #fff;




    }


</style>


<style>
    @media(max-width: 767px) {
        .main-slider__item{
            width: 100vw !important;
        }
        .main-slider__item__img{
            width: 100% !important;
        }
    }
    @media(max-width: 375px) {
        .main-slider__item{
            width: 100vw !important;
        }
        .main-slider__item__img{
            width: 100% !important;
        }
    }
</style>
