/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

import 'slick-carousel'

export default class {
    init(){
        $('.slides').slick({
            dots: false,
            infinite: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 1300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            swipeToSlide: true,
            cssEase: 'ease-in-out'
        });
    }
};