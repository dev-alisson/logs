$(function () {
    /**
     * Login :: carousel
     */

    /**
     * Ativa o carrossel
     * da página de login
     */
    $('.js-login-carousel').owlCarousel({
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
