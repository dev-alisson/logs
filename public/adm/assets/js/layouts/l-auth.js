$(function () {
    /**
     * Password
     */
    $('html').on('click', '.js-password-view', function (e) {

        /**
         * Icon
         */
        let icon = $(this);

        /**
         * Field
         */
        let field = $('.js-password-field');

        /**
         * Type
         */
        let type = field.attr('type');

        /**
         * Verify
         */
        if (type == 'password') {
            /**
             * Text
             */
            field.prop('type', 'text');

            /**
             * Hide
             */
            icon.removeClass('ri-eye-off-line');

            /**
             * View
             */
            icon.addClass('ri-eye-line');
        } else {
            /**
             * Password
             */
            field.prop('type', 'password');

            /**
             * Hide
             */
            icon.removeClass('ri-eye-line');

            /**
             * View
             */
            icon.addClass('ri-eye-off-line');
        }
    });

    /**
     * Carousel
     */
    $('.js-carousel').owlCarousel({
        /**
         * Define que o carrossel
         * ficará em repetição
         */
        loop: true,

        /**
         * Define que o carrossel
         * iniciará automaticamente
         */
        autoplay: true,

        /**
         * Define o tempo de
         * salto para 1 segundo
         */
        smartSpeed: 1000,

        /**
         * Deifne a quantidade de
         * itens por vez no carrossel
         */
        items: 1,

        /**
         * Define a margem
         * entre os itens
         */
        margin: 150
    })
});
