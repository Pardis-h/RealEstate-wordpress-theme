var $=jQuery;
$(document).ready(function () {
    $('#carouselExCaption').find('.carousel-item').first().addClass('active');
if (1){
    $('.slider1').slick({
        arrows: false,
        rtl: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 568,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
    $('.slider55').slick({
        prevArrow: '.prev4',
        nextArrow: '.next4',
        rtl: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        responsive: [
            {
                breakpoint: 568,
                settings: {
                    dots: true,
                    arrows: false,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    dots: false,
                    autoplay: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    arrows: true,
                    dots: false,
                    autoplay: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    $('.slider66').slick({
        rtl: true,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true
    });
    $('.slider2').slick({
        arrows: false,
        rtl: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 568,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
    $('[data-toggle="tooltip"]').tooltip();

    $( document ).on( 'click', '.pt-like-it', function() {
        var post_id = $(this).attr('data-id'),
            nonce = $(this).attr("data-nonce");

        $.ajax({
            url : new_theme_localize.ajax_url,
            type : 'post',
            data : {
                action : 'pt_like_it',
                post_id : post_id,
                nonce : nonce
            },
            success : function( response ) {
                $('.pt-like-it').addClass('active').removeClass('pt-like-it');
            }
        });

        return false;
    })
    $( '#send_message_to_seller' ).submit( function(e) {
        e.preventDefault(e);
        var nonce=$(this).find('[name="_wpnonce"]').val();
        var comment_name=$(this).find('[name="comment_name"]').val();
        var mobile_number=$(this).find('[name="mobile_number"]').val();
        var email=$(this).find('[name="email"]').val();
        var author_email=$(this).find('[name="author_email"]').val();
        var message=$(this).find('[name="message"]').val();

        $.ajax({
            url : new_theme_localize.ajax_url,
            type : 'post',
            data : {
                action : 'seller_email_message',
                nonce : nonce,
                comment_name:comment_name,
                mobile_number:mobile_number,
                email:email,
                message:message,
                author_email:author_email
            },

        }).done(function (response) {
            alert(response.data)
        });

        return false;
    })
}

});