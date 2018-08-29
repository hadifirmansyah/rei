@push('scripts')
    <script>
        $(function() {
            var isMulti = ($('.owl-carousel .item').length > 1) ? true : false
            
            $('.product_thumbnail_slide').owlCarousel({
                items: 1,
                margin: 0,
                loop: isMulti,
                nav: isMulti,
                navText: ["<img src='/assets/front/img/core-img/long-arrow-left.svg' alt=''>", "<img src='/assets/front/img/core-img/long-arrow-right.svg' alt=''>"],
                dots: isMulti,
                autoplay: true,
                autoplayTimeout: 2000,
                smartSpeed: 1000
            });
        });
    </script>
@endpush